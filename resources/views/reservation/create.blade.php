@extends('layouts.app')

@section('content')
<main class="py-4">
    @if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
    @endif
    <div class="col-md-5 mx-auto">
        <div class="card">
            <div class="card-header">
                <h4 class='text-center'>新規予約</h1>
            </div>
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <div class="card-body">
                <div class="card-body">
                    <form action="{{ route('reservation.store') }}" method="post">
                        @csrf
                        
                            <div class="form-group">
                              <label for="headache">頭痛</label>
                              <select class="form-control" id="haedache" name="headache">
                                <option value="" hidden>選択してください</option>
                                <option value="0">重い</option>
                                <option value="1">中程度</option>
                                <option value="2">軽い</option>
                                <option value="3">なし</option>
                              </select>
                            </div>
                            <div class="form-group">
                              <label for="stomachache">腹痛</label>
                              <select class="form-control" id="stomachache" name="stomachache">
                                <option value="" hidden>選択してください</option>
                                <option value="0">重い</option>
                                <option value="1">中程度</option>
                                <option value="2">軽い</option>
                                <option value="3">なし</option>
                              </select>
                            </div>

                            <div class="form-group">
                                <label for="symptoms">その他症状</label>
                                <textarea class="form-control" id="symptoms" rows="3" name="symptoms">{{old('symptoms')}}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="memo">要望</label>
                                <textarea class="form-control" id="memo" rows="3" name="memo">{{old('memo')}}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="comment">備考</label>
                                <textarea class="form-control" id="comment" rows="3" name="comment">{{old('comment')}}</textarea>
                            </div>


                            <div class="form-group">
                                <label for="date_at">予約日</label>
                               <input type="date" name="date_at" id="date_at" value="{{old('date')}}">
                           </div>

                            <div class="form-group">
                              <label for="time">予約時間</label>
                              <select class="form-control" id="time" name="time">
                                <option value="" hidden>選択してください</option>
                                <option value="time1">10:00-10:30</option>
                                <option value="time2">10:30-11:00</option>
                                <option value="time3">11:00-11:30</option>
                                <option value="time4">11:30-12:00</option>
                                <option value="time5">14:00-14:30</option>
                                <option value="time6">14:30-15:00</option>
                                <option value="time7">15:00-15:30</option>
                                <option value="time8">15:30-16:00</option>
                                <option value="time9">16:00-16:30</option>
                                <option value="time10">16:30-17:00</option>
                              </select>
                            </div>

                            <button type="submit" class="btn btn-primary" onclick="return confirm('登録します。よろしいですか？')">予約する</button>
                            
                
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>

@endsection