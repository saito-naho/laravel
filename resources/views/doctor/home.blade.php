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
                <a href="{{ route('doctor.edit',['doctor'=>Auth::id()]) }}">
                    <button type="button" class="btn btn-primary">シフト編集</button>
                </a>
                @endif
            </div>

            <div class="row justify-content-around mt-3">
                <div class="card" style="width: 50rem;">
                    <div class="card-header">
                        <div class="row justify-content-around mt-3">
                            <a href="{{ route('alter.yearMonth', ['yearMonth' => $preday]) }}">＜＜前日</a>
                            <div class='text-center'>{{ $today }}</div>
                            @if($bool)
                            <a href="{{ route('alter.yearMonth', ['yearMonth' => $nextday]) }}">翌日＞＞</a>
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


                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            <div class='text-center'>シフト一覧</div>
                        </div>
                        <div class="card-body">
                            <div class="card-body">
                                <table class='table'>
                                    <thead>
                                        <tr>
                                            <th scope='col'>時間帯</th>
                                            <th scope='col'>シフト</th>
                                            <th scope='col'></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if(isset($shift))
                                        <tr>
                                            <td scope='col'>10:00-10:30</td>
                                            <td scope='col'>{{ $shift->time1 ? '〇' : '-' }}</td>
                                        </tr>
                                        <tr>
                                            <td scope='col'>10:30-11:00</td>
                                            <td scope='col'>{{ $shift->time2 ? '〇' : '-' }}</td>
                                        </tr>
                                        <tr>
                                            <td scope='col'>11:00-11:30</td>
                                            <td scope='col'>{{ $shift->time3 ? '〇' : '-' }}</td>
                                        </tr>
                                        <tr>
                                            <td scope='col'>11:30-12:00</td>
                                            <td scope='col'>{{ $shift->time4 ? '〇' : '-' }}</td>
                                        </tr>
                                        <tr>
                                            <td scope='col'>14:00-14:30</td>
                                            <td scope='col'>{{ $shift->time5 ? '〇' : '-' }}</td>
                                        </tr>
                                        <tr>
                                            <td scope='col'>14:30-15:00</td>
                                            <td scope='col'>{{ $shift->time6 ? '〇' : '-' }}</td>
                                        </tr>
                                        <tr>
                                            <td scope='col'>15:00-15:30</td>
                                            <td scope='col'>{{ $shift->time7 ? '〇' : '-' }}</td>
                                        </tr>
                                        <tr>
                                            <td scope='col'>15:30-16:00</td>
                                            <td scope='col'>{{ $shift->time8 ? '〇' : '-' }}</td>
                                        </tr>
                                        <tr>
                                            <td scope='col'>16:00-16:30</td>
                                            <td scope='col'>{{ $shift->time9 ? '〇' : '-' }}</td>
                                        </tr>
                                        <tr>
                                            <td scope='col'>16:30-17:00</td>
                                            <td scope='col'>{{ $shift->time10 ? '〇' : '-' }}</td>
                                        </tr>
                                        @else
                                        シフトはありません。
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
@endsection