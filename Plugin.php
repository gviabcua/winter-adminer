<?php

namespace Gviabcua\Adminer;

use Backend;
use System\Classes\PluginBase;
use Gviabcua\Adminer\Classes\WinterAdminerHelper;
use Gviabcua\Adminer\Models\Settings as Settings;

class Plugin extends PluginBase {

    public function pluginDetails() {
        return [
            'name'        => 'gviabcua.adminer::lang.plugin.name',
            'description' => 'gviabcua.adminer::lang.plugin.description',
            'author'      => 'Gviabcua.',
            'icon'        => 'icon-database',
            'homepage'    => 'https://github.com/gviabcua/winter-adminer'
        ];
    }

    public function registerNavigation() {

        if (Settings::get('hide_menu', 0) == 1) {
            return [];
        }

        return [
            'adminer' => [
                'label'       => 'gviabcua.adminer::lang.navigation.label',
                'url'         => Backend::url('gviabcua/adminer/winteradminer' . WinterAdminerHelper::getAutologinURL(true)),
                'permissions' => ['gviabcua.adminer.access_adminer'],
                'icon'        => 'icon-database',
                'iconSvg'     => 'plugins/gviabcua/adminer/assets/imgs/icon.svg',
                'order'       => 900
            ]
        ];

    }

    public function registerSettings() {
        return [
            'settings' => [
                'label'       => 'gviabcua.adminer::lang.settings.label',
                'description' => 'gviabcua.adminer::lang.plugin.description',
                'icon'        => 'icon-database',
                'class'       => '\Gviabcua\Adminer\Models\Settings',
                'order'       => 500,
                'permissions' => ['gviabcua.adminer.access'],
                'category'    => 'system::lang.system.categories.system'
            ]
        ];
    }

    public function registerPermissions() {
        return [
            'gviabcua.adminer.access_adminer' => [
                'tab'   => 'gviabcua.adminer::lang.permissions.tab',
                'label' => 'gviabcua.adminer::lang.permissions.label'
            ],
        ];
    }

}

?>
