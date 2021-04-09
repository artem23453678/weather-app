@extends('layouts.weather')
@section('title', $weather->name)
@section('content')
    @include ('partials.messages')
    <div class="bg-gradient-to-br from-yellow-400 to-pink-500 via-red-400 w-full h-screen flex items-center justify-center">
        <div class="bg-white p-8 bg-opacity-80 rounded-3xl flex space-x-12 items-center shadow-md">
            <div>
                <img src="http://openweathermap.org/img/wn/{{$weather->weather[0]->icon}}@2x.png" alt="">
                <p class="text-center text-gray-500 mt-2 text-sm">humidity: {{$weather->main->humidity}}</p>
                <p class="text-center text-gray-500 mt-2 text-sm">speed: {{$weather->wind->speed}}</p>
                <p class="text-center text-gray-500 mt-2 text-sm">deg: {{$weather->wind->deg}}</p>
                <p class="text-center text-gray-500 mt-2 text-sm">clouds: {{$weather->clouds->all}}</p>
            </div>
            <div>
                <p class="text-7xl font-bold text-right text-gray-900">{{$weather->main->temp}}°</p>
                <p class="text-gray-500 text-lg text-center">{{$weather->name}}</p>
            </div>
        </div>
    </div>
@endsection
