<?php namespace Macrobit\Drugreq\Controllers;

use Backend\Classes\Controller;
use Backend\Facades\BackendAuth;
use BackendMenu;
use Illuminate\Support\Facades\Redirect;
use Macrobit\Drugreq\Models\RequestCampaign;
use Macrobit\Drugreq\Utils\RequestUtils;

class Request extends Controller
{
    public $implement = ['Backend\Behaviors\ListController',
        'Backend\Behaviors\FormController'];
    
    public $listConfig = 'config_list.yaml';
    public $formConfig = 'config_form.yaml';

    public function __construct()
    {
        parent::__construct();
        BackendMenu::setContext('Macrobit.Drugreq', 'request-menu-item');
    }

    /**
     * Create Controller action
     * @param string $context Explicitly define a form context.
     */
    public function create($context = null)
    {
        if (!RequestUtils::isRequestingAllowed()) {
            return Redirect::to('/backend');
        }

        // Call the FormController behavior update() method
        return $this->asExtension('FormController')->create($context);
    }

    /**
     * Extend supplied model used by create and update actions, the model can
     * be altered by overriding it in the controller.
     * @param \Macrobit\Drugreq\Models\Request $model
     * @return \Macrobit\Drugreq\Models\Request
     */
    public function formExtendModel($model)
    {
        // TODO: check if lpu and requestCampaign already exist.

        // Check if user's lpu exists.
        $user = BackendAuth::getUser();
        $lpu = $user->lpu;
        if (is_null($lpu)) {
            return $model;
        }

        // Set required fields.
        $requestCampaign = RequestCampaign::firstActiveNow();
        $model->lpu = $lpu;
        $model->requestCampaign = $requestCampaign;
        return $model;
    }
}
