<?php
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
pr("===============================");
?>



<?$APPLICATION->IncludeComponent(
	"eskov.test:eskov.list",
	".default",
	Array(),
);?>







<?
pr("===============================")?>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>