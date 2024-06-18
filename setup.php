<?php

function plugin_init_dashboard()
{
    global $PLUGIN_HOOKS, $LANG;

    $PLUGIN_HOOKS['csrf_compliant']['dashboard'] = true;

    Plugin::registerClass('PluginDashboardConfig', [
        'addtabon' => ['Entity'],
    ]);

    $PLUGIN_HOOKS['menu_toadd']['dashboard'] = ['plugins' => 'PluginDashboardConfig'];
    $PLUGIN_HOOKS['config_page']['dashboard'] = 'front/index.php';
}

function plugin_version_dashboard()
{
    global $DB, $LANG;

    return ['name' => __('Dashboard', 'dashboard'), 'version' => '1.0.4', 'author' => '<a href="https://github.com/stdonato/glpi-dashboard"> Stevenes Donato|Wesley Rossetti|Gabriel Carneiro </b> </a>', 'license' => 'GPLv2+', 'homepage' => 'https://github.com/bielcode/glpi-dashboard', 'minGlpiVersion' => '10.0'];
}

function plugin_dashboard_check_prerequisites()
{
    if (version_compare(GLPI_VERSION, '10.0', '>=')) {
        return true;
    } else {
        echo 'GLPI version NOT compatible. Requires GLPI >= 10.0';
    }
}

function plugin_dashboard_check_config($verbose = false)
{
    if ($verbose) {
        echo 'Installed / not configured';
    }
    return true;
}

?>
