@extends('layouts.app')

@section('content')
<main class="py-4">
    <div class="col-md-5 mx-auto">
        <div class="card">
            <div class="card-header">
                <h4 class='text-center'>新規登録</h1>
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
                    <form action="{{ route('user.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="tel">電話番号</label>
                            <input type="text" name="tel" class="form-control" id="tel" value="{{ old('tel') }}">
                        </div>
                        <div class="form-group">
                            <label for="birth">生年月日</label>
                            <input type="date" name="birth" class="form-control" id="birth" value="{{ old('birth') }}">
                        </div>
                        <div class="form-group">
                            <label for="address">住所</label>
                            <input type="text" name="address" class="form-control" id="address" value="{{ old('address') }}">
                        </div>
                        <div class="form-group">
                            <label for="imagefront">保険証表面</label>
                            <input type="file" name="imagefront" class="form-control" id="imagefront" value="{{ old('imagefront') }}">
                        </div>
                        <div class="form-group">
                            <label for="imageback">保険証裏面</label>
                            <input type="file" name="imageback" class="form-control" id="imageback" value="{{ old('imageback') }}">
                        </div>
                        
                        <button type="submit" class="btn btn-primary">登録する</button>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>

@endsection