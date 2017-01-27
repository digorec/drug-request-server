<?php namespace Macrobit\Drugreq\Behaviors;

use Macrobit\Drugreq\Models\Lpu;
use System\Classes\ModelBehavior;

/**
 * User model extension
 *
 * Adds LPU to a model
 *
 * Usage:
 *
 * In the model class definition:
 *
 *   public $implement = ['Macrobit.Drugreq.Behaviors.UserModel'];
 *
 */
class UserModel extends ModelBehavior
{
    public function __construct($model)
    {
        parent::__construct($model);

        $this->extendModelWithLpu($model);
    }

    private function extendModelWithLpu($model)
    {
        // Add lpu_id field to mass assignment fields.
        $model->addFillable([
            'lpu_id',
        ]);

        // Define relation.
        $model->belongsTo['lpu'] = 'Macrobit\Drugreq\Models\Lpu';
    }

    public function getLpuOptions()
    {
        return Lpu::getNameList();
    }

    public function setLpuIdAttribute($value)
    {
        $this->model->attributes['lpu_id'] = $value ?: null;
    }
}
