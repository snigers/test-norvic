<?php
namespace Eskov\Test;

use Eskov\Test\DataTable as DataTable;

class DataHelper
{

    public static function getAll()
	{
        $result = DataTable::getList(
                        array(
                            'select' => array('*')
        ));
        $row = $result->fetchAll();
//        print "<pre>"; print_r($row); print "</pre>";
        return $row;
    }
    public static function getMap()
	{
        $result = DataTable::getMap();
//        $row = $result->fetchAll();
//        print "<pre>"; print_r($row); print "</pre>";
        return $result;
    }

	
	public static function test()
	{
		var_dump("test");
//		DataTable::getMap();
	}
	
	
}
