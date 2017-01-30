<?php namespace Macrobit\Drugreq\Controllers;

use Backend\Classes\Controller;
use BackendMenu;
use Illuminate\Support\Facades\Redirect;
use Macrobit\Drugreq\Utils\RequestUtils;

class Request extends Controller
{
    public $implement = ['Backend\Behaviors\ListController','Backend\Behaviors\FormController'];
    
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
     * @return void
     */
    public function create($context = null)
    {
        if (!RequestUtils::isRequestingAllowed()) {
            return Redirect::to('/backend');
        }

        // Call the FormController behavior update() method
        return $this->asExtension('FormController')->create($context);
    }
}
