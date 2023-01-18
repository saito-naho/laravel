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
                    <div class='d-flex justify-content-between mt-3'>
                        <a class="d-inline-block" href="{{ route('admin.doctorList') }}">
                            <button class='btn btn-danger'>医師一覧</button>
                        </a>
                        <a class="d-inline-block"  href="{{ route('admin.patientList') }}">
                            <button class='btn btn-secondary'>患者一覧</button>
                        </a>
                    </div>
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
                            <div class='text-center'>予約者一覧</div>
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
                                            <a href="">詳細</a>
                                        </th>
                                    </tr>
                                    @endforeach
                                    @endif
                                    予約はありません。
                                </tbody>
                            </table>
                        </div>
                        {{ $lists->links() }}
                    </div>
                </div>


                
            </div>
        </main>
@endsection