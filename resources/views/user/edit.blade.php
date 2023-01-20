@extends('layouts.app')

@section('content')
    <main class="py-4">
        <div class="row justify-content-around mt-2">
            <div class="col-md-4">
                <form action="{{ route('user.update',$user->id) }}" method="POST">
                    @method('PUT')
                    @csrf
                    <div class="form-group">
                    <label for="tel">電話番号</label>
                    <input type="text" name="tel" class="form-control" id="tel" value="{{ old('tel',$user->tel) }}">
                    </div>
                    <div class="form-group">
                    <label for="birth">生年月日</label>
                    <input type="date" name="birth" class="form-control" id="birth" value="{{ old('birth',$user->birth) }}">
                    </div>
                    <div class="form-group">
                    <label for="address">住所</label>
                    <input type="text" name="address" class="form-control" id="address" value="{{ old('address',$user->address) }}">
                    </div>
                    <button type="submit" class="btn btn-primary">編集する</button>
                </form>
            </div>
        </div>
    </main>
@endsection