<?php namespace Macrobit\Drugreq\Models;

use Model;

/**
 * Model
 */
class RequestCampaign extends Model
{
    use \October\Rain\Database\Traits\Validation;
    use \October\Rain\Database\Traits\SoftDelete;

    protected $dates = ['deleted_at'];

    /*
     * Validation
     */
    public $rules = [
    ];

    /**
     * @var string The database table used by the model.
     */
    public $table = 'macrobit_drugreq_request_campaigns';

    /**
     * @var array Relations
     */
    public $hasMany = [
        'requests' => 'Macrobit\Drugreq\Models\Request'
    ];

    public static function isActiveNow()
    {

    }
}
