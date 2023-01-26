@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center">ホーム</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class='mt-3'>
                        @if(!empty($reservationId[0]->id))
                        <a class="" href="{{ route('reservation.show',['reservation'=>$reservationId[0]->id]) }}">
                            <button class="btn btn-outline-primary btn-lg btn-block">予約詳細</button>
                        </a>
                        @else
                        <a class="" href="{{ route('reservation.create') }}">
                            <button class="btn btn-outline-primary btn-lg btn-block">新規予約</button>
                        </a>
                        @endif
                        <br>
                        <a class=""  href="{{ route('user.show',['user'=>Auth::id()]) }}">
                            <button class="btn btn-outline-info btn-lg btn-block">基本情報</button>
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
