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
                <h4 class='text-center'>予約変更</h1>
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
                    <form action="{{ route('reservation.update',['reservation'=>$reserve->id]) }}" method="post">
                        @method('PUT')
                        @csrf
                        
                            <div class="form-group">
                              <label for="headache">頭痛</label>
                              <select class="form-control" id="haedache" name="headache">
                                <option value="{{old('headache',$reserve->haedache)}}" selected>
                                    @if($reserve->haedache == 0)重い
                                    @elseif($reserve->haedache ==1)中程度
                                    @elseif($reserve->haedache ==2)軽い
                                    @elseif($reserve->haedache ==3)なし
                                    @endif
                                </option>
                                <option value="0">重い</option>
                                <option value="1">中程度</option>
                                <option value="2">軽い</option>
                                <option value="3">なし</option>
                              </select>
                            </div>
                            <div class="form-group">
                              <label for="stomachache">腹痛</label>
                              <select class="form-control" id="stomachache" name="stomachache">
                                <option value="{{old('stomachache',$reserve->stomachache)}}" selected>
                                    @if($reserve->stomachache == 0)重い
                                    @elseif($reserve->stomachache ==1)中程度
                                    @elseif($reserve->stomachache ==2)軽い
                                    @elseif($reserve->stomachache ==3)なし
                                    @endif
                                </option>
                                <option value="0">重い</option>
                                <option value="1">中程度</option>
                                <option value="2">軽い</option>
                                <option value="3">なし</option>
                              </select>
                            </div>

                            <div class="form-group">
                                <label for="symptoms">その他症状</label>
                                <textarea class="form-control" id="symptoms" rows="3" name="symptoms">{{old('symptoms',$reserve->symptoms)}}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="memo">要望</label>
                                <textarea class="form-control" id="memo" rows="3" name="memo">{{old('memo',$reserve->memo)}}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="comment">備考</label>
                                <textarea class="form-control" id="comment" rows="3" name="comment">{{old('comment',$reserve->comment)}}</textarea>
                            </div>


                            <div class="form-group">
                                <label for="date_at">予約日</label>
                               <input type="date" name="date_at" id="date_at" value="{{old('date_at',$reserve->date_at)}}">
                           </div>

                            <div class="form-group">
                              <label for="time">予約時間</label>
                              <select class="form-control" id="time" name="time">
                                <option value="time1" {{$reserve->time == "time1" ? "selected" : ""}}>10:00-10:30</option>
                                <option value="time2" {{$reserve->time == "time2" ? "selected" : ""}}>10:30-11:00</option>
                                <option value="time3" {{$reserve->time == "time3" ? "selected" : ""}}>11:00-11:30</option>
                                <option value="time4" {{$reserve->time == "time4" ? "selected" : ""}}>11:30-12:00</option>
                                <option value="time5" {{$reserve->time == "time5" ? "selected" : ""}}>14:00-14:30</option>
                                <option value="time6" {{$reserve->time == "time6" ? "selected" : ""}}>14:30-15:00</option>
                                <option value="time7" {{$reserve->time == "time7" ? "selected" : ""}}>15:00-15:30</option>
                                <option value="time8" {{$reserve->time == "time8" ? "selected" : ""}}>15:30-16:00</option>
                                <option value="time9" {{$reserve->time == "time9" ? "selected" : ""}}>16:00-16:30</option>
                                <option value="time10" {{$reserve->time == "time10" ? "selected" : ""}}>16:30-17:00</option>
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