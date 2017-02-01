<?php namespace Macrobit\Drugreq\Models;

use Model;

/**
 * Model
 */
class RequestRecordStuff extends Model
{
    use \October\Rain\Database\Traits\Validation;
    use \October\Rain\Database\Traits\SoftDelete;

    protected $dates = ['deleted_at'];

    /*
     * Validation
     */
    public $rules = [
        'name' => 'required'
    ];

    /**
     * @var string The database table used by the model.
     */
    public $table = 'macrobit_drugreq_request_record_stuff';

    /**
     * @var array Relations
     */
    public $belongsTo = [
        'stuff' => 'Macrobit\Drugreq\Models\Stuff',
    ];

    // Update request record fields when stuff is selected
    public function filterFields($fields, $context = null)
    {
        $fields->name->value = $this->stuff['name'];
        $fields->characteristics->value = $this->stuff['characteristics'];
        $fields->unit->value = $this->stuff['unit'];
    }
}
