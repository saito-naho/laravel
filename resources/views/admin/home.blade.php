@extends('layouts.app')

@section('content')
        <main class="py-4">
            @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
            @endif

            
            <div class="row justify-content-around mt-2">
                <div class="col-md-4">
                    <div class='d-flex justify-content-around mt-3'>
                        <a class="btn" href="{{ route('admin.doctorList') }}" style="background-color:#CC99FF; color:white;">
                            医師一覧
                        </a>
                        <a class="btn" href="{{ route('admin.patientList') }}" style="background-color:#64F9C1; color:white;">
                            患者一覧
                        </a>
                    </div>
                    <br>
                    <div class="card">
                        <div class="card-header">
                            <div class="row justify-content-around mt-3">
                                <a href="{{ route('admin.alter.yearMonth', ['yearMonth' => $preday]) }}">＜＜前日</a>
                                <div class='text-center'>{{ $today }}</div>
                                @if($bool)
                                <a href="{{ route('admin.alter.yearMonth', ['yearMonth' => $nextday]) }}">翌日＞＞</a>
                                @else
                                <p></p>
                                @endif
                            </div>
                            <div class='text-center'>予約一覧</div>
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
                                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#testModal" data-user-id="{{ $list->user_id }}">
                                                詳細
                                            </button>
                                        </th>
                                    </tr>
                                    @endforeach
                                    予約はありません。
                                    @endif
                                </tbody>
                            </table>
                        </div>
                        {{ $lists->links() }}
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
                                    <th scope="row">担当医師</th>
                                    <td class="doctorName"></td>
                                </tr>
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
