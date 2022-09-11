<?php
namespace Eskov;

use Eskov\DataTable as DataTable;

class Test{

    public static function get()
	{
        $result = DataTable::getList(
                        array(
                            'select' => array('*')
        ));
        $row = $result->fetch();
        print "<pre>"; print_r($row); print "</pre>";
        return $row;
    }

	
	public static function test()
	{
		var_dump("test");
//		DataTable::getMap();
	}
	
	
}
