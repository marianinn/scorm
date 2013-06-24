<?php

include ("funciones.php");

$rutaMenu = "menu.xml";

$xml = readXML ($rutaMenu);

caja($xml);

$aUnidades=$xml["MENU"]["UNIDAD"];



?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Menu</title>
</head>

<body>
<?php

//$i=1;
foreach ($aUnidades as $key => $aUnidad)
{
//echo "<h2>Unidad ".sprintf("%02d",$i)."</h2>";
echo "<h2>Unidad ".sprintf("%02d",$key+1)."</h2>";
echo "<ul>";
//$j=1;	
	$aEjercicios = $aUnidad["EJERCICIO"];	
	foreach ($aEjercicios as $key2 => $Ejercicio)
	{
//		$UUEE = sprintf("%02d",$i).sprintf("%02d",$j);
		$UUEE = sprintf("%02d",$key+1).sprintf("%02d",$key2+1);
		echo "<li><a href='ejercicio.php?UUEEPP=".$UUEE."&p=".$Ejercicio["attr"]["pantallas"]."'>". sprintf("%02d",$key2+1)."-".$Ejercicio["attr"]["ud"] ."(".$Ejercicio["attr"]["pantallas"].")"."</a></li>";
//		$j++;
	}
echo "</ul>";
$i++;
}

?>


</body>
</html>