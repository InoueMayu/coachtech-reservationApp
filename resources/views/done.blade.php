@extends('layouts.app')

@section('content')

<div class="container">
    <div class="card mx-auto mt-5" style="width: 500px">
        <div class="card-body">
          <h5 class="card-title text-center">ご予約ありがとうございます</h5>
            <div class="text-center">
                <a href="{{route('stores.index')}}" class="btn btn-primary">戻る</a>
            </div>

        </div>
    </div>
</div>


@endsection
