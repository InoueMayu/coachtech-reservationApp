@extends('layouts.app')

@section('content')

<div class="container">
    <div class="card mx-auto mt-5" style="width: 500px">
        <div class="card-body">
          <h5 class="card-title text-center">会員登録ありがとうございます</h5>
            <div class="text-center">
                <a href="{{route('stores.index')}}" class="btn btn-primary">飲食店一覧へ</a>
            </div>

        </div>
    </div>
</div>


@endsection
