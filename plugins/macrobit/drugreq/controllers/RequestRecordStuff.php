<?php namespace Macrobit\Drugreq\Controllers;

use Backend\Classes\Controller;
use BackendMenu;

class RequestRecordStuff extends Controller
{
    public $implement = ['Backend\Behaviors\FormController'];
    
    public $formConfig = 'config_form.yaml';

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Extend supplied model used by create and update actions, the model can
     * be altered by overriding it in the controller.
     * @param \Macrobit\Drugreq\Models\RequestRecordStuff $model
     * @return \Macrobit\Drugreq\Models\RequestRecordStuff
     */
    public function formExtendModel($model)
    {
        $requestId = input('requestid');
        if (isset($requestId)) {
            $model->request_id = $requestId;
        }

        return $model;
    }
}
