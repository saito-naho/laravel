@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class='d-flex justify-content-between mt-3'>
                        @if(!empty($reservationId[0]->id))
                        <a class="d-inline-block" href="{{ route('reservation.show',['reservation'=>$reservationId[0]->id]) }}">
                            <button class='btn btn-danger'>予約詳細</button>
                        </a>
                        @else
                        <a class="d-inline-block" href="{{ route('reservation.create') }}">
                            <button class='btn btn-danger'>新規予約</button>
                        </a>
                        @endif
                        <a class="d-inline-block"  href="{{ route('user.show',['user'=>Auth::id()]) }}">
                            <button class='btn btn-secondary'>基本情報</button>
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
