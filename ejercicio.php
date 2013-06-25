<?php
session_start();
include_once ('funciones.php');

$UUEEPP = $_GET['UUEEPP'];

if ($_GET['p'])
{
	$_SESSION['pantallas'] = $_GET['p'];	
}

if ($UUEEPP)
{
	if (strlen($UUEEPP)==4)
	{
		$UUEEPP=$UUEEPP."01";
	}
	
	if (strlen($UUEEPP)==6)
	{
		$UU = substr($UUEEPP,0,2);
		$EE = substr($UUEEPP,2,2);
		$PP = substr($UUEEPP,4,2);
	}
	else
	{
		echo "Ejercicio incorrecto";
		exit();
	}
}

$url = $UUEEPP.".xml";
$xml = readXML("curso/".$url,true);

$aAttr = $xml["EJERCICIO"]["attr"];
$aOracion = $xml["EJERCICIO"]["ORACION"];
//caja ($xml);

switch ($xml["EJERCICIO"]["attr"]["tipo"])
{
	case "escribir":
		include ('clases/escribir.php');
		$oEjercicio= new escribir($UUEEPP);
		$oEjercicio->arrayToClass($aAttr);
		$oAttr=$oEjercicio->getoAttr();
		break;
	case "combo":
		include ('clases/combo.php');
		$oEjercicio = new combo($UUEEPP);
		$oEjercicio->arrayToClass($aAttr);
		$oAttr=$oEjercicio->getoAttr();	
		break;
		
	case "botones":
		include ('clases/botones.php');
		$oEjercicio = new botones($UUEEPP);
		$oEjercicio->arrayToClass($aAttr);
		$oAttr=$oEjercicio->getoAttr();		
		break;
	default:
	
		break;
	
}

//caja($oAttr);

$oEjercicio->arrayToOracion($aOracion);
$oOracion=$oEjercicio->getoOracion();

//caja ($oOracion);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Ejercicio</title>
<script src="js/funciones.js" language="JavaScript"> </script>
<script src="js/APIWrapper.js" language="JavaScript"></script>
<script src="js/toScorm.js" language="JavaScript"> </script>
<link rel="stylesheet" type="text/css" href="css/estilo.css">
<style type="text/css">
<?
echo $oEjercicio->generaCss();
?>
.ejercicio{
width:800px;	
}

.enunciado{
background-color:#111;
color:#FF0;
margin: 15px;
padding: 5px;
text-align:center;
font-size:large;
font-weight:bold;
}

.oraciones{
margin:15px;
background-color:#111;
padding:5px;
}

.oracion{
/* top right bottom left */
background-color:#222;
margin: 3px 0px 3px 0px;
padding: 2px 0px 2px 0px;
padding: 12px;
}


/* botones */
input[type="radio"]{
/*position: absolute;*/
left: -9px;
}

label {

padding: 0.5em;
padding-left: 10px;
margin: 2px 5px 2px 5px;
background-position: 8px center;
background-repeat: no-repeat;
background-color: #FFF;
border: 5px solid #252525;
clear: both;
cursor: pointer;
}

.f_checkbox,.f_radio{background-repeat:no-repeat;background-position:3px center;height:16px;display:block;cursor:pointer;cursor:hand;line-height:120%}
.checked,.selected{color:#f0f0f0}
.f_radio:hover,.f_checkbox:hover{color:#fff !important}
.f_radio{padding:4px 24px}
.f_checkbox{padding:0.5em 24px}
.unchecked{background-image:url(../chk_off.png)}
.checked{background-image:url(../chk_on.png)}
.unselected{background-color:#FFF;color:#000}
.selected{background-color:#FF0;color:#F00}

</style>
</head>
<body bgcolor="#FFFFFF">
<form name="<? echo "form$UUEEPP"; ?>" action="escribir.html" method="post">
<div class="ejercicio">
	<div class="enunciado">
		<?
        echo "Unidad: $UU - Ejercicio $EE - Pantalla $PP\n";
        echo $oEjercicio->getEnunciadoHTML();
        ?>
	</div>
	<div class="oraciones">
		<? 
        echo $oEjercicio->generaHTMLOracion();
        ?>
	</div>
    <div class="pieEjercicio">
		<?
		echo $oEjercicio->generaPieEjercicio();
		?>
    </div>
</div>
<div class="navegacion">
<?
$sPP = substr($UUEEPP,4,2); 


if ($sPP!="01")
{
	
	echo "<a href='ejercicio.php?UUEEPP=".substr($UUEEPP,0,4).sprintf("%02d",intval($sPP)-1)."' >Anterior</a>";
}

if ($_SESSION['pantallas']!=intval($sPP))
{
	echo "<a href='ejercicio.php?UUEEPP=".substr($UUEEPP,0,4).sprintf("%02d",intval($sPP)+1)."' >Siguiente</a>";
}
echo "<br>";
echo $_SESSION['pantallas'] . "-". intval($sPP);

?>
</div>
</form>
<script> 
	window.onload = function() 
	{
		//SCORM
                initScorm();

                //document.getElementById("0101").onclick = Marca;
		var formulario = document.getElementById("<? echo "form".$UUEEPP; ?>");
		// var camposInput = formulario.getElementsByTagName("input");
		var camposInput = document.forms['<? echo "form".$UUEEPP; ?>'].elements;
		for(var i=0; i<camposInput.length; i++) 
		{
			if(camposInput[i].type == "radio") 
			{
				camposInput[i].onclick = Marca;
				/*
				camposInput[i].onmousemove = enciende; 
				camposInput[i].onMouseOut = apaga;
				
				document.getElementsByName("lab"+camposInput[i].id).onMouseMove = enciende;
				camposInput[i].onmousemove = enciende; 
				*/
			}
		}
                
                
	} 
</script>
</body>
</html>