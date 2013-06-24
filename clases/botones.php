<?php

require_once ("clases/ejercicio.php");

class botonesATTR{

var $tipo;
var $enunciado;
var $anchocajas;
var $altocajas;
var $xBotones;
var $separacionBotones;
var $colorBorde;
var $alphaBorde;
var $caracterSeparacion=",";//"," carácter que separa las distintas opciones de elección; si nulo por defecto ","
var $caracterSalto;			//carácter salto de línea en los botones; si nulo por defecto "*"
var $tamTexto;
var $colorTexto;
var $interlineadoTexto;
var $tamTextoBoton;
var $colorTextoBoton;
var $interlineadoTextoBoton;
var $numeracion;
var $tamTextoNumeracion;
var $colorTextoNumeracion;
var $desordenar="si";			//"si" define si se desordenan, o no automáticamente los botones: (por defecto; sí) valores:(no,si,x,y,grupos) no = no se desordenan; si = se desordenan todos; x = se desordenan aquellos que tienen igual coordenada y; y = se desordenan aquellos que tienen igual coordenada x; desordenar = "grupos" = se desordenan entre sí aquellos que tengan igual valor en el parámetro grupoDesordenar
var $botonesAudio;
var $colorTextoBotonSelecionado;
var $colorTextoBotonNoSelecionado;
var $alinearTextoBoton;
var $bordesBotones;
var $mascara;

function getTipo() { return $this->tipo; } 
function getEnunciado() { return $this->enunciado; } 
function getAnchocajas() { return $this->anchocajas; } 
function getAltocajas() { return $this->altocajas; } 
function getXBotones() { return $this->xBotones; } 
function getSeparacionBotones() { return $this->separacionBotones; } 
function getColorBorde() { return $this->colorBorde; } 
function getAlphaBorde() { return $this->alphaBorde; } 
function getCaracterSeparacion() { return $this->caracterSeparacion; } 
function getCaracterSalto() { return $this->caracterSalto; } 
function getTamTexto() { return $this->tamTexto; } 
function getColorTexto() { return $this->colorTexto; } 
function getInterlineadoTexto() { return $this->interlineadoTexto; } 
function getTamTextoBoton() { return $this->tamTextoBoton; } 
function getColorTextoBoton() { return $this->colorTextoBoton; } 
function getInterlineadoTextoBoton() { return $this->interlineadoTextoBoton; } 
function getNumeracion() { return $this->numeracion; } 
function getTamTextoNumeracion() { return $this->tamTextoNumeracion; } 
function getColorTextoNumeracion() { return $this->colorTextoNumeracion; } 
function getDesordenar() { return $this->desordenar; } 
function getBotonesAudio() { return $this->botonesAudio; } 
function getColorTextoBotonSelecionado() { return $this->colorTextoBotonSelecionado; } 
function getColorTextoBotonNoSelecionado() { return $this->colorTextoBotonNoSelecionado; } 
function getAlinearTextoBoton() { return $this->alinearTextoBoton; } 
function getBordesBotones() { return $this->bordesBotones; } 
function getMascara() { return $this->mascara; } 

function setTipo($x) { $this->tipo = $x; } 
function setEnunciado($x) { $this->enunciado = $x; } 
function setAnchocajas($x) { $this->anchocajas = $x; } 
function setAltocajas($x) { $this->altocajas = $x; } 
function setXBotones($x) { $this->xBotones = $x; } 
function setSeparacionBotones($x) { $this->separacionBotones = $x; } 
function setColorBorde($x) { $this->colorBorde = $x; } 
function setAlphaBorde($x) { $this->alphaBorde = $x; } 
function setCaracterSeparacion($x) { $this->caracterSeparacion = $x; } 
function setCaracterSalto($x) { $this->caracterSalto = $x; } 
function setTamTexto($x) { $this->tamTexto = $x; } 
function setColorTexto($x) { $this->colorTexto = $x; } 
function setInterlineadoTexto($x) { $this->interlineadoTexto = $x; } 
function setTamTextoBoton($x) { $this->tamTextoBoton = $x; } 
function setColorTextoBoton($x) { $this->colorTextoBoton = $x; } 
function setInterlineadoTextoBoton($x) { $this->interlineadoTextoBoton = $x; } 
function setNumeracion($x) { $this->numeracion = $x; } 
function setTamTextoNumeracion($x) { $this->tamTextoNumeracion = $x; } 
function setColorTextoNumeracion($x) { $this->colorTextoNumeracion = $x; } 
function setDesordenar($x) { $this->desordenar = $x; } 
function setBotonesAudio($x) { $this->botonesAudio = $x; } 
function setColorTextoBotonSelecionado($x) { $this->colorTextoBotonSelecionado = $x; } 
function setColorTextoBotonNoSelecionado($x) { $this->colorTextoBotonNoSelecionado = $x; } 
function setAlinearTextoBoton($x) { $this->alinearTextoBoton = $x; } 
function setBordesBotones($x) { $this->bordesBotones = $x; } 
function setMascara($x) { $this->mascara = $x; } 

}


