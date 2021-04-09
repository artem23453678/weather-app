<?php


namespace App\Repositories\Interfaces;


use Illuminate\Http\Request;
use Psy\Util\Json;

interface WeatherRepositoryInterface
{
    public function GetWeather(Request $request);
}
