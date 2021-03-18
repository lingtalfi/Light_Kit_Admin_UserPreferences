<?php


namespace Ling\Light_Kit_Admin_UserPreferences\Light_PlanetInstaller;


use Ling\BabyYaml\BabyYamlUtil;
use Ling\CliTools\Output\OutputInterface;
use Ling\Light_Kit_Admin\Light_BMenu\Util\LightKitAdminBMenuRegistrationUtil;
use Ling\Light_PlanetInstaller\PlanetInstaller\LightBasePlanetInstaller;

/**
 * The LightKitAdminUserPreferencesPlanetInstaller class.
 */
class LightKitAdminUserPreferencesPlanetInstaller extends LightBasePlanetInstaller
{


    /**
     * @overrides
     */
    public function onMapCopyAfter(string $appDir, OutputInterface $output): void
    {

        //--------------------------------------------
        // menus
        //--------------------------------------------
        $util = new LightKitAdminBMenuRegistrationUtil();
        $util->setContainer($this->container);


        $output->write("Ling.Light_Kit_Admin_UserPreferences: registering menu items...");
        $f = $appDir . "/config/data/Ling.Light_Kit_Admin_UserPreferences/Ling.Light_BMenu/generated/admin_main_menu.byml";
        $items = BabyYamlUtil::readFile($f);
        $util->writeItemsToMainMenuSection("admin", $items);
        $output->write("<success>ok.</success>" . PHP_EOL);

    }

}