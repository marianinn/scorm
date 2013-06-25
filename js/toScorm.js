/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

function initScorm ()
{
    //alert ("inicioScorm");
    doLMSInitialize();
    doLMSSetValue("cmi.core.lesson_status", "incomplete");
    doLMSSetValue("cmi.core.score.raw",0);
}

function partialScorm (puntuacion)
{
     //alert ("Parcial:"+puntuacion);
     doLMSSetValue("cmi.core.score.raw",puntuacion);
     
}


function endScorm (puntuacion)
{
    //alert ("Final:"+puntuacion);
    doLMSSetValue("cmi.core.score.raw",puntuacion);
    if (puntuacion=="100")
    {
        //alert("PERFECTOO!!!!!!");
        doLMSSetValue("cmi.core.lesson_status", "complete");
    }
    doLMSFinish();
   
}