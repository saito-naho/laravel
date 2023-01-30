@extends('layouts.app')

@section('content')
        <main class="py-4">
            <div class="row justify-content-around mt-2">
                <div class="col-md-4">
                    
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
                                        @if($reserve->haedache == 3)
                                            <th scope='col'>重い</th>
                                        @elseif($reserve->haedache == 2)
                                            <th scope='col'>中程度</th>
                                        @elseif($reserve->haedache == 1)
                                            <th scope='col'> 軽い</th>
                                        @else
                                            <th scope='col'>なし</th>
                                        @endif
                                    </tr>
                                    <tr>
                                        <th scope='col'>腹痛</th>
                                        @if($reserve->stomachache == 3)
                                            <th scope='col'>重い</th>
                                        @elseif($reserve->stomachache == 2)
                                            <th scope='col'>中程度</th>
                                        @elseif($reserve->stomachache == 1)
                                            <th scope='col'> 軽い</th>
                                        @else
                                            <th scope='col'>なし</th>
                                        @endif
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
                        <div class="card-footer">
                            <div class='row justify-content-around mt-2'>
                                <a class="d-inline-block" href="{{ route('reservation.edit',['reservation'=>$reserve->id]) }}">
                                    <button class="btn" style="background-color:#f9f95f; width:150px;">予約変更</button>
                                </a>
                                <form class="d-inline-block"  action="{{ route('reservation.destroy',['reservation'=>$reserve->id]) }}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <button class="btn" style="background-color:#ff7171; width:150px;" onclick="return confirm('キャンセルします。よろしいですか？')">キャンセル</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>


                
            </div>
        </main>
@endsection
