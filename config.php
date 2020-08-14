<?php
use Core\Cfg;

if(isset($_SERVER['IS_DEVEL']))
{
    $aConfig = [
        'PROTOCOL' => 'http',
        'ADMIN_PROTOCOL' => 'http',
        'CUSTOM_FOLDER' => 'NovumBrp',
        'ABSOLUTE_ROOT' => '/home/anton/Documents/sites/hurah',
        'DOMAIN' => 'gemeente.demo.novum.nuidev.nl',
        /* Je zoekt waarschijnlijk Config::getDataDir() */
        'DATA_DIR' => '../'
    ];
}
else
{
    $aConfig = [
        'PROTOCOL' => 'https',
        'ADMIN_PROTOCOL' => 'https',
        'CUSTOM_FOLDER' => 'NovumBrp',
        'DOMAIN' => 'gemeente.demo.novum.nu',
        'ABSOLUTE_ROOT' => '/home/nov_brp/platform/system',
        'DATA_DIR' => '/home/nov_brp/platform/data'
    ];
}

$aConfig['CUSTOM_NAMESPACE'] = 'NovumBrp';

Cfg::set($aConfig);

