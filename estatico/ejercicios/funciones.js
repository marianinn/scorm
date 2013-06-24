var bComparaMayusculas = false;  //Variable para elegir si se validaran mayusculas o no
var sFoco =""; 	// Variable que guarda el elemento que tiene el foco por si se utilizan botones en ejercicios de escribir


function validaForm(nomForm)
{
	var i;
	var sAux="";
	var frm = document.forms[nomForm];
	//frm = document.getElementById(nomForm);
	for (i=0;i<frm.elements.length;i++)
	{
		sAux += "NOMBRE: " + frm.elements[i].name + " ";
		sAux += "TIPO :  " + frm.elements[i].type + " "; ;
		sAux += "VALOR: " + frm.elements[i].value + "\n" ;
	}
	
	for (i=0;i<frm.elements.length;i++)
	{
		respuesta (frm.elements[i],bComparaMayusculas);			
	}
	
	//alert(sAux);
}

function validaUno(nomForm, campo)
{
	respuesta (document.forms[nomForm].elements[campo],bComparaMayusculas);	
}

function respuesta(campo,distingueMays)
{
	var distingueMays = distingueMays || false;

	switch (campo.type.toLowerCase())
	{
		case "text":  
		case "password":  
		case "textarea":
		{
			if (esCorrecto (campo.value,campo.lang,distingueMays))
			{
				campo.style.backgroundColor = "#00FF00";
			}
			else
			{
				campo.style.backgroundColor = "#FF0000";	
			}	
		}
		break;
		case "radio":  
		case "checkbox":
		{
			//alert (campo);
			//for (i=0;i<campo.length;i++)
			//{
				//alert(campo.name);
				if (campo.checked == true)
				{
					campoSol = 's'+campo.id.substring(0,2);
					//alert (campoSol);
					solucion = document.forms[campo.form.name].elements[campoSol].value
					if (esCorrecto(campo.value,solucion,distingueMays))
					{
						document.getElementById('lab'+campo.id).style.backgroundColor = "#00FF00";
					}
					else
					{
						//alert ('lab'+campo.id);
						document.getElementById('lab'+campo.id).style.backgroundColor = "#FF0000";
					}
				}
				else
				{
					document.getElementById('lab'+campo.id).style.backgroundColor = "";
				}
			//}
		}
		break;
		case "select-one":  
		case "select-multi":	
		{
			//alert (campo.lang);
			//alert (campo.title);
			//if (campo.solucion == campo.options[campo.selectedIndex].text)
			//alert (campo.solucion + " - " + campo.value + " - " + campo.title);
			if (esCorrecto (campo.value,campo.lang,distingueMays))
			{
				campo.style.backgroundColor = "#00FF00";
			}
			else
			{
				campo.style.backgroundColor = "#FF0000";	
			}
		}
	}
}

function esCorrecto (respuesta,respuestas,distingueMays)
{

	if (distingueMays == false)
	{
		respuesta = respuesta.toLowerCase();
		respuestas = respuestas.toLowerCase();
	}

	var arrRespuestas = respuestas.split('#');
	var bCorrecto = false;
	
	for (i=0;i<arrRespuestas.length;i++)
	{
		if (arrRespuestas[i]==respuesta)
		{
			bCorrecto=true;
			break
		}
	}
	return bCorrecto;
	
}


function reseteaForm (nomForm)
{
	var frm = document.forms[nomForm];
	var actual;
	frm.reset;
	for (i=0;i<frm.elements.length;i++)
	{
		actual = frm.elements[i];
		switch (actual.type.toLowerCase())  
	    {  
		case "text":  
		case "password":  
		case "textarea":  
		//case "hidden":  
			actual.value = "";  
			actual.style.backgroundColor = ""; //he quitado #FFFFFF porque asi deja el anterior y no blanco
		break;
		case "radio":  
		case "checkbox":  
			if (actual.checked)  
			{  
				actual.checked = false; 
			}
			//Para el elemento
			actual.className = "";
			actual.style.backgroundColor = "";
			//Para el label del elemento
			actual.parentElement.className="";
			actual.parentElement.style.backgroundColor="";
			
		break;  
		case "select-one":  
		case "select-multi":  
			actual.selectedIndex = 0; 
			actual.style.backgroundColor = "";
			break;  
		default:  
			break;  
		}  
	}
}

function EscribeBoton(caracter)
{
	
	campoAct=document.forms['form1'].elements[sFoco];;
	formAct=document.forms['form1'];
	alert (campoAct.selectionStart);
	
inicio = document.forms[formAct.name].elements[campoAct.name].selectionStart;
fin = document.forms['form1'].elements[campoAct.name].selectionEnd;
antigua = document.forms['form1'].elements[campoAct.name].value;
alert (inicio+"-"+fin);
 nueva=antigua.substring(0,inicio)+caracter+antigua.substr(fin);
 alert(nueva);
document.forms['form1'].elements[campoAct.name].value = "";
document.forms['form1'].elements[campoAct.name].value = nueva;
document.forms['form1'].elements[campoAct.name].selectionStart=inicio+1;
document.forms['form1'].elements[campoAct.name].selectionEnd=inicio+1;

return true;
document.forms['form1'].elements[campoAct].selectionStart=0; 
document.forms['form1'].elements[campoAct].selectionEnd=3;

}
 


function probar(texto)
{
	alert (texto);	
}

//------------- AUDIO



// Mouseover/ Click sound effect- by JavaScript Kit (www.javascriptkit.com)
// Visit JavaScript Kit at http://www.javascriptkit.com/ for full source code

//** Usage: Instantiate script by calling: var uniquevar=createsoundbite("soundfile1", "fallbackfile2", "fallebacksound3", etc)
//** Call: uniquevar.playclip() to play sound

var html5_audiotypes={ //define list of audio file extensions and their associated audio types. Add to it if your specified audio file isn't on this list:
	"mp3": "audio/mpeg",
	"mp4": "audio/mp4",
	"ogg": "audio/ogg",
	"wav": "audio/wav"
}

function createsoundbite(sound){
	var html5audio=document.createElement('audio');
	if (html5audio.canPlayType)
	{ //check support for HTML5 audio
		for (var i=0; i<arguments.length; i++)
		{
			var sourceel=document.createElement('source')
			sourceel.setAttribute('src', arguments[i]);
			if (arguments[i].match(/\.(\w+)$/i))
			{
				sourceel.setAttribute('type', html5_audiotypes[RegExp.$1]);
			}
			html5audio.appendChild(sourceel);
		}
		html5audio.load()
		html5audio.playclip=function(){
			html5audio.pause();
			html5audio.currentTime=0;
			html5audio.play();
		}
		return html5audio;
	}
	else{
		return {playclip:function(){throw new Error("Your browser doesn't support HTML5 audio unfortunately")}}
	}
}

//Initialize two sound clips with 1 fallback file each:

var sound01040201=createsoundbite("01040201.ogg","01040201.mp3");
var sound01040202=createsoundbite("01040202.mp3");
var sound01040203=createsoundbite("01040203.mp3");
var sound01040204=createsoundbite("01040204.mp3");

//var sound01040201=createsoundbite("01040201.ogg", "01040201.mp3")
//var clicksound=createsoundbite("click.ogg", "click.mp3")

