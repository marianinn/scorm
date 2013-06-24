<?php
include ("funciones.php");


$url = "escribir.xml";
$xml = readXML($url);
$aAtributos=$xml->attributes();

caja ($xml,20,40);
caja ($aAtributos,20,40);
echo $aAtributos['tipo']."<br>";


foreach ($aAtributos as $key => $value)
{
	echo "[".$key."]"." = > ".$value."<br>";
}

?>
<table align="center" border="1">
    	<tr><td>Frase</td><td>Solucion</td>
<?php
	for($i=0; $i<count($xml->ORACION); $i++)
		echo '<tr><td>'.$xml->ORACION[$i]->attributes()->frase.'</td><td>'.$xml->ORACION[$i]->attributes()->solucion.'</td></tr>';
?>
</table>

