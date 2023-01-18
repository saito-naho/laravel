@extends('layouts.app')

@section('content')
        <main class="py-4">
            @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
            @endif
            <div class="row justify-content-around mt-3">
                @if(is_null($shift))
                <a href="{{ route('doctor.create') }}">
                    <button type="button" class="btn btn-warning">シフト登録</button>
                </a>
                @else
                <a href="{{ route('doctor.edit',['doctor'=>$shift->id]) }}">
                    <button type="button" class="btn btn-primary">シフト編集</button>
                </a>
                @endif
            </div>

            <div class="row justify-content-around mt-3">
                <div class="card" style="width: 50rem;">
                    <div class="card-header">
                        <div class="row justify-content-around mt-3">
                            <a href="{{ route('home', ['yearMonth' => $preday]) }}">＜＜前日</a>
                            <div class='text-center'>{{ $today }}</div>
                            @if($bool)
                            <a href="{{ route('home', ['yearMonth' => $nextday]) }}">翌日＞＞</a>
                            @else
                            <p></p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>


            
            <div class="row justify-content-around mt-2">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            <div class='text-center'>予約者一覧</div>
                        </div>
                        <div class="card-body">
                            <div class="card-body">
                                <table class='table'>
                                    <thead>
                                        <tr>
                                            <th scope='col'>名前</th>
                                            <th scope='col'>予約日時</th>
                                            <th scope='col'></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if(isset($lists))
                                        @foreach($lists as $list)
                                        <tr>
                                            <th scope='col'>{{ $list->user->name }}</th>
                                            <th scope='col'>{{ $list->user->date_at }} {{ $list->user->time }}</th>
                                            <th scope='col'>
                                                <a href="{{ route() }}">詳細</a>
                                            </th>
                                        </tr>
                                        @endforeach
                                        @endif
                                        予約はありません。
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
@endsection