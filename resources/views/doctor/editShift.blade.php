@extends('layouts.app')

@section('content')
<main class="py-4">
    <div class="col-md-5 mx-auto">
        <div class="card">
            <div class="card-header">
                <h4 class='text-center'>シフト編集</h1>
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
                    <form action="{{ route('doctor.update',['doctor'=>Auth::id()]) }}" method="post">
                        @method('PUT')
                        @csrf
                        <input type="hidden" name="id" value="{{ $shift->id }}">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="1" name="time1" id="time1" {{ $shift->time1==1 ? 'checked':'' }}>
                            <label class="form-check-label" for="time1">
                            10:00-10:30
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="1" name="time2" id="time2" {{ $shift->time2==1 ? 'checked':'' }}>
                            <label class="form-check-label" for="time2">
                            10:30-11:00
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="1" name="time3" id="time3" {{ $shift->time3==1 ? 'checked':'' }}>
                            <label class="form-check-label" for="time3">
                            11:00-11:30
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="1" name="time4" id="time4" {{ $shift->time4==1 ? 'checked':'' }}>
                            <label class="form-check-label" for="time4">
                            11:30-12:00
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="1" name="time5" id="time5" {{ $shift->time5==1 ? 'checked':'' }}>
                            <label class="form-check-label" for="time5">
                            14:00-14:30
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="1" name="time6" id="time6" {{ $shift->time6==1 ? 'checked':'' }}>
                            <label class="form-check-label" for="time6">
                            14:30-15:00
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="1" name="time7" id="time7" {{ $shift->time7==1 ? 'checked':'' }}>
                            <label class="form-check-label" for="time7">
                            15:00-15:30
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="1" name="time8" id="time8" {{ $shift->time8==1 ? 'checked':'' }}>
                            <label class="form-check-label" for="time8">
                            15:30-16:00
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="1" name="time9" id="time9" {{ $shift->time9==1 ? 'checked':'' }}>
                            <label class="form-check-label" for="time9">
                            16:00-16:30
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="1" name="time10" id="time10" {{ $shift->time10==1 ? 'checked':'' }}>
                            <label class="form-check-label" for="time10">
                            16:30-17:00
                            </label>
                        </div>
                        <div class="d-flex row justify-content-around">
                            <button type="submit" class="btn btn-primary w-25 mt-3">登録</button>
                            <a href="{{ route('doctor.index') }}">
                                <button class="btn btn-secondary mt-3" style="color:white;">
                                    Topへ戻る
                                </button>
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>

@endsection