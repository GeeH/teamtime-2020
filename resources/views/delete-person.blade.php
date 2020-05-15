@extends('layouts.app')

@section('content')
    <div class="flex flex-wrap overflow-hidden p-4">
        <div class="w-1/2 bg-white rounded-lg shadow-xl m-4 p-4">
            <h2 class="font-semibold text-xl leading-snug text-gray-900">
                Delete User
            </h2>

            <form action="{{ route('delete-person-handler', $person->id) }}" method="POST">
                @csrf

                @if ($errors->any())
                    {{ dd($errors) }}
                @endif

                <p class="p-2">Are you sure you wish to delete {{ $person->name }}?</p>
                <div>
                    <a class="form-input w-16 m-2 p-2 bg-blue-500 text-white" href="{{ route('home') }}">No</a>
                    <button class="form-input w-16 m-2 p-2 bg-red-500 text-white" type="submit">Yes</button>
                </div>
            </form>
        </div>
    </div>
@endsection
