<?php
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

use Eskov\Test;
CModule::IncludeModule("eskov.test");

class CEscovList extends CBitrixComponent
{
	
	public function executeComponent()
	{
		
		if($this->startResultCache())//startResultCache используется не для кеширования html, а для кеширования arResult
		{
			$this->arResult["TEST"] = "test";
			$this->includeComponentTemplate();
		}
		return $this->arResult["Y"];
	}
};