class botones extends ejercicio{

	function botones ($idEjercicio)
	{
		$this->oATTR = new botonesATTR ();
		$this->idEjercicio = $idEjercicio;
	}
	
	function generaCss()
	{
		return "";
		
		$css = ".oracion{";
		if ($this->oATTR->getTamTexto() != "")
		{
			$css = $css."font-size:".$this->oATTR->getTamTexto()."px;";
		}
		if ($this->oATTR->getColorTexto() != "")
		{
			$css = $css."color:#".$this->oATTR->getColorTexto().";";
		}
		$css = $css."}\n.botones{";
		
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
		
		foreach ($this->aoOracion as $key => $oOracion)
		{
			$aOpciones=explode($this->oATTR->getCaracterSeparacion(),$oOracion->getOpciones());
			if ($this->oATTR->getDesordenar() == "si")
			{
				shuffle($aOpciones);
			}
			$sOpciones="";
			foreach ($aOpciones as $key2 => $value)
			{
				$sIdElemento = $this->formateaCodigo($key+1).$this->formateaCodigo($key2+1);
				
				$sOpciones .= "<label id=\"lab$sIdElemento\" for=\"$sIdElemento\" onMouseMove=\"enciende(this)\" onMouseOut=\"apaga(this)\">\n<input id=\"$sIdElemento\" type=\"radio\" name=\"boton".$this->formateaCodigo($key)."\" value=\"$value\" >$value\n</label>\n";
				//$sOpciones .= "<label id=\"lab$sIdElemento\" for=\"$sIdElemento\">\n<input id=\"$sIdElemento\" type=\"radio\" name=\"boton".$this->formateaCodigo($key)."\" value=\"$value\" >$value\n</label>\n";
			}
			$sCabeceraEjercicio = $oOracion->getFrase()."\n<input type=\"hidden\" name=\"sol...\">"; 
			$contenido=$sCabeceraEjercicio."\n".$sOpciones;
			$text = "<div class='oracion'>".$contenido."</div>\n";
			$oOracion->setGeneratedHTML($contenido);
			
			$HTML = $HTML . $text;
			
		}
		return $HTML;
		
	/*
	    [0] => oracion Object
        (
            [frase] => Frase A
            [solucion] => 1
            [x] => 200
            [y] => 150
            [anchocaja] => 
            [xImg] => 150
            [yImg] => 150
            [anchoImg] => poligono
            [altoImg] => 0,0:40,40:40,0:0,40
            [ajusteAncho] => 
            [opciones] => uno,dos
            [ancho] => 
            [alto] => 
            [ajusteVertical] => 
            [generatedHTML] => 
        )

    [1] => oracion Object
        (
            [frase] => Frase B
            [solucion] => 2
            [x] => 200
            [y] => 250
            [anchocaja] => 
            [xImg] => 150
            [yImg] => 250
            [anchoImg] => 40
            [altoImg] => 40
            [ajusteAncho] => 
            [opciones] => uno,dos
            [ancho] => 
            [alto] => 
            [ajusteVertical] => 
            [generatedHTML] => 
        )

	
	
	<label id="lab0101" for="0101" onMouseMove="enciende(this)" onMouseOut="apaga(this)">
	<input id="0101" type="radio" name="boton01" value="Uno" >Uno
	</label>
	*/
		
		
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
		return "";
		
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