<?php

class oracion
{
//Escribir
var $frase;
var $solucion;
var $x;
var $y;
var $anchocaja;
var $xImg;
var $yImg;
var $anchoImg;
var $altoImg;
//Combo
var $ajusteAncho;
var $opciones;
var $ancho;
var $alto;
var $ajusteVertical;

//Ajenas
var $generatedHTML;

function getFrase() { return $this->frase; } 
function getSolucion() { return $this->solucion; } 
function getX() { return $this->x; } 
function getY() { return $this->y; } 
function getAnchocaja() { return $this->anchocaja; } 
function getXImg() { return $this->xImg; } 
function getYImg() { return $this->yImg; } 
function getAnchoImg() { return $this->anchoImg; } 
function getAltoImg() { return $this->altoImg; } 
function getAjusteAncho() { return $this->ajusteAncho; } 
function getOpciones() { return $this->opciones; } 
function getAncho() { return $this->ancho; } 
function getAlto() { return $this->alto; } 
function getAjusteVertical() { return $this->ajusteVertical; } 
function getGeneratedHTML() { return $this->generatedHTML; }

function setFrase($x) { $this->frase = $x; } 
function setSolucion($x) { $this->solucion = $x; } 
function setX($x) { $this->x = $x; } 
function setY($x) { $this->y = $x; } 
function setAnchocaja($x) { $this->anchocaja = $x; } 
function setXImg($x) { $this->xImg = $x; } 
function setYImg($x) { $this->yImg = $x; } 
function setAnchoImg($x) { $this->anchoImg = $x; } 
function setAltoImg($x) { $this->altoImg = $x; } 
function setAjusteAncho($x) { $this->ajusteAncho = $x; } 
function setOpciones($x) { $this->opciones = $x; } 
function setAncho($x) { $this->ancho = $x; } 
function setAlto($x) { $this->alto = $x; } 
function setAjusteVertical($x) { $this->ajusteVertical = $x; } 
function setGeneratedHTML($x) { $this->generatedHTML = $x; }


}

