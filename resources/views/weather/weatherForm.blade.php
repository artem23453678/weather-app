@extends('layouts.weather')
@section('title', 'Weather Form')
@section('content')
    @include ('partials.messages')
    <div class="w-full h-screen flex items-center justify-center">
        <form class="mr-4" action="{{route('weatherByCity')}}" method="POST">
            @csrf
            <h2 class="text-3xl text-center text-gray-700 mb-4">Search by city</h2>
            <input type='text' name="city" placeholder="Enter your city here" class="w-full mt-2 mb-6 px-4 py-2 border rounded-lg text-gray-700 focus:outline-none focus:border-green-500" />
            <button type="submit"
                    class="w-full py-2 rounded-full bg-green-600 text-gray-100  focus:outline-none">Search by city
            </button>
        </form>
        <form action="{{route('weatherByZipCode')}}" method="POST">
            @csrf
            <h2 class="text-3xl text-center text-gray-700 mb-4">Search by zipcode</h2>
            <input type='text' placeholder="Enter your zipcode here" class="w-full mt-2 mb-6 px-4 py-2 border rounded-lg text-gray-700 focus:outline-none focus:border-green-500" name="zipcode"/>
            <button type="submit"
                    class="w-full py-2 rounded-full bg-green-600 text-gray-100  focus:outline-none">Search by zipcode
            </button>
        </form>
    </div>
@stop
