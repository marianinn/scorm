<?php


function XMLToArrayFlat($xml, &$return, $path='', $root=false) 
{ 
    $children = array(); 
    if ($xml instanceof SimpleXMLElement) { 
        $children = $xml->children(); 
        if ($root){ // we're at root 
            $path .= '/'.$xml->getName(); 
        } 
    } 
    if ( count($children) == 0 ){ 
        $return[$path] = (string)$xml; 
        return; 
    } 
    $seen=array(); 
    foreach ($children as $child => $value) { 
        $childname = ($child instanceof SimpleXMLElement)?$child->getName():$child; 
        if ( !isset($seen[$childname])){ 
            $seen[$childname]=0; 
        } 
        $seen[$childname]++; 
        XMLToArrayFlat($value, $return, $path.'/'.$child.'['.$seen[$childname].']'); 
    } 
} 

function xmlToArray($xml, $root = true) {
	if (!$xml->children()) {
		return (string)$xml;
	}
 
	$array = array();
	foreach ($xml->children() as $element => $node) {
		$totalElement = count($xml->{$element});
 
		if (!isset($array[$element])) {
			$array[$element] = "";
		}
 
		// Has attributes
		if ($attributes = $node->attributes()) {
			$data = array(
				'attributes' => array(),
				'value' => (count($node) > 0) ? xmlToArray($node, false) : (string)$node
				// 'value' => (string)$node (old code)
			);
 
			foreach ($attributes as $attr => $value) {
				$data['attributes'][$attr] = (string)$value;
			}
 
			if ($totalElement > 1) {
				$array[$element][] = $data;
			} else {
				$array[$element] = $data;
			}
 
		// Just a value
		} else {
			if ($totalElement > 1) {
				$array[$element][] = xmlToArray($node, false);
			} else {
				$array[$element] = xmlToArray($node, false);
			}
		}
	}
 
	if ($root) {
		return array($xml->getName() => $array);
	} else {
		return $array;
	}
}

function convertXmlObjToArr($obj, &$arr) 
{ 
    $children = $obj->children(); 
    foreach ($children as $elementName => $node) 
    { 
        $nextIdx = count($arr); 
        $arr[$nextIdx] = array(); 
        $arr[$nextIdx]['@name'] = strtolower((string)$elementName); 
        $arr[$nextIdx]['@attributes'] = array(); 
        $attributes = $node->attributes(); 
        foreach ($attributes as $attributeName => $attributeValue) 
        { 
            $attribName = strtolower(trim((string)$attributeName)); 
            $attribVal = trim((string)$attributeValue); 
            $arr[$nextIdx]['@attributes'][$attribName] = $attribVal; 
        } 
        $text = (string)$node; 
        $text = trim($text); 
        if (strlen($text) > 0) 
        { 
            $arr[$nextIdx]['@text'] = $text; 
        } 
        $arr[$nextIdx]['@children'] = array(); 
        convertXmlObjToArr($node, $arr[$nextIdx]['@children']); 
    } 
    return; 
}  

function parseSimpleXML($xmldata)
    {
        $childNames = array();
        $children = array();

        if( $xmldata->count() !== 0 )
        {
            foreach( $xmldata->children() AS $child )
            {
                $name = $child->getName();

                if( !isset($childNames[$name]) )
                {
                    $childNames[$name] = 0;
                }

                $childNames[$name]++;
                $children[$name][] = $this->parseSimpleXML($child);
            }
        }

        $returndata = new XMLNode();
        if( $xmldata->attributes()->count() > 0 )
        {
            $returndata->{'@attributes'} = new XMLAttribute();
            foreach( $xmldata->attributes() AS $name => $attrib )
            {
                $returndata->{'@attributes'}->{$name} = (string)$attrib;
            }
        }

        if( count($childNames) > 0 )
        {
            foreach( $childNames AS $name => $count )
            {
                if( $count === 1 )
                {
                    $returndata->{$name} = $children[$name][0];
                }
                else
                {
                    $returndata->{$name} = new XMLMultiNode();
                    $counter = 0;
                    foreach( $children[$name] AS $data )
                    {
                        $returndata->{$name}->{$counter} = $data;
                        $counter++;
                    }
                }
            }
        }
        else
        {
            if( (string)$xmldata !== '' )
            {
                $returndata->{'@innerXML'} = (string)$xmldata;
            }
        }
        return $returndata;
    }
	
?>