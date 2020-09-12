<?php
require_once '../../../../vendor/autoload.php';
require_once '../../../../config/novum.brp/propel/config.php';
require_once '../../../../config/novum.brp/config.php';
$servicename = 'lochem';
$password = 'Mkwhwm!2020'; // Makkelijker kunnen we het wel maken!

require_once '1_set_installed_menu_state.php';

$aScripts = glob('../../_default/novum/*');

foreach ($aScripts as $sScript)
{
    echo "Importing $sScript" . PHP_EOL;
    require_once $sScript;

}
/*
require_once './1_landen.php';
require_once './2_provincies.php';
require_once './3_gemeentes.php';
require_once './4_geslachten.php';
require_once './5_voornamen.php';
*/
