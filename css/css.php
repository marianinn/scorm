<?
header('Content-type: text/css');
$color = "#".$_GET["color"];
//print_r ($GLOBALS);

echo '.color {
color: #FF0000;
background-color: '.$color.';
}';
