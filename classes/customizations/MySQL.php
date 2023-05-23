<?php

use Gviabcua\Adminer\Classes\WinterAdminerHelper;

require_once plugins_path('gviabcua/adminer/classes/customizations/Autologin.php');

class MySQL extends Autologin {

    function credentials() {
        $connection = WinterAdminerHelper::getDBAutologinParams();
        return [
            $connection['server'],
            $connection['username'],
            $connection['password']
        ];
    }

}