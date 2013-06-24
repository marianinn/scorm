<?php

include_once ("oracion.php");

abstract class ejercicio {
	
	protected $oATTR;
	protected $aoOracion;
	protected $idEjercicio;
	
	public function setoAttr ($oAtributos)
	{
		$this->oATTR=$oAtributos;
	}
	
	public function getoAttr()
	{
		return $this->oATTR;
		
	}
	
	public function arrayToClass ($aData)
	{
		foreach ($aData as $key => $value)
		{
			call_user_func(array($this->oATTR,"set".ucfirst($key)),$value);
		}
	}

	public function arrayToOracion ($aData)
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
	
	public function getoOracion()
	{
		return $this->aoOracion;	
	}	
	
	public function getEnunciadoHTML()
	{	
		return str_replace("*","<br>",$this->oATTR->getEnunciado());
	}
	
	public function formateaCodigo($cod)
	{
		return sprintf("%02d",intval($cod));
	}
	
	public abstract function generaCss();
	public abstract function generaHTMLOracion();
	public abstract function generaPieEjercicio ();
	
	
	
}



?>