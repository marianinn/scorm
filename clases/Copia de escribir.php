<?php

include_once ("oracion.php");

class escribir
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


class escribir2
{
	var $oEjercicio;
	var $aoOracion;
	
	function escribir2()
	{
		$this->oEjercicio = new escribir ();
	}
	
	function arrayToClass ($aData)
	{
		foreach ($aData as $key => $value)
		{
			call_user_func(array($this->oEjercicio,"set".ucfirst($key)),$value);
		}
	}

	function getoAttr()
	{
		return $this->oEjercicio;
		
	}

	function arrayToOracion ($aData)
	{
		for ($i=0;$i<count($aData);$i++)
		{
			$oOracionTemp = new oracion();
			foreach ($aData[$i]["attr"] as $key => $value)
			{
				call_user_func(array($oOracionTemp,"set".ucfirst($key)),$value);
			}
			$this->aoOracion[] = $oOracionTemp;
		}
	}
	
	function getoOracion()
	{
		return $this->aoOracion;	
	}
	
	
	function generaCss()
	{
		$css = ".oracion{";
		if ($this->oEjercicio->getTamTexto() != "")
		{
			$css = $css."font-size:".$this->oEjercicio->getTamTexto()."px;";
		}
		if ($this->oEjercicio->getColorTexto() != "")
		{
			$css = $css."color:#".$this->oEjercicio->getColorTexto().";";
		}
		$css = $css."}\n.cajaTexto{";
		
		if ($this->oEjercicio->getTamTextoEscrito() != "")
		{
			$css = $css."font-size:".$this->oEjercicio->getTamTextoEscrito()."px;";
		}
		if ($this->oEjercicio->getColorTextoEscrito() != "")
		{
			$css = $css."color:#".$this->oEjercicio->getColorTextoEscrito().";";
		}
		if ($this->oEjercicio->getAlinearTextoEscrito() != "")
		{
			$css = $css."text-align:".$this->oEjercicio->getAlinearTextoEscrito().";";
		}
		if ($this->oEjercicio->getFondoCaja() == "no")
		{
			$css = $css."background:"."transparent".";"; //transparent
		}
		if ($this->oEjercicio->getColorCaja() != "" && $this->oEjercicio->getFondoCaja() == "si")
		{
			$css = $css."background-color:#".$this->oEjercicio->getColorCaja().";";
		}
		if ($this->oEjercicio->getBordeCaja() == "no")
		{
			$css = $css."border:"."none".";"; //
		}
		if ($this->oEjercicio->getColorBorde() != "")
		{
			$css = $css."border-color:#".$this->oEjercicio->getColorBorde().";";
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
		if ($this->oEjercicio->getAnchocajas() != "")
		{
			$sPropCajas=$sPropCajas." size=".$this->oEjercicio->getAnchocajas();
		}
		if ($this->oEjercicio->getMaxCaracteres() != "")
		{
			$sPropCajas=$sPropCajas." maxlength=".$this->oEjercicio->getMaxCaracteres();
		}
		
		foreach ($this->aoOracion as $key => $oOracion)
		{
			$field = "<input type='text' class='cajaTexto' id='$key' name='$key' lang='".$oOracion->getSolucion()."' $sPropCajas/>";
			$contenido = str_replace("*",$field,$oOracion->getFrase());
			$text = "<div class='oracion'>".$contenido."</div>";
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
		$sBotones='';
		$sBotonCorrige = '
		<input id="corrige" name="corregir" value="Corregir" type="button" onClick="validaForm(\'form1\');">';
		//    
		$sBotonReset = '<input id="resetea" name="repetir" value="Repetir" type="button" onClick="reseteaForm(\'form1\');">';
		
		$sBotones = $sBotonCorrige . " - " . $sBotonReset;
		
		return $sBotones;
	}
	
}