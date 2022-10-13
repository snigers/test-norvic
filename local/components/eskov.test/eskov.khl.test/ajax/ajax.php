<?php
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/prolog_before.php');

if (CModule::IncludeModule("main")) {
	$countUsers = 4;
	$file = $_SERVER['DOCUMENT_ROOT'] . "/users.csv";
	$rsUsers = CUser::GetList(($by="timestamp_x"), ($order="desc"), []); // выбираем пользователей
	
	$pages = (int) ($rsUsers->result->num_rows / $countUsers);
	if ($rsUsers->result->num_rows % $countUsers !== 0) {
		$pages++;
	}
	
	$count = 1;
	$arUsers = [];
	for ($i = 1; $i <= $pages; $i++) {
		$rsUsers->NavStart($countUsers, true, $i);
		$countUsersPage = count($rsUsers->arResult);
		
		while($arUser = $rsUsers->Fetch()){
			$arUsers[$arUser["ID"]]["ID"] = $arUser["ID"];
			$arUsers[$arUser["ID"]]["LOGIN"] = $arUser["LOGIN"];
			$arUsers[$arUser["ID"]]["NAME"] = $arUser["NAME"];
			$arUsers[$arUser["ID"]]["LAST_NAME"] = $arUser["LAST_NAME"];
			
			if ($count === $countUsersPage) {
				putDataToCSV($file, $arUsers);
				$arUsers = [];
				$count = 1;
			} else {
				$count++;
			}
		}
	}
}


function putDataToCSV($file,$array){
	$fields_type = 'R'; //дописываем строки в файл
	$delimiter = ";";   //разделитель для csv-файла
	$csvFile = new \CCSVData($fields_type, false);
	$csvFile->SetFieldsType($fields_type);
	$csvFile->SetDelimiter($delimiter);
	$csvFile->SetFirstHeader(true);
	$arrayFields = array();

	if (!file_exists($file)) {
		foreach (array_keys($array[current(array_keys($array))]) as $value)
		{
			if(substr($value,0,1)=='~') continue;
			$arrayFields[] = $value;
		}
	
		$csvFile->SaveFile($file,$arrayFields);
	}
	
	foreach ($array as $arValue){
		$row = [];
		
		foreach ($arValue as $arrayVal)
		{
			$row[] = $arrayVal;
		}
		
		$csvFile->SaveFile($file,$row);
	}
}

?>