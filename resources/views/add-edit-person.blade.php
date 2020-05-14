@extends('layouts.app')

@section('content')
    <div class="flex flex-wrap overflow-hidden p-4">
        <div class="w-1/2 bg-white rounded-lg shadow-xl m-4 p-4">
            <h2 class="font-semibold text-xl leading-snug text-gray-900">
                {{ $route === 'edit-person-handler' ? 'Edit' : 'Add' }} User
            </h2>

            <form action="{{ route($route, $person->id) }}" method="POST">
                @csrf

                @if ($errors->any())
                    {{ dd($errors) }}
                @endif

                <div>
                    <label> Name:
                        <input name="person-name" type="text" required value="{{ $person->name }}"
                               class="m-2 p-2 form-input"
                               placeholder="Name"
                        />
                    </label>
                </div>
                <div>
                    <label>Timezone:
                        <input name="person-timezone" type="text" required value="{{ $person->timezone }}"
                               class="m-2 p-2 form-input"
                               placeholder="Timezone"
                        />
                    </label>
                </div>

                <div>
                    <button class="form-input w-16 m-2 p-2 bg-blue-500 text-white" type="submit">Save</button>
                </div>
            </form>
        </div>
    </div>
@endsection
