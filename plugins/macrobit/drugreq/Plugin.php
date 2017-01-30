<?php namespace Macrobit\Drugreq;

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

        (new UserExtender())->extend();
    }
}
