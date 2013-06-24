<?php

include ("funciones.php");

$rutaMenu = "menu.xml";

$xml = readXML ($rutaMenu);

caja($xml);

$aAtributos=$xml->attributes();

$aUnidades=$xml->UNIDAD;

$iEjercicios=count($xml->UNIDAD->EJERCICIO);
$aEjercicios=$xml->UNIDAD->EJERCICIO;

echo "Tenemos ". $iEjercicios. " ejercicios";


$xml1= array();
XMLToArrayFlat($xml,$xml1,'',false);
//caja ($xml1);

$xml2= array();
$xml2=xmlToArray($xml, true);
//caja ($xml2);

$xml3= array();
convertXmlObjToArr($xml,$xml3);
//caja ($xml3);

$xml4= array();
//$xml4=parseSimpleXML($xml);
//caja ($xml4);


?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Menu</title>
</head>

<body>
<?php

$i=1;
foreach ($aUnidades as $key => $aUnidad)
{
echo "<h2>Unidad ".sprintf("%02d",$i)."</h2>";
echo "<ul>";
$j=1;	
	$aEjercicios = $aUnidad->EJERCICIO;	
	foreach ($aEjercicios as $key => $Ejercicio)
	{
		$UUEE = sprintf("%02d",$i).sprintf("%02d",$j);
		echo "<li><a href='ejercicio.php?UUEEPP=".$UUEE."'>". sprintf("%02d",$j)."-".$Ejercicio->attributes()->ud ."</a></li>";
		$j++;
	}
echo "</ul>";
$i++;
}

?>


</body>
</html>