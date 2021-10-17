@extends('layouts.app')

@section('content')

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
                <div class="show-reservation-top">
                    <h3>予約</h3>
                    <div class="mb-3">
                    <input type="date" name="date" v-bind="dateSelect" class="date-input">
                    </div>
                    <select class="form-select form-control mb-3" aria-label="Default select example" name="starts_at" v-bind="timeSelect">
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
                    <select class="form-select form-control mb-3" aria-label="Default select example" name="number_of_guests" v-bind="numberSelect">
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
                            <td class="show-table-content">@{{ dateSelect }}</td>
                        </tr>
                        <tr>
                            <td class="show-table-menu">time</td>
                            <td class="show-table-content">@{{ timeSelect }}</td>
                        </tr>
                        <tr>
                            <td class="last-menu">number</td>
                            <td class="last-content">@{{ numberSelect }}</td>
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

@endsection
