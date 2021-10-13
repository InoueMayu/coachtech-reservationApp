@extends('layouts.app')

@section('content')

<div class="container d-flex">
    <div style="width: 40%">
        <h4 class="">{{$store->name}}</h4>
        <img src="{{ $store->image }}" style="width: 100%">
        <div class="">
            <p class="mt-3">#{{$store->area}} #{{$store->genre}}</p>
            <p>{{$store->description}}</p>
        </div>
    </div>


    <div style="width: 40%" class="mx-auto">
    @auth
    <form action="{{ route('reservation.store') }}" method="POST">
        @csrf
        <input type="hidden" name="store_id" value="{{$store->id}}">
      <h3>予約</h3>
        <div class="mb-3">
          <input type="date" name="date">
        </div>
        <select class="form-select form-control mb-3" aria-label="Default select example" name="starts_at">
          <option value="17:00" name="starts_at">17:00</option>
          <option value="17:30" name="starts_at">17:30</option>
          <option value="18:00" name="starts_at">18:00</option>
        </select>
        <select class="form-select form-control mb-3" aria-label="Default select example" name="number_of_guests">
          <option value="1" name="number_of_guests">1人</option>
          <option value="2" name="number_of_guests">2人</option>
          <option value="3" name="number_of_guests">3人</option>
        </select>
        <button type="submit" class="btn btn-primary">予約する</button>
      </form>
      @endauth

      @guest
      <div class="card mx-auto mt-5" style="width: 500px">
            <div class="card-body">
            <h5 class="card-title text-center">予約をご希望の場合はユーザー登録または<br>ログインをお願いします。</h5>
                <div class="text-center">
                    <a href="{{route('register')}}" class="btn btn-primary">ユーザー登録へ</a>
                    <a href="{{ route('login') }}" class="btn btn-primary">ログインへ</a>
                </div>

            </div>
        </div>
      @endguest
    </div>

</div>

@endsection
