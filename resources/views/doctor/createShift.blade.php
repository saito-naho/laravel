@extends('layouts.app')

@section('content')
<main class="py-4">
    <div class="col-md-5 mx-auto">
        <div class="card">
            <div class="card-header">
                <h4 class='text-center'>シフト登録</h1>
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
                    <form action="{{ route('doctor.store') }}" method="post">
                        @csrf
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="1" name="time1" id="time1">
                            <label class="form-check-label" for="time1">
                            10:00-10:30
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="1" name="time2" id="time2">
                            <label class="form-check-label" for="time2">
                            10:30-11:00
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="1" name="time3" id="time3">
                            <label class="form-check-label" for="time3">
                            11:00-11:30
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="1" name="time4" id="time4">
                            <label class="form-check-label" for="time4">
                            11:30-12:00
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="1" name="time5" id="time5">
                            <label class="form-check-label" for="time5">
                            14:00-14:30
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="1" name="time6" id="time6">
                            <label class="form-check-label" for="time6">
                            14:30-15:00
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="1" name="time7" id="time7">
                            <label class="form-check-label" for="time7">
                            15:00-15:30
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="1" name="time8" id="time8">
                            <label class="form-check-label" for="time8">
                            15:30-16:00
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="1" name="time9" id="time9">
                            <label class="form-check-label" for="time9">
                            16:00-16:30
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="1" name="time10" id="time10">
                            <label class="form-check-label" for="time10">
                            16:30-17:00
                            </label>
                        </div>
                        <div>
                            <button type="submit" class="btn btn-primary btn-block mt-3">登録</button>
                        </div>
                    </form>
                    <div class="row justify-content-center mt-3">
                        <a href="{{ route('doctor.index') }}">
                            <button class="btn btn-sm btn-block mt-1" style="background-color:rgb(126, 219, 253); color:white;">
                                Topへ戻る
                            </button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

@endsection