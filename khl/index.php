<?php
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
pr("===============================");
?>



<?$APPLICATION->IncludeComponent(
	"eskov.test:eskov.khl.test",
	".default",
	Array(),
);?>







<?
pr("===============================")?>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>