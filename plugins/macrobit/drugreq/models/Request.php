<?php namespace Macrobit\Drugreq\Models;

use Model;

/**
 * Model
 */
class Request extends Model
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
    public $table = 'macrobit_drugreq_requests';

    /**
     * @var array Relations
     */
    public $belongsTo = [
        'lpu' => 'Macrobit\Drugreq\Models\Lpu',
        'requestCampaign' => 'Macrobit\Drugreq\Models\RequestCampaign',
    ];

    public static function requestedForCampaignAndLpu(
        RequestCampaign $requestCampaign, Lpu $lpu)
    {
        return static::where('request_campaign_id', $requestCampaign->id)
            ->where('lpu_id', $lpu->id)
            ->exists();
    }
}
