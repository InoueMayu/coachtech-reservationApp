@extends('layouts.app')

@section('content')


    <h2 class="user-name">{{ $user->name }}さん</h2>


    <div class="flex">
            <div class="reservation">
                <h3>予約状況</h3>
                    @forelse ($reservations as $key=>$reservation)
                        <table class="col-lg-10 col-md-12 col-sm-12 mypage-table">
                            <thead>
                                <tr>
                                    <th class="reserve-icon">予約 {{$key+1}}</th>
                                    <th class="delete-icon">
                                        <form action="{{ route('reservation.destroy', $reservation->id )}}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <input type="submit" value="&#xf00d" class="fas btn fa-lg" style="color: white" onclick="return confirm('予約を取り消しますか？')">
                                        </form>
                                    </th>
                                </tr>
                            </thead>
                            <tr>
                                <td class="table-menu">shop</td>
                                <td class="table-content">{{$reservation->store->name}}</td>
                            </tr>
                            <tr>
                                <td class="table-menu">date</td>
                                <td class="table-content">{{$reservation->date}}</td>
                            </tr>
                            <tr>
                                <td class="table-menu">time</td>
                                <td class="table-content">{{$reservation->starts_at}}</td>
                            </tr>
                            <tr>
                                <td class="last-table-menu">number</td>
                                <td class="last-table-content">{{$reservation->number_of_guests}}</td>
                            </tr>
                        </table>
                    @empty
                    <div class="container">
                        <div class="card" style="width: 100%;">
                            <div class="card-body">
                              <h5 class="card-title-sub text-center">予約はまだありません。</h5>
                            </div>
                          </div>
                    </div>
                    @endforelse
            </div>

        <div class="favorite">
            <h3>お気に入り店舗</h3>
                <div class="favorite-flex">
                    @forelse ($favorites as $favorite)
                    {{-- <div class="mb-3 col-lg-6 col-md-12 col-sm-12">
                        <div class="card card-size favorite-card">
                            <img class="card-img-top" src="{{ $favorite->store->image }}">
                            <div class="card-body">
                                <h4 class="card-title">{{$favorite->store->name}}</h4>
                                <p class="card-text">#{{$favorite->store->area}} #{{$favorite->store->genre}}</p>

                                <div class="d-flex justify-content-between">
                                    <a href="{{ route('stores.show',$favorite->store->id) }}" class="btn btn-primary">詳しく見る</a>

                                    @if($favorite->user()->where('id', Auth::id())->exists())
                                        <form action="{{ route('unfavorite', $favorite->store )}}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <input type="submit" value="&#xf057" class="fas btn fa-lg">
                                            <input type="hidden" name="store_id" value="{{$favorite->store->id}}">
                                        </form>
                                    @else
                                        <form action="{{ route('favorite', $favorite->store )}}" method="POST">
                                            @csrf
                                            <input type="submit" value="&#xf004" class="fas btn fa-lg">
                                            <input type="hidden" name="store_id" value="{{$favorite->store->id}}">
                                        </form>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div> --}}
                        <section class="mypage-card">
                            <img class="card-img" src="{{ $favorite->store->image }}">
                            <div class="card-content">
                            <h1 class="card-title">{{$favorite->store->name}}</h1>
                            <p class="card-text">#{{$favorite->store->area}} #{{$favorite->store->genre}}</p>
                            </div>
                            <div class="card-flex">
                                <a href="{{ route('stores.show',$favorite->store->id) }}" class="btn  btn-sm">詳しくみる</a>

                                @if($favorite->user()->where('id', Auth::id())->exists())
                                    <form action="{{ route('subunfavorite', $favorite->store )}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <input type="submit" value="&#xf057" class="fas btn fa-lg">
                                    <input type="hidden" name="store_id" value="{{$favorite->store->id}}">
                                    </form>
                                @else
                                    <form action="{{ route('favorite', $favorite->store )}}" method="POST">
                                    @csrf
                                    <input type="submit" value="&#xf004" class="fas btn fa-lg">
                                    <input type="hidden" name="store_id" value="{{$favorite->store->id}}">
                                    </form>
                                @endif
                            </div>
                        </section>

                @empty
                    <div class="container">
                        <div class="card" style="width: 80%;">
                            <div class="card-body">
                              <h5 class="card-title-sub text-center">お気に入りに登録されている店舗はありません。</h5>
                            </div>
                          </div>
                    </div>
                @endforelse
            </div>
        </div>
    </div>



@endsection
