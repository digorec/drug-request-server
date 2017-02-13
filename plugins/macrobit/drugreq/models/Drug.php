<?php namespace Macrobit\Drugreq\Models;

use Model;

/**
 * Model
 */
class Drug extends Model
{
    use \October\Rain\Database\Traits\Validation;
    use \October\Rain\Database\Traits\SoftDelete;

    protected $dates = ['deleted_at'];

    /*
     * Validation
     */
    public $rules = [
        'inn' => 'required',
        'form' => 'required',
        'dose' => 'required',
        'unit' => 'required',
    ];

    /**
     * @var string The database table used by the model.
     */
    public $table = 'macrobit_drugreq_drugs';
}
