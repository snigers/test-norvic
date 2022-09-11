<?php
namespace Eskov;

use Bitrix\Main\Entity;
use Bitrix\Main\Localization\Loc;
 

class DataTable extends Entity\DataManager
{
	/**
	 * Returns DB table name for entity.
	 *
	 * @return string
	 */
	public static function getTableName()
	{
		return 'eskov_test';
	}

	/**
	 * Returns entity map definition.
	 *
	 * @return array
	 */
	public static function getMap()
	{
		return array(
			'ID' => array(
				'data_type' => 'integer',
				'primary' => true,
				'autocomplete' => true,
				'title' => Loc::getMessage('DATA_ENTITY_ID_FIELD'),
			),
			'FIO' => array(
				'data_type' => 'text',
				'required' => true,
				'title' => Loc::getMessage('DATA_ENTITY_FIO_FIELD'),
			),
			'PHONE' => array(
				'data_type' => 'integer',
				'required' => true,
				'title' => Loc::getMessage('DATA_ENTITY_PHONE_FIELD'),
			),
			'POST' => array(
				'data_type' => 'text',
				'required' => true,
				'title' => Loc::getMessage('DATA_ENTITY_POST_FIELD'),
			),
			'OFFICE' => array(
				'data_type' => 'text',
				'required' => true,
				'title' => Loc::getMessage('DATA_ENTITY_OFFICE_FIELD'),
			),
			'ADDRESS' => array(
				'data_type' => 'text',
				'required' => true,
				'title' => Loc::getMessage('DATA_ENTITY_ADDRESS_FIELD'),
			),
		);
	}
}