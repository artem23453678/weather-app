<?php


namespace App\Repositories;


use App\Exceptions\WeatherNotFoundException;
use App\Repositories\Interfaces\WeatherRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class WeatherRepository implements WeatherRepositoryInterface
{
    /**
     * @var string
     */
    private $countryCode;

    /**
     * WeatherRepository constructor.
     * @param string $countryCode
     */
    public function __construct($countryCode = 'ua')
    {
        $this->countryCode = $countryCode;
    }

    /**
     * @param Request $request
     * @return mixed
     * @throws WeatherNotFoundException
     */
    public function GetWeather(Request $request)
    {
        if (isset($request->city)){
            return $this->GetWeatherByCity($request->city);
        }
        elseif (isset($request->zipcode)){
            return $this->GetWeatherByZipCode($request->zipcode);
        }
        else{
            throw new WeatherNotFoundException('weather not found, something wrong');
        }
    }

    /**
     * @param $city
     * @return mixed
     * @throws WeatherNotFoundException
     */
    private function GetWeatherByCity($city)
    {
        $key = env('WEATHER_KEY');
        $url = 'api.openweathermap.org/data/2.5/weather?q=' . $city .'&units=metric&appid=' . $key;
        $weather = json_decode(Http::get($url)->body());
        if ($weather->cod !== 200){
            throw new WeatherNotFoundException('weather not found');
        }
        return $weather;
    }

    /**
     * @param $zipcode
     * @return mixed
     * @throws WeatherNotFoundException
     */
    private function GetWeatherByZipCode($zipcode)
    {
        $key = env('WEATHER_KEY');
        $url = 'api.openweathermap.org/data/2.5/weather?zip=' . $zipcode . ','. $this->countryCode .'&units=metric&appid=' . $key;
        $weather = json_decode(Http::get($url)->body());
        if ($weather->cod !== 200) {
            throw new WeatherNotFoundException('weather not found');
        }
        return $weather;
    }
}
