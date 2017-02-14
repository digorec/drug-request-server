<?php namespace Macrobit\Drugreq;

use Backend\Controllers\Users as UsersController;
use Backend\Facades\BackendAuth;
use Backend\Models\User as UserModel;
use Macrobit\Drugreq\Utils\YamlUtils;

class UserExtender
{
    public function extend()
    {
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
        $this->extendListBehavior();
        $this->extendFormBehavior();
    }

    private function extendListBehavior()
    {
        UsersController::extendListColumns(function ($widget, $model) {
            if (!$model instanceof UserModel) {
                return;
            }

            if (!$this->checkPermissions()) {
                return;
            }

            $config = YamlUtils::parseFile(__DIR__ . '/models/user/columns.yaml');
            $widget->addColumns($config);
        });
    }

    private function extendFormBehavior()
    {
        UsersController::extendFormFields(function ($widget) {
            // Prevent extending of related form instead of the intended User form
            if (!$widget->model instanceof UserModel) {
                return;
            }

            if (!$this->checkPermissions()) {
                return;
            }

            $config = YamlUtils::parseFile(__DIR__ . '/models/user/fields.yaml');
            $widget->addTabFields($config);
        });
    }

    private function checkPermissions()
    {
        $user = BackendAuth::getUser();
        return $user->hasAccess('macrobit.drugreq.access_lpu');
    }
}
