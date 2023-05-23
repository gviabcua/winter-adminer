<?php

namespace Gviabcua\Adminer\Controllers;

use Config;
use Session;
use Backend\Classes\Controller;
use Gviabcua\Adminer\Models\Settings as Settings;
use Gviabcua\Adminer\Classes\WinterAdminerHelper;

class WinterAdminer extends Controller {

    public $pageTitle           = 'gviabcua.adminer::lang.plugin.name';
    public $requiredPermissions = ['gviabcua.adminer.access_adminer'];

    public function __construct() {
        Config::set('cms.enableCsrfProtection', false);
        parent::__construct();
        \BackendMenu::setContext('Gviabcua.Adminer', 'adminer', 'winteradminer');
    }

    public function index() {
        $mode = Settings::get('mode', 1);
        switch ($mode) {
            case 2:
                return $this->runAdminerIFrame();
                break;
            default:
                return $this->runAdminer();
                break;
        }
    }

    public function iframe() {
        return $this->runAdminer();
    }

    private function runAdminer() {
        $this->runAdminerLoader();
        define('ADMINER_THEME', self::getTheme());
        include_once plugins_path() . '/gviabcua/adminer/classes/adminer-loader.php';
        return new \Gviabcua\Adminer\Classes\EmptyResponse();
    }

    private function runAdminerLoader() {
        $mode      = Settings::get('mode', 1);
        $autologin = Settings::get('autologin', 0);
        if ($mode == 2) {
            Session::flash('ADMINER_PLUGINS', ['frames' => 'AdminerFrames']);
        }
        if ($autologin != 0) {
            Session::flash('ADMINER_AUTOLOGIN', true);
        }
    }

    private function runAdminerIFrame() {
        $this->addCss('/plugins/gviabcua/adminer/assets/css/styles.css');
        return \View::make('gviabcua.adminer::iframe', [
            'URL' => \Backend::url('gviabcua/adminer/winteradminer/iframe' . WinterAdminerHelper::getAutologinURL())
        ]);
    }

    private function getTheme() {
        if (Settings::get('theme')) {
            $css = '/plugins/gviabcua/adminer/assets/themes/' . Settings::get('theme') . '/adminer.css?cache=' . date('YmdHis');
            return url($css);
        }
    }

}

?>