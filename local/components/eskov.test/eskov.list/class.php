<?php
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();
CModule::IncludeModule("eskov.test");
use Eskov\Test\DataHelper;


class CEscovList extends CBitrixComponent
{
	
	public function testD7()
	{
	
	}
	
	
	
	public function executeComponent()
	{
//		CModule::IncludeModule("eskov.test");
//		\Eskov\Test\DataHelper::test();
		DataHelper::test();
		if($this->startResultCache())//startResultCache используется не для кеширования html, а для кеширования arResult
		{
			$this->arResult["TEST_MAP"] = DataHelper::getMap();
			$this->arResult["TEST_DB"] = DataHelper::getAll();
			$this->arResult["TEST"] = "test";
			$this->includeComponentTemplate();
		}
		return $this->arResult["Y"];
	}
};
