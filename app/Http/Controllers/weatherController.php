<?php

namespace App\Http\Controllers;

use App\Exceptions\WeatherNotFoundException;
use App\Repositories\Interfaces\WeatherRepositoryInterface;
use App\Traits\FlashMessages;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class weatherController extends Controller
{
    private $weatherRepository;

    use FlashMessages;

    public function __construct(WeatherRepositoryInterface $weatherRepository)
    {
        $this->weatherRepository = $weatherRepository;
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index(): View
    {
        return view('weather.weatherForm');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|View|\Illuminate\Http\RedirectResponse
     */
    public function GetWeather(Request $request)
    {
        try {
            $weather = $this->weatherRepository->GetWeather($request);
            self::message('info', 'Weather was found:)');
            return view('weather.weatherShow', compact('weather'));
        }
        catch (WeatherNotFoundException $e){
            self::message('danger', $e->getMessage());
            return redirect()->route('weather');
        }

    }
}
