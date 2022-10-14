<?php
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/prolog_before.php');
//$APPLICATION->RestartBuffer();

\CBitrixComponent::includeComponentClass('eskov.test:eskov.khl.test');
$upload = new CEscovList();

$countUsers = 4; // устанавливаем шаг сколько подгружать за раз пользователей
$file = $_SERVER['DOCUMENT_ROOT'] . "/users.csv"; // Файл куда записать

$upload->uploadUsersData($file, $countUsers);






?>