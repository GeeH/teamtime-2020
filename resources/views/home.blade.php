@extends('layouts.app')

@section('content')
    <div class="flex flex-wrap overflow-hidden p-4">

        @foreach ($people as $person)
        <div class="w-1/5 bg-white rounded-lg shadow-xl m-4 p-4">
            <h2 class="font-semibold text-xl leading-snug text-gray-900">{{ $person->name }}</h2>
            <p class="mt-4 text-gray-600 person-time" data-timezone="{{ $person->timezone }}"></p>
            <span class="hidden" data-id="{{ $person->id }}"></span>
        </div>
        @endforeach

    </div>
@endsection
