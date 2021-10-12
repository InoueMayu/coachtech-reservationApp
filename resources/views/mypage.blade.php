@extends('layouts.app')

@section('content')

<div class="container">
    <p>{{ $user->name }}</p>

    <div class="flex">
        <div class="reservation">
            <h2>予約状況</h2>
        @forelse ($reservations as $reservation)
            <table>
                <thead>
                    <tr>
                        <th class="reserve-icon">予約</th>
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
                    <td class="table-menu">number</td>
                    <td class="table-content">{{$reservation->number_of_guests}}</td>
                </tr>
            </table>
            @empty
            <p>no reservation yet</p>
        @endforelse
        </div>

        <div class="favorite">
            <h2>お気に入り店舗</h2>
        @forelse ($favorites as $favorite)
            <div class="mb-3">
                <div class="card card-size">
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
            </div>
        @empty
            <p>no favorite yet</p>
        @endforelse
        </div>
    </div>
</div>


@endsection
