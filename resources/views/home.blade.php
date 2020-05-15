@extends('layouts.app')

@section('content')
    <div class="flex flex-wrap overflow-hidden p-4">

        @foreach ($people as $person)
            <div class="w-1/5 bg-white rounded-lg shadow-xl m-4 p-4">
                <div class="bg-white border-b border-gray-200">
                    <div class="-ml-4 -mt-2 flex items-center justify-between flex-wrap sm:flex-no-wrap py-2">
                        <div class="ml-4 mt-2">
                            <h3 class="text-lg leading-6 font-medium text-gray-900">
                                {{ $person->name }}
                            </h3>
                        </div>
                    </div>
                </div>
                <p class="mt-4 text-gray-600 person-time" data-timezone="{{ $person->timezone }}"></p>
                <span class="hidden" data-id="{{ $person->id }}"></span>

                <div>
                    <div class="ml-4 mt-2 text-right">
                            <a type="button" href="{{ route('edit-person', ['person' => $person]) }}"
                                    class="text-gray-500">
                                <i class="fas fa-user-edit"></i>
                            </a>
                            <a type="button" href="{{ route('delete-person', ['person' => $person]) }}"
                                    class="text-gray-500">
                                <i class="fas fa-user-slash"></i>
                            </a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
