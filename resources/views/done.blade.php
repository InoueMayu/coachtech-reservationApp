@extends('layouts.app')

@section('content')

<div class="container">
        <div class="row thanks">
            <div class="card mx-auto mt-5 thanks-card">
                <div class="card-body thanks-body">
                    <div class="thanks-btn">
                        <h5 class="card-title">ご予約ありがとうございます</h5>
                        <a href="{{route('stores.index')}}" class="btn btn-primary btn-sm login-btn">戻る</a>
                    </div>
                </div>
            </div>
        </div>
</div>


@endsection
