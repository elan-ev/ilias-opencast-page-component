<?php

/* Copyright (c) 1998-2009 ILIAS open source, Extended GPL, see https://github.com/ILIAS-eLearning/ILIAS/tree/trunk/docs/LICENSE */

require_once __DIR__ . "/../vendor/autoload.php";
require_once './Customizing/global/plugins/Services/Repository/RepositoryObject/OpenCast/vendor/autoload.php';
use srag\DIC\OpencastPageComponent\Util\LibraryLanguageInstaller;
use srag\Plugins\OpencastPageComponent\Config\Config;
use srag\Plugins\OpencastPageComponent\Utils\OpencastPageComponentTrait;
use srag\RemovePluginDataConfirm\OpencastPageComponent\PluginUninstallTrait;

/**
 * Class ilOpencastPageComponentPlugin
 *
 * Generated by srag\PluginGenerator v0.13.8
 *
 * @author studer + raimann ag - Team Custom 1 <support-custom1@studer-raimann.ch>
 * @author studer + raimann ag - Team Custom 1 <info@studer-raimann.ch>
 */
class ilOpencastPageComponentPlugin extends ilPageComponentPlugin
{

    use PluginUninstallTrait;
    use OpencastPageComponentTrait;
    const PLUGIN_ID = "ocpc";
    const PLUGIN_NAME = "OpencastPageComponent";
    const PLUGIN_CLASS_NAME = self::class;
    const REMOVE_PLUGIN_DATA_CONFIRM_CLASS_NAME = OpencastPageComponentRemoveDataConfirm::class;
    /**
     * @var self|null
     */
    protected static $instance = null;


    /**
     * @return self
     */
    public static function getInstance() : self
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }

        return self::$instance;
    }


    /**
     * ilOpencastPageComponentPlugin constructor
     */
    public function __construct()
    {
        parent::__construct();
    }


    /**
     * @return string
     */
    public function getPluginName() : string
    {
        return self::PLUGIN_NAME;
    }


    /**
     * @param string $a_type
     *
     * @return bool
     */
    public function isValidParentType($a_type) : bool
    {
        // Allow in all parent types
        return true;
    }


    /**
     * @param array  $properties
     * @param string $plugin_version
     *
     * @since ILIAS 5.3
     */
    public function onDelete(/*array*/
        $properties, /*string*/
        $plugin_version
    )/*: void*/
    {
        if (self::dic()->ctrl()->getCmd() !== "moveAfter") {

        }
    }


    /**
     * @param array  $properties
     * @param string $plugin_version
     *
     * @since ILIAS 5.3
     */
    public function onClone(/*array*/
        &$properties, /*string*/
        $plugin_version
    )/*: void*/
    {
    }


    /**
     * @inheritdoc
     */
    public function updateLanguages($a_lang_keys = null)
    {
        parent::updateLanguages($a_lang_keys);

        LibraryLanguageInstaller::getInstance()->withPlugin(self::plugin())->withLibraryLanguageDirectory(__DIR__
            . "/../vendor/srag/removeplugindataconfirm/lang")->updateLanguages();
    }


    /**
     * @inheritdoc
     */
    protected function deleteData()/*: void*/
    {
        self::dic()->database()->dropTable(Config::TABLE_NAME, false);
    }


    /**
     * @inheritdoc
     */
    protected function shouldUseOneUpdateStepOnly() : bool
{
   return false;
}
}
