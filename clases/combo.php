<?php

require_once ("clases/ejercicio.php");

class comboATTR{

var $tipo;
var $enunciado;
var $anchocajas;
var $altocajas;
var $tamTexto;
var $colorTexto;
var $tamTextoCombo;
var $colorTextoCombo;
var $colorBordes;
var $alphaBordes;
var $textoInicial="...";		//"..."	texto que aparece al principio en los combos (por defecto … )
var $caracterSeparacion=",";	//"," 	carácter que separa las distintas opciones de elección; si es nulo o no aparece la entrada, se toma por defecto la coma ","
var $desordenarCombos="si";		//"si"	define si se desordenan las palabras de los combos o no (por defecto="si")
var $evaluacion="global";		//"global"	define el tipo de evaluación del ejercicio: si es ="global" (por defecto) o "parcial"
var $bordesBotones;
var $sonidosCorreccionParcial;
var $sonidoBienFinal;
var $mascara;

function getTipo() { return $this->tipo; } 
function getEnunciado() { return $this->enunciado; } 
function getAnchocajas() { return $this->anchocajas; } 
function getAltocajas() { return $this->altocajas; } 
function getTamTexto() { return $this->tamTexto; } 
function getColorTexto() { return $this->colorTexto; } 
function getTamTextoCombo() { return $this->tamTextoCombo; } 
function getColorTextoCombo() { return $this->colorTextoCombo; } 
function getColorBordes() { return $this->colorBordes; } 
function getAlphaBordes() { return $this->alphaBordes; } 
function getTextoInicial() { return $this->textoInicial; } 
function getCaracterSeparacion() { return $this->caracterSeparacion; } 
function getDesordenarCombos() { return $this->desordenarCombos; } 
function getEvaluacion() { return $this->evaluacion; } 
function getBordesBotones() { return $this->bordesBotones; } 
function getSonidosCorreccionParcial() { return $this->sonidosCorreccionParcial; } 
function getSonidoBienFinal() { return $this->sonidoBienFinal; } 
function getMascara() { return $this->mascara; } 

function setTipo($x) { $this->tipo = $x; } 
function setEnunciado($x) { $this->enunciado = $x; } 
function setAnchocajas($x) { $this->anchocajas = $x; } 
function setAltocajas($x) { $this->altocajas = $x; } 
function setTamTexto($x) { $this->tamTexto = $x; } 
function setColorTexto($x) { $this->colorTexto = $x; } 
function setTamTextoCombo($x) { $this->tamTextoCombo = $x; } 
function setColorTextoCombo($x) { $this->colorTextoCombo = $x; } 
function setColorBordes($x) { $this->colorBordes = $x; } 
function setAlphaBordes($x) { $this->alphaBordes = $x; } 
function setTextoInicial($x) { $this->textoInicial = $x; } 
function setCaracterSeparacion($x) { $this->caracterSeparacion = $x; } 
function setDesordenarCombos($x) { $this->desordenarCombos = $x; } 
function setEvaluacion($x) { $this->evaluacion = $x; } 
function setBordesBotones($x) { $this->bordesBotones = $x; } 
function setSonidosCorreccionParcial($x) { $this->sonidosCorreccionParcial = $x; } 
function setSonidoBienFinal($x) { $this->sonidoBienFinal = $x; } 
function setMascara($x) { $this->mascara = $x; } 

}


class combo extends ejercicio{

	function combo ($idEjercicio)
	{
		$this->oATTR = new comboATTR ();
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
		$css = $css."}\n.combo{";
		
		if ($this->oATTR->getTamTextoCombo() != "")
		{
			$css = $css."font-size:".$this->oATTR->getTamTextoCombo()."px;";
		}
		if ($this->oATTR->getColorTextoCombo() != "")
		{
			$css = $css."color:#".$this->oATTR->getColorTextoCombo().";";
		}
		if ($this->oATTR->getColorBordes() != "")
		{
			$css = $css."border-color:#".$this->oATTR->getColorBordes().";";
		}
		if ($this->oATTR->getAnchocajas() != "")
		{
			$css = $css."width:".$this->oATTR->getAnchocajas()."px;";
		}
		if ($this->oATTR->getAltocajas() != "")
		{
			$css = $css."height:".$this->oATTR->getAltocajas()."px;";
		}
		if ($this->oATTR->getAlphaBordes() != "")
		{
			$css = $css."xxx3:".$this->oATTR->getAlphaBordes()."px;";
		}
		
		/*
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
		*/
		
		$css = $css."}\n";
		return $css;
	}
	
	function generaHTMLOracion()
	{
		$HTML="";

		//Propiedades que afectan a los combos
		$sPropCombos="";
		$sValidaParcial = "";
		
		foreach ($this->aoOracion as $key => $oOracion)
		{
			
			if ($this->oATTR->getEvaluacion()=="parcial")
			{
				$sValidaParcial = "onChange=\"validaUno('form$this->idEjercicio','$key')\"";
			}

			$aOpciones=explode($this->oATTR->getCaracterSeparacion(),$oOracion->getOpciones());
			if ($this->oATTR->getDesordenarCombos() == "si")
			{
				shuffle($aOpciones);	
			}
			$sOpciones="<option value=\"\">".$this->oATTR->getTextoInicial()."</option>\n";	
			foreach ($aOpciones as $key => $value)
			{
				$sOpciones .="<option value=\"$value\">$value</option>\n";
			}
			
			$sSelect = "<select class=\"combo\" lang=\"".$oOracion->getSolucion()."\" $sValidaParcial>\n".$sOpciones."</select>";
			$contenido = str_replace("*",$sSelect,$oOracion->getFrase());
			$text = "<div class='oracion'>".$contenido."</div>\n";
			$oOracion->setGeneratedHTML($contenido);
			
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
		
		return $sBotones;
	}
	
}