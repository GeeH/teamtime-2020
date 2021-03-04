@extends('layouts.app')

@section('content')
    <div class="flex md:px-3">
        @foreach ($teams as $team)

            <div class="team mr-2">
            <div class="bg-gray-700 rounded-md px-5 py-5 mb-8">
                <h3 class="pl-1 text-lg font-bold text-white mb-5">{{ $team->name }}</h3>

                    @foreach ($team->person as $person)
                        <div class="w-full bg-white rounded-md shadow-lg mb-4">
                            <div class="bg-gray-200 border-b border-gray-200 rounded-t-lg">
                                <div class="flex items-center justify-between flex-wrap sm:flex-no-wrap py-3half px-4">
                                    <div class="">
                                        <h3 class="text-sm font-medium text-gray-900">
                                            {{ $person->name }}
                                        </h3>
                                    </div>
                                </div>
                            </div>
                            <p class="mt-4 px-4 text-gray-900 person-time text-sm"
                               data-timezone="{{ $person->timezone }}"></p>
                            <span class="hidden" data-id="{{ $person->id }}"></span>

                            <div>
                                <div class="mt-1 text-right p-2">
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
            </div>
        @endforeach
    </div>
@endsection
