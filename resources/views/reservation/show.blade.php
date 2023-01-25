@extends('layouts.app')

@section('content')
        <main class="py-4">
            <div class="row justify-content-around mt-2">
                <div class="col-md-4">
                    <div class='d-flex justify-content-between mt-3'>
                        <a class="d-inline-block" href="{{ route('reservation.edit',['reservation'=>$reserve->id]) }}">
                            <button class='btn btn-danger'>予約変更</button>
                        </a>
                        <form class="d-inline-block"  action="{{ route('reservation.destroy',['reservation'=>$reserve->id]) }}" method="POST">
                            @method('DELETE')
                            @csrf
                            <button class='btn btn-secondary' onclick="return confirm('キャンセルします。よろしいですか？')">キャンセル</button>
                        </form>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <div class='text-center'>予約情報</div>
                        </div>
                        
                        <div class="card-body">
                            <table class='table'>
                                <tbody>
                                    <tr>
                                        <th scope='col'>予約日時</th>
                                        <th scope='col'>{{ $reserve->date_at }} {{ $reserve->time }}</th>
                                    </tr>
                                    <tr>
                                        <th scope='col'>頭痛</th>
                                        <th scope='col'>{{ $reserve->haedache }}</th>
                                    </tr>
                                    <tr>
                                        <th scope='col'>腹痛</th>
                                        <th scope='col'>{{ $reserve->stomachache }}</th>
                                    </tr>
                                    <tr>
                                        <th scope='col'>その他症状</th>
                                        <th scope='col'>{{ $reserve->symptoms }}</th>
                                    </tr>
                                    <tr>
                                        <th scope='col'>要望</th>
                                        <th scope='col'>{{ $reserve->memo }}</th>
                                    </tr>
                                        <th scope='col'>備考</th>
                                        <th scope='col'>{{ $reserve->comment }}</th>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>


                
            </div>
        </main>
@endsection
