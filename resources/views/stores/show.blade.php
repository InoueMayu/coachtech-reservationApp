<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&family=Roboto:wght@500&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/style.css') }}" rel="stylesheet">
</head>


<body>
    <div class="container index-first">
        <header>
            <nav class="nav" id="nav">
            <ul>
                <li>
                    <a class="nav-link" href="{{route('stores.index')}}">Home</a>
                </li>
                @auth
                <li>
                    <a class="nav-link" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                    Logout
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>
                <li>
                    <a class="nav-link" href="{{route('mypage')}}">Mypage</a>
                </li>
                @endauth
                @guest
                <li>
                    <a class="nav-link" href="{{route('register')}}">Registration</a>
                </li>
                <li>
                    <a class="nav-link" href="{{route('login')}}">Login</a>
                </li>
                @endguest
            </ul>
            </nav>

            <div class="menu" id="menu">
            <span class="menu__line--top"></span>
            <span class="menu__line--middle"></span>
            <span class="menu__line--bottom"></span>
            </div>

            <div class="header-logo">
                <a class="" href="{{route('stores.index')}}">Rese</a>
            </div>
        </header>
    </div>

    <main class="py-4">
        @yield('content')

        <div class="show">
            <div class="show-store">
                <div class="show-store-name-flex">
                    <a href="{{route('stores.index')}}">
                        <input type="submit" value="&#xf0a8" class="fas btn fa-lg">
                    </a>
                    <h4 class="show-store-name">{{$store->name}}</h4>
                </div>
                <img src="{{ $store->image }}">
                <div class="">
                    <p class="mt-3">#{{$store->area->name}} #{{$store->genre->name}}</p>
                    <p>{{$store->description}}</p>
                </div>
            </div>
            <div class="show-reservation">
                @auth
                <form action="{{ route('reservation.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="store_id" value="{{$store->id}}">
                    <div class="show-reservation-p" id="app">
                        <p></p>
                        <div class="show-reservation-top">
                            <h3>予約</h3>
                            <div class="mb-3">
                            <input type="date" name="date" class="date-input" id="input">
                            </div>
                            <select class="form-select form-control mb-3" aria-label="Default select example" name="starts_at" id="input-2">
                                <option value="17:00" name="starts_at">17:00</option>
                                <option value="17:30" name="starts_at">17:30</option>
                                <option value="18:00" name="starts_at">18:00</option>
                                <option value="18:30" name="starts_at">18:30</option>
                                <option value="19:00" name="starts_at">19:00</option>
                                <option value="19:30" name="starts_at">19:30</option>
                                <option value="20:00" name="starts_at">20:00</option>
                                <option value="20:30" name="starts_at">20:30</option>
                                <option value="21:00" name="starts_at">21:00</option>
                                <option value="21:30" name="starts_at">21:30</option>
                                <option value="22:00" name="starts_at">22:00</option>
                                <option value="22:30" name="starts_at">22:30</option>
                            </select>
                            <select class="form-select form-control mb-3" aria-label="Default select example" name="number_of_guests" id="input-3">
                                <option value="1" name="number_of_guests">1人</option>
                                <option value="2" name="number_of_guests">2人</option>
                                <option value="3" name="number_of_guests">3人</option>
                                <option value="4" name="number_of_guests">4人</option>
                                <option value="5" name="number_of_guests">5人</option>
                                <option value="6" name="number_of_guests">6人</option>
                                <option value="7" name="number_of_guests">7人</option>
                                <option value="8" name="number_of_guests">8人</option>
                                <option value="9" name="number_of_guests">9人</option>
                                <option value="10" name="number_of_guests">10人</option>
                            </select>
                        </div>
                        <div class="show-reservation-bottom">
                            <table class="show-table">
                                <tr>
                                    <td class="first-menu">shop</td>
                                    <td class="first-content">{{$store->name}}</td>
                                </tr>
                                <tr>
                                    <td class="show-table-menu">date</td>
                                    <td class="show-table-content" id="output"></td>
                                </tr>
                                <tr>
                                    <td class="show-table-menu">time</td>
                                    <td class="show-table-content" id="output-2"></td>
                                </tr>
                                <tr>
                                    <td class="last-menu">number</td>
                                    <td class="last-content" id="output-3"></td>
                                </tr>
                            </table>
                        </div>
                        <button type="submit" class="btn w-100 show-btn">予約する</button>
                    </div>
                </form>
                @endauth
                @guest
                <div class="container">
                    <div class="card mt-5" style="width: 100%;">
                        <div class="card-body">
                        <h5 class="card-title-sub text-center">予約をご希望の場合はユーザー登録または<br>ログインをお願いします。</h5>
                        <div class="text-center mt-5">
                            <a href="{{route('register')}}" class="card-link">ユーザー登録</a>
                            <a href="{{ route('login') }}" class="card-link">ログイン</a>
                        </div>

                        </div>
                    </div>
                </div>
                @endguest
            </div>

        </div>
    </main>


{{-- jquery --}}
<script
        src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
        crossorigin="anonymous">
</script>
<script>
        $(function() {
        $(document).on('blur', '#input', function(e) {
            $('#output').text($('#input').val());
        });
    });
    $(function() {
        $(document).on('blur', '#input-2', function(e) {
            $('#output-2').text($('#input-2').val());
        });
    });
    $(function() {
        $(document).on('blur', '#input-3', function(e) {
            $('#output-3').text($('#input-3').val());
        });
    });
</script>
    <script src="{{ asset('js/main.js') }}"></script>
</body>
</html>
