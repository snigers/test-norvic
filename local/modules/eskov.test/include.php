<?php
defined('B_PROLOG_INCLUDED') and (B_PROLOG_INCLUDED === true) or die();
use Bitrix\Main\Loader;

Bitrix\Main\Loader::registerAutoloadClasses(
	"eskov.test",
	array(
		"Eskov\\Test" => "lib/test.php",
		"Eskov\\DataTable" => "lib/DataTable.php",
	)
);
