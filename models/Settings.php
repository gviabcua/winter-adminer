<?php

namespace Gviabcua\Adminer\Models;

use Lang, Model;
use Gviabcua\Adminer\Classes\WinterAdminerHelper;

class Settings extends Model {

    use \Winter\Storm\Database\Traits\Validation;

    public $rules = [
        'mode' => 'required',
    ];

    public $attributeNames;
    public $implement      = ['System.Behaviors.SettingsModel'];
    public $settingsCode   = 'gviabcua_adminer_settings';
    public $settingsFields = 'fields.yaml';

    public function __construct(array $attributes = []) {
        $this->attributeNames = [
            'mode' => Lang::get('gviabcua.ssologin::lang.settings.mode'),
        ];
        parent::__construct();
    }

    public function getUseConnectionOptions() {
        $connections = WinterAdminerHelper::getDBConnections();
        $connections = $connections->map(function ($item, $key) {
            $label = sprintf('%s', $key);
            if (!empty($item['driver'])) {
                $label .= sprintf(' [Driver: %s]', $item['driver']);
            }
            return $label;
        });
        $connections->put('', '--- '.Lang::get('gviabcua.adminer::lang.settings.use_conn_default').' ---');
        return $connections->sort();
    }

}

?>