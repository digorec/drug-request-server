<?php namespace Macrobit\Drugreq;

use October\Rain\Support\Facades\File;
use October\Rain\Support\Facades\Yaml;
use Backend\Models\User as UserModel;
use Backend\Controllers\Users as UsersController;
use System\Classes\PluginBase;

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

        $this->extendUserModel();
        $this->extendUsersController();
    }

    private function extendUserModel()
    {
        UserModel::extend(function($model) {
            $model->implement[] = 'Macrobit.Drugreq.Behaviors.UserModel';
        });
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
