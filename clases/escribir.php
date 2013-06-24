<?php

include_once ("clases/ejercicio.php");

class escribirATTR
{
	
var $tipo;
var $enunciado;
var $anchocajas;
var $maxCaracteres;
var $tamTexto;
var $colorTexto;
var $tamTextoEscrito;
var $colorTextoEscrito;
var $alinearTextoEscrito;
var $colorTextoCorregido;
var $fondoCaja;
var $colorCaja;
var $bordeCaja;
var $colorBorde;
var $permitirMayusculas;
var $distincionMayusculas;
var $evaluacion;
var $ajustarAContenido;
var $bordesBotones;

function getTipo() { return $this->tipo; } 
function getEnunciado() { return $this->enunciado; } 
function getAnchocajas() { return $this->anchocajas; } 
function getMaxCaracteres() { return $this->maxCaracteres; } 
function getTamTexto() { return $this->tamTexto; } 
function getColorTexto() { return $this->colorTexto; } 
function getTamTextoEscrito() { return $this->tamTextoEscrito; } 
function getColorTextoEscrito() { return $this->colorTextoEscrito; } 
function getAlinearTextoEscrito() { return $this->alinearTextoEscrito; } 
function getColorTextoCorregido() { return $this->colorTextoCorregido; } 
function getFondoCaja() { return $this->fondoCaja; } 
function getColorCaja() { return $this->colorCaja; } 
function getBordeCaja() { return $this->bordeCaja; } 
function getColorBorde() { return $this->colorBorde; } 
function getPermitirMayusculas() { return $this->permitirMayusculas; } 
function getDistincionMayusculas() { return $this->distincionMayusculas; } 
function getEvaluacion() { return $this->evaluacion; } 
function getAjustarAContenido() { return $this->ajustarAContenido; } 
function getBordesBotones() { return $this->bordesBotones; } 
function setTipo($x) { $this->tipo = $x; } 
function setEnunciado($x) { $this->enunciado = $x; } 
function setAnchocajas($x) { $this->anchocajas = $x; } 
function setMaxCaracteres($x) { $this->maxCaracteres = $x; } 
function setTamTexto($x) { $this->tamTexto = $x; } 
function setColorTexto($x) { $this->colorTexto = $x; } 
function setTamTextoEscrito($x) { $this->tamTextoEscrito = $x; } 
function setColorTextoEscrito($x) { $this->colorTextoEscrito = $x; } 
function setAlinearTextoEscrito($x) { $this->alinearTextoEscrito = $x; } 
function setColorTextoCorregido($x) { $this->colorTextoCorregido = $x; } 
function setFondoCaja($x) { $this->fondoCaja = $x; } 
function setColorCaja($x) { $this->colorCaja = $x; } 
function setBordeCaja($x) { $this->bordeCaja = $x; } 
function setColorBorde($x) { $this->colorBorde = $x; } 
function setPermitirMayusculas($x) { $this->permitirMayusculas = $x; } 
function setDistincionMayusculas($x) { $this->distincionMayusculas = $x; } 
function setEvaluacion($x) { $this->evaluacion = $x; } 
function setAjustarAContenido($x) { $this->ajustarAContenido = $x; } 
function setBordesBotones($x) { $this->bordesBotones = $x; } 
	
}


class escribir extends ejercicio
{
	
	function escribir($idEjercicio)
	{
		$this->oATTR = new escribirATTR ();
		$this->idEjercicio = $idEjercicio;
	}
	
	function generaCss()
	{
		$css = ".oracion{";
		if ($this->oATTR->getTamTexto() != "")
		{
			$css = $css."font-size:".$this->oATTR->getTamTexto()."px;";
		}
		if ($this->oATTR->getColorTexto() != "")
		{
			$css = $css."color:#".$this->oATTR->getColorTexto().";";
		}
		$css = $css."}\n.cajaTexto{";
		
		if ($this->oATTR->getTamTextoEscrito() != "")
		{
			$css = $css."font-size:".$this->oATTR->getTamTextoEscrito()."px;";
		}
		if ($this->oATTR->getColorTextoEscrito() != "")
		{
			$css = $css."color:#".$this->oATTR->getColorTextoEscrito().";";
		}
		if ($this->oATTR->getAlinearTextoEscrito() != "")
		{
			$css = $css."text-align:".$this->oATTR->getAlinearTextoEscrito().";";
		}
		if ($this->oATTR->getFondoCaja() == "no")
		{
			$css = $css."background:"."transparent".";"; //transparent
		}
		if ($this->oATTR->getColorCaja() != "" && $this->oATTR->getFondoCaja() == "si")
		{
			$css = $css."background-color:#".$this->oATTR->getColorCaja().";";
		}
		if ($this->oATTR->getBordeCaja() == "no")
		{
			$css = $css."border:"."none".";"; //
		}
		if ($this->oATTR->getColorBorde() != "")
		{
			$css = $css."border-color:#".$this->oATTR->getColorBorde().";";
		}
		
		$css = $css."}\n";
		return $css;
	}
	
	function generaHTMLOracion()
	{
		$HTML="";
		$i=1;
		//Propiedades que afectan a los recuadros
		$sPropCajas="";
		$sValidaParcial = "";
		
		if ($this->oATTR->getAnchocajas() != "")
		{
			$sPropCajas=$sPropCajas." size=".$this->oATTR->getAnchocajas();
		}
		if ($this->oATTR->getMaxCaracteres() != "")
		{
			$sPropCajas=$sPropCajas." maxlength=".$this->oATTR->getMaxCaracteres();
		}
		
		foreach ($this->aoOracion as $key => $oOracion)
		{
			if ($this->oATTR->getEvaluacion()=="parcial")
			{
				$sValidaParcial = "onChange=\"validaUno('form$this->idEjercicio','$key')\"";
			}
			
			$field = "<input type='text' class='cajaTexto' id='$key' name='$key' lang='".$oOracion->getSolucion()."' $sValidaParcial $sPropCajas/>";
			$contenido = str_replace("*",$field,$oOracion->getFrase());
			$text = "<div class='oracion'>".$contenido."</div>\n";
			$oOracion->setGeneratedHTML($contenido);
			/*
			<div class="oracion">
    Este animal es una <input type="text" id="1" name="1" lang="vaca#cow#1" onChange="validaUno('form1','1')"/>
    </div>'*/
			$HTML = $HTML . $text;
		}
		return $HTML;
	}
	
	function generaPieEjercicio ()
	{
		if ($this->oATTR->getEvaluacion()=="parcial")
			{
				$sValidaParcial = "disabled";
			}
		
		$sBotones='';
		$sBotonCorrige = "
		<input id='corrige' name='corregir' value='Corregir' $sValidaParcial type='button' onClick=\"validaForm('form$this->idEjercicio');\">";
		//    
		$sBotonReset = "<input id='resetea' name='repetir' value='Repetir' type='button' onClick=\"reseteaForm('form$this->idEjercicio');\">";
		
		$sBotones = $sBotonCorrige . " - " . $sBotonReset;
		
		return $sBotones.$this->generaJSFinal();
	}
	
	function generaJSFinal ()
	{
		$sJSFinal="";
		
		//Si hay que distinguir entre mayusculas y minusculas, cambio la variable javascript
		if ($this->oATTR->getDistincionMayusculas()=="si")
		{
			$sJSFinal="bComparaMayusculas = true;";	
		}
		elseif ($this->oATTR->getDistincionMayusculas()=="no")
		{
			$sJSFinal="bComparaMayusculas = false;";	
		}
			
		return "\n<script languaje=\"javascript\">\n".$sJSFinal."\n</script>\n";
	}
	
	
}