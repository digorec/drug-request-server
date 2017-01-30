<?php namespace Macrobit\Drugreq\Utils;

use Carbon\Carbon;
use Macrobit\Drugreq\Models\RequestCampaign;

class RequestUtils
{
    public static function isRequestCampaignActive()
    {
        $now = Carbon::now();
//        if (!RequestCampaign::whereBetween('votes', [1, 100])->exists()) {
//            return false;
//        }

        //        $user = BackendAuth::getUser();
        return false;
    }
}
