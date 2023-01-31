@extends('layouts.app')

@section('content')
    <main class="py-4">
        @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
        @endif

        <div id="contener" style="width:1200px;">
            <div id ="left" style="float:left; width:450px; margin-left:250px;">
                <div class="card">
                    <div class="card-header">
                        <div class="row justify-content-center mt-3">
                            <div class='text-center'></div>
                                <a href="{{ route('alter.yearMonth', ['yearMonth' => $preday]) }}"><br>
                                    <button type="button" class="btn btn-outline-primary btn-sm">
                                        前日◀◀
                                    </button>
                                </a>
                            <div class='text-center' style="margin:3px;">予約一覧<br>{{ $today }}</div>
                            @if($bool)
                                <a href="{{ route('alter.yearMonth', ['yearMonth' => $nextday]) }}"><br>
                                    <button type="button" class="btn btn-outline-primary btn-sm">
                                     ▶▶翌日
                                    </button>
                                </a>
                            @else
                            <p></p>
                            @endif
                        </div>
                    </div>

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
                                    <th scope='col'>{{ $list->date_at }} {{ $list->time }}</th>
                                    <th scope='col'>
                                        <button type="button" class="badge rounded-pill bg-primary" data-toggle="modal" data-target="#testModal" data-user-id="{{ $list->user_id }}">
                                            詳細
                                        </button>
                                    </th>
                                </tr>
                                @endforeach
                                @endif
                                予約が入ると表示されます。
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>


            <div id="right" style="float:left; width:280px; margin-left:100px;">
                <div class="card">
                    <div class="card-header">
                        <div class='text-center'>シフト一覧</div>
                    </div>
                    <div class="card-body overflow-auto" style="width:100%; height:300px;">
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
                    <div class="card-footer">
                        @if(is_null($shift))
                        <a href="{{ route('doctor.create') }}">
                            <button type="button" class="btn btn-info btn-block">シフト登録</button>
                        </a>
                        @else
                        <a href="{{ route('doctor.edit',['doctor'=>Auth::id()]) }}">
                            <button type="button" class="btn btn-primary btn-block">シフト編集</button>
                        </a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </main>

    {{-- モーダル --}}
    <div class="modal fade" id="testModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">詳細情報</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    {{-- ここに入れる --}}
                    <table class="table">
                        <tbody>
                            <tr>
                                <th scope="row">予約日</th>
                                <td class="date_at"></td>
                            </tr>
                            <tr>
                                <th scope="row">予約時間</th>
                                <td class="time"></td>
                            </tr>
                            <tr>
                                <th scope="row">名前</th>
                                <td class="name"></td>
                            </tr>
                            <tr>
                                <th scope="row">電話番号</th>
                                <td class="tel"></td>
                            </tr>
                            <tr>
                                <th scope="row">メールアドレス</th>
                                <td class="email"></td>
                            </tr>
                            <tr>
                                <th scope="row">住所</th>
                                <td class="address"></td>
                            </tr>
                            <tr>
                                <th scope="row">生年月日</th>
                                <td class="birth"></td>
                            </tr>
                            <tr>
                                <th scope="row">頭痛</th>
                                <td class='headache'></td>
                            </tr>
                            <tr>
                                <th scope="row">腹痛</th>
                                <td class='stomachache'></td>
                            </tr>
                            <tr>
                                <th scope="row">その他症状</th>
                                <td class="symptoms"></td>
                            </tr>
                            <tr>
                                <th scope="row">要望</th>
                                <td class="memo"></td>
                            </tr>
                            <tr>
                                <th scope="row">備考</th>
                                <td class="comment"></td>
                            </tr>
                            <tr>
                                <th scope="row">保険証表面</th>
                                <td class="imagefront" ></td>
                            </tr>
                            <tr>
                                <th scope="row">保険証裏面</th>
                                <td class="imageback"></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

