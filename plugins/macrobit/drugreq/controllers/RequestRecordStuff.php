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
}