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
        UserModel::extend(function ($model) {
            $model->implement[] = 'Macrobit.Drugreq.Behaviors.UserModel';
        });
    }

    private function extendUsersController()
    {
        UsersController::extendListColumns(function ($widget, $model) {
            if (!$model instanceof UserModel)
                return;

            $config = $this->loadYamlFromFile('/models/user/columns.yaml');
            $widget->addColumns($config);
        });

        UsersController::extendFormFields(function ($widget) {
            // Prevent extending of related form instead of the intended User form
            if (!$widget->model instanceof UserModel) {
                return;
            }

            $config = $this->loadYamlFromFile('/models/user/fields.yaml');
            $widget->addTabFields($config);
        });
    }

    private function loadYamlFromFile($filePath)
    {
        $configFile = __DIR__ . $filePath;
        return Yaml::parse(File::get($configFile));
    }
}
