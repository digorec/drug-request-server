<?php namespace Macrobit\Drugreq\Utils;

use Backend\Facades\BackendAuth;
use Macrobit\Drugreq\Models\Request;
use Macrobit\Drugreq\Models\RequestCampaign;

class RequestUtils
{
    public static function isRequestingAllowed()
    {
        // Check if there is an active campaign
        $requestCampaign = RequestCampaign::firstActiveNow();
        if (is_null($requestCampaign)) {
            return false;
        }

        $user = BackendAuth::getUser();

        // If there is now attached to user LPU then forbid requesting
        if (is_null($user->lpu)) {
            return false;
        }

        // Then check if there is no request for current LPU
        return !Request::requestedForCampaignAndLpu($requestCampaign, $user->lpu);
    }
}
