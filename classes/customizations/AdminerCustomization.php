<?php

class AdminerCustomization extends AdminerPlugin {
    function name() {
        return Lang::get('gviabcua.adminer::lang.plugin.name');
    }

    function css() {
        return [ADMINER_THEME];
    }

}