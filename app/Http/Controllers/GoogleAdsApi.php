<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\ApiCaller;
use Edujugon\GoogleAds\GoogleAds;
use Edujugon\GoogleAds\Reports\MyReport;
use Google\AdsApi\AdWords\v201809\cm\AdGroupService;
use Google\AdsApi\AdWords\v201809\cm\CampaignService;

class GoogleAdsApi extends Controller{
    function GoogleResponseData(){
        $response_data = Apicaller::apiresponse();

        $ads = new GoogleAds();

        $ads->env('test')
        ->oAuth([
            'clientId' => '109681054132-41m066e9ldua5om5k89asc1obrnc4931.apps.googleusercontent.com',
            'clientSecret' => 'b85N6uSYUKD85hG8xmYEkkXu',
            'refreshToken' => 'TEST'
        ])
        ->session([
            'developerToken' => '7D0Ee_mPJaoyb5CPhOzoaw',
            'clientCustomerId' => '817-421-0127'
        ]);

        $ads->getEnv();

        $ads->service(CampaignService::class)
        ->select([$response_data['bakery'],$response_data['pastries'],$response_data['birthday_cake']])
        ->get();

        $ads = $ads->save();

        $report = $ads->report()->from('CRITERIA_PERFORMANCE_REPORT')->getFields();

        return $report;
    }
}
