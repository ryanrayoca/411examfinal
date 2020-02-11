<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApiCaller extends Controller{
    public static function apiresponse(){
        $response = array(
            'bakery'=>'bakery',
            'pastries'=>'pastries',
            'birthday_cake'=>'birthday cake',
        );

        return $response;
    }
}
