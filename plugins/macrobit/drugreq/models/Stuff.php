<?php namespace Macrobit\Drugreq\Models;

use Model;

/**
 * Model
 */
class Stuff extends Model
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
    public $table = 'macrobit_drugreq_stuff';
}