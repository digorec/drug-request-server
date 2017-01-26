<?php namespace Macrobit\Drugreq;

use October\Rain\Support\Facades\File;
use October\Rain\Support\Facades\Yaml;
use System\Classes\PluginBase;
use RainLab\User\Models\User as UserModel;
use RainLab\User\Controllers\Users as UsersController;

class Plugin extends PluginBase
{
    public function registerComponents()
    {
    }

    public function registerSettings()
    {
    }

    public function boot()
    {
        parent::boot();

        $this->extendUsersController();
    }

    private function extendUsersController()
    {
        UsersController::extendFormFields(function ($widget) {
            // Prevent extending of related form instead of the intended User form
            if (!$widget->model instanceof UserModel) {
                return;
            }

            $configFile = __DIR__ . '/models/user/fields.yaml';
            $config = Yaml::parse(File::get($configFile));
            $widget->addTabFields($config);
        });
    }
}
