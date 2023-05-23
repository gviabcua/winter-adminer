<?php

if (!function_exists('adminer_object')) {

    function adminer_object() {

        // LOAD ADMINER PLUGINS
        $load_plugins = [];
        include_once plugins_path('gviabcua/adminer/classes/adminer-plugins/plugin.php');
        if (is_array(Session::get('ADMINER_PLUGINS'))) {
            foreach (Session::get('ADMINER_PLUGINS') as $plugin => $class) {
                include_once 'adminer-plugins/' . $plugin . '.php';
                $load_plugins[] = new $class;
            }
        }

        // AUTOLOGIN IF NECESSARY
        if (Session::get('ADMINER_AUTOLOGIN') === true) {

            $driver = config('database.default');

            if ($driver == 'mysql' || $driver == 'pgsql') {
                include_once plugins_path('gviabcua/adminer/classes/customizations/MySQL.php');
                return new MySQL($load_plugins);
            }

            if ($driver == 'sqlite') {
                include_once plugins_path('gviabcua/adminer/classes/customizations/Autologin.php');
                return new Autologin($load_plugins);
            }

        }

        include_once plugins_path('gviabcua/adminer/classes/customizations/AdminerCustomization.php');
        return new AdminerCustomization($load_plugins);
    }

}

// LOAD MAIN ADMINER CLASS
require plugins_path() . '/gviabcua/adminer/classes/adminer-4.8.0-en.php';
?>
