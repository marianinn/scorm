<?
$color = "FFFF00";

?>
<html> 
<head>
<link rel="stylesheet" type="text/css" href="css.php?color=<? echo $color?>" title="css0"/>
  <link rel="alternate stylesheet" type="text/css" href="css1.css" title="css1"/>
  <link rel="alternate stylesheet" type="text/css" href="css2.css" title="css2"/>
  
  
<script>
function setActiveStyleSheet(title) {
  var i, a, main;
  for(i=0; (a = document.getElementsByTagName("link")[i]); i++) {
    if(a.getAttribute("rel").indexOf("style") != -1 && a.getAttribute("title")) {
      a.disabled = true;
      if(a.getAttribute("title") == title) a.disabled = false;
    }
  }
}

function cambiaEstilo ()
{
	//classes.body.backgroundColor = "#FF0000";	
	//document.styleSheets[1].body.backgroundColor = "#FF0000";
	alert (document.styleSheets[0]);
	//alert (document.styleSheets[0].cssRules.length);
	alert (document.styleSheets[0].rules.item(0));
	
	
	document.styleSheets[1].cssRules[0].style.backgroundColor = '#FF6600';
}

</script>

</head>

<body>
<div class="color"> hola </div>
<a href="#" onClick="setActiveStyleSheet('css0'); return false;">css0</a>
<a href="#" onClick="setActiveStyleSheet('css1'); return false;">css1</a>
<a href="#" onClick="setActiveStyleSheet('css2'); return false;">css2</a>
<hr> 
<a href="#" onClick="cambiaEstilo(); return false;">caambia</a>
</body>
</html>