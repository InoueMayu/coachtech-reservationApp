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
    <link rel="stylesheet" href="css/style.css">
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

          {{-- 検索バー --}}
            <div class="search-bar">
                <form class="search-bar-form" method="get" action="{{route('stores.index')}}">
                    @csrf
                        <select name="genre" id="genre" class="first-select">
                            <option value="All" name="genre" id="genre">All genre</option>
                            {{-- @foreach($data->unique('genre') as $store)
                                <option value="{{$store->genre}}" name="genre" id="genre">{{$store->genre}}</option>
                            @endforeach --}}
                            <option value="焼肉" name="genre">焼肉</option>
                            <option value="イタリアン" name="genre">イタリアン</option>
                            <option value="寿司" name="genre">寿司</option>
                            <option value="居酒屋" name="genre">居酒屋</option>
                            <option value="ラーメン" name="genre">ラーメン</option>
                        </select>

                        <select name="area" id="area">
                            <option name="area" value="All" id="area">All area</option>
                            {{-- @foreach($data->unique('area') as $store)
                                <option name="area" value="{{$store->area}}" id="area">{{$store->area}}</option>
                            @endforeach --}}
                            <option value="福岡県" name="area">福岡県</option>
                            <option value="大阪府" name="area">大阪府</option>
                            <option value="東京都" name="area">東京都</option>
                        </select>


                        <input type="search" placeholder="Search..." aria-label="Search" name="name" id="name">

                        <button class="btn btn-primary" type="submit">
                            <i class="fas fa-search"></i>
                        </button>
                </form>
            </div>

        </div>
    {{-- </nav> --}}

    <main class="py-4">
        @yield('content')
            <div class="index-card">
                @foreach ($data as $store)
                    {{-- <div class="col-lg-3 col-md-6 mb-3">
                        <div class="card index-card" style="width: 17rem;">
                            <img class="card-img-top" src="{{ $store->image }}">
                            <div class="card-body">
                                <h4 class="card-title index-store-name">{{$store->name}}</h4>
                                <p class="card-text">#{{$store->area}} #{{$store->genre}}</p>

                                <div class="d-flex justify-content-between">
                                    <a href="{{ route('stores.show',$store->id) }}" class="btn btn-primary">詳しく見る</a>

                                    @if($store->favorites()->where('user_id', Auth::id())->exists())
                                        <form action="{{ route('unfavorite', $store )}}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <input type="submit" value="&#xf057" class="fas btn fa-lg">
                                            <input type="hidden" name="store_id" value="{{$store->id}}">
                                        </form>
                                    @else
                                        <form action="{{ route('favorite', $store )}}" method="POST">
                                            @csrf
                                            <input type="submit" value="&#xf004" class="fas btn fa-lg">
                                            <input type="hidden" name="store_id" value="{{$store->id}}">
                                        </form>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div> --}}
                    <section class="card">
                        <img class="card-img" src="{{ $store->image }}">
                        <div class="card-content">
                          <h1 class="card-title">{{$store->name}}</h1>
                          <p class="card-text">#{{$store->area}} #{{$store->genre}}</p>
                        </div>
                        <div class="card-flex">
                            <a href="{{ route('stores.show',$store->id) }}" class="btn  btn-sm">詳しくみる</a>

                            @auth
                            @if($store->favorites()->where('user_id', Auth::id())->exists())
                                <form action="{{ route('unfavorite', $store )}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <input type="submit" value="&#xf057" class="fas btn fa-lg">
                                    <input type="hidden" name="store_id" value="{{$store->id}}">
                                </form>
                            @else
                                <form action="{{ route('favorite', $store )}}" method="POST">
                                    @csrf
                                    <input type="submit" value="&#xf004" class="fas btn fa-lg">
                                    <input type="hidden" name="store_id" value="{{$store->id}}">
                                </form>
                            @endif
                            @endauth
                        </div>
                      </section>
                @endforeach
            </div>
            {{ $data->appends(request()->input())->render('pagination::bootstrap-4') }}
    </main>

    <script src="{{ asset('js/main.js') }}"></script>
</body>
</html>
