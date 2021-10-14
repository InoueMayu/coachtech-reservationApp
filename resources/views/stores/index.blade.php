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

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-transparent sticky-top">
        <!-- タイトル -->
        <a class="navbar-brand title" href="{{route('stores.index')}}">Rese</a>
        <!-- ハンバーガーメニュー -->
        <button class="navbar-toggler hamberger" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <!-- ナビゲーションメニュー -->
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" href="{{route('stores.index')}}">Home</a>
            </li>
            @auth
            <li class="nav-item">
                <a class="nav-link" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                              document.getElementById('logout-form').submit();">
                 Logout
             </a>
             <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{route('mypage')}}">Mypage</a>
            </li>
            @endauth
            @guest
            <li class="nav-item">
                <a class="nav-link" href="{{route('register')}}">Registration</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{route('login')}}">Login</a>
              </li>
            @endguest
          </ul>

          {{-- 検索バー --}}
          <form class="d-flex ml-auto" method="get" action="{{route('stores.index')}}">
            @csrf
                <select name="genre" id="genre">
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

                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="name" id="name">

                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>

        </div>
    </nav>

    <main class="py-4">
        @yield('content')
        <div class="container">
            <div class="row">
                @foreach ($data as $store)
                    <div class="col-lg-3 col-md-6 mb-3">
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
                    </div>
                @endforeach
            </div>
            {{ $data->appends(request()->input())->render('pagination::bootstrap-4') }}
        </div>
        </div>
    </main>

</body>
</html>
