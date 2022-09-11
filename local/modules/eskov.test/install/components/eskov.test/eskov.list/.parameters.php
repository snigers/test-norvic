<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

use \Bitrix\Iblock\TypeTable;
use \Bitrix\Iblock\IblockTable;

\Bitrix\Main\Loader::includeModule('iblock');

$iblockTypes = array();
$result = TypeTable::getList( array(
								  'select' => [
									  'ID',
									  'NAME' => 'LANG_MESSAGE.NAME',
								  ],
								  'filter' => ['=LANG_MESSAGE.LANGUAGE_ID' => 'ru'],
							  ) );
while ($row = $result->fetch()) {
	$iblockTypes[$row['ID']] = $row['NAME'];
}

$iblocks = array();
$result = IblockTable::getList( array(
									'select' => ['ID', 'NAME'],
									'filter' => ['IBLOCK_TYPE_ID' => $arCurrentValues['iBLOCK_TYPE']],
								) );
while ($row = $result->fetch()) {
	$iblocks[$row['ID']] = $row['NAME'];
}

$arComponentParameters = array (
	'PARAMETERS' => array(
		'iblockData' => $result->fetchAll(),
	)
);

// Массив описаний параметов компонента
$arComponentParameters = array(
	// Группы
//	"GROUPS" => array(
//		"IBLOCK_PARAMS" => array(
//			"NAME" => GetMessage("IBLOCK_PARAMS_NAME")
//		)
//	),
//	// Массив описания параметров
//	"PARAMETERS" => array(
//		"YOUR_PARAM" => array(),
//	)
);
?>