<?php
use Bitrix\Main\Localization\Loc;
use Bitrix\Main\ModuleManager;
use Bitrix\Main\Config\Option;
use Bitrix\Main\EventManager;
use Bitrix\Main\Application;
use Bitrix\Main\IO\Directory;

IncludeModuleLangFile(__FILE__);

Class eskov_test extends CModule
{

    var $MODULE_ID = "eskov.test";
    var $MODULE_VERSION;
    var $MODULE_VERSION_DATE;
    var $MODULE_NAME;
    var $MODULE_DESCRIPTION;
    var $errors;

    function __construct()
    {
        //$arModuleVersion = array();
        $this->MODULE_VERSION = "1.0.0";
        $this->MODULE_VERSION_DATE = "11.09.2022";
        $this->MODULE_NAME = "Пример модуля от Еськова Антона";
        $this->MODULE_DESCRIPTION = "Тестовый модуль по тестову заданию. Работа с БД";
    }

    function DoInstall()
    {
        $this->InstallDB();
        $this->InstallEvents();
        $this->InstallFiles();
        \Bitrix\Main\ModuleManager::RegisterModule("eskov.test");
        return true;
    }

    function DoUninstall()
    {
        $this->UnInstallDB();
        $this->UnInstallEvents();
        $this->UnInstallFiles();
        \Bitrix\Main\ModuleManager::UnRegisterModule("eskov.test");
        return true;
    }

    function InstallDB()
    {
        global $DB;
        $this->errors = false;
		if (! $DB->Query("SELECT 'x' FROM eskov_test WHERE 1=0", true)) {
			$this->errors = $DB->RunSQLBatch($_SERVER['DOCUMENT_ROOT'] . "/local/modules/" . $this->MODULE_ID . "/install/migration/install.sql");
		}
        if (!$this->errors) {
            return true;
        } else
            return $this->errors;
    }

    function UnInstallDB()
    {
        global $DB;
        $this->errors = false;
        $this->errors = $DB->RunSQLBatch($_SERVER['DOCUMENT_ROOT'] . "/local/modules/" . $this->MODULE_ID . "/install/migration/uninstall.sql");
        if (!$this->errors) {
            return true;
        } else
            return $this->errors;
    }

    function InstallEvents()
    {
        return true;
    }

    function UnInstallEvents()
    {
        return true;
    }

    function InstallFiles()
    {
		CopyDirFiles($_SERVER["DOCUMENT_ROOT"]."/local/modules/" . $this->MODULE_ID . "/install/components", $_SERVER["DOCUMENT_ROOT"]."/local/components/", true, true);
        return true;
    }

    function UnInstallFiles()
    {
		DeleteDirFilesEx($_SERVER["DOCUMENT_ROOT"] . "/local/components/" . $this->MODULE_ID . "/");
		
        return true;
    }
}