<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>TeamTime</title>

    <!-- Scripts -->
    <script src="{{ asset('js/moment.js') }}"></script>
    <script src="{{ asset('js/moment-timezone-with-data.js') }}"></script>
    <script src="https://kit.fontawesome.com/1ce912d720.js" crossorigin="anonymous"></script>

    @livewireStyles

    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
</head>
<body class="bg-gray-100 h-screen antialiased leading-none">

<nav class="bg-blue-900 shadow mb-8 py-6">
    <div class="container mx-auto px-6 md:px-0">
        <div class="flex items-center justify-center">
            <div class="mr-6">
                <a id="local-clock" href="{{ url('/') }}" class="text-lg font-semibold text-gray-100 no-underline">

                </a>
            </div>
            <div class="flex-1 text-right">
                @guest
                    <a class="no-underline hover:underline text-gray-300 text-sm p-3"
                       href="{{ route('login') }}">{{ __('Login') }}</a>
                    @if (Route::has('register'))
                        <a class="no-underline hover:underline text-gray-300 text-sm p-3"
                           href="{{ route('register') }}">{{ __('Register') }}</a>
                    @endif
                @else
                    <a href="{{ route('add-person') }}"
                       class="bg-white shadow-md rounded mr-4 p-2 text-center">
                        <i class=" fas fa-user-plus text-black"></i>
                    </a>
                    <span class="text-gray-300 text-sm pr-4">{{ Auth::user()->name }}</span>

                    <a href="{{ route('logout') }}"
                       class="no-underline hover:underline text-gray-300 text-sm p-3"
                       onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                        {{ csrf_field() }}
                    </form>
                @endguest
            </div>
        </div>
    </div>
</nav>

<div class="container mx-auto px-6 md:px-0">
    @yield('content')
</div>
<script>
    const renderClock = () => {
        document.getElementById('local-clock').innerHTML = '<h5>' + moment()
            .format('MMMM Do YYYY kk:mm') + '</h5>';

        var timezoneElements = document.querySelectorAll('.person-time');
        timezoneElements.forEach(timezoneElement => {
            timezoneElement.innerHTML = moment().tz(timezoneElement.getAttribute('data-timezone'))
                .format('kk:mm') + ' in ' + timezoneElement.getAttribute('data-timezone');
        });
    };
    renderClock();
    setInterval(renderClock, 10000);
</script>

@livewireScripts

</body>
</html>
