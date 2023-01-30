@extends('layouts.app')

@section('content')
    <main class="py-4">
        @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
        @endif
        <div class="row justify-content-around mt-2">
            <div class="col-md-4">
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <form action="{{ route('user.update',$user->id) }}" method="POST" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="form-group">
                        <label for="tel">電話番号</label>
                        <input type="text" name="tel" class="form-control" id="tel" value="{{ old('tel',$user->tel) }}" style="background-color: rgb(232, 243, 246);">
                    </div>
                    <div class="form-group">
                        <label for="birth">生年月日</label>
                        <input type="date" name="birth" class="form-control" id="birth" value="{{ old('birth',$user->birth) }}" style="background-color: rgb(232, 243, 246);">
                    </div>
                    <div class="form-group">
                        <label for="address">住所</label>
                        <input type="text" name="address" class="form-control" id="address" value="{{ old('address',$user->address) }}" style="background-color: rgb(232, 243, 246);">
                    </div>
                    <div class="form-group">
                        <label for="imagefront">保険証表面</label>
                        <br>
                        <img src="{{ asset('storage/images/'.$user->imagefront) }}" style="width:auto;height:100px">
                        <input type="file" name="imagefront" class="imagefront" id="imagefront" value="">
                    </div>
                    <div class="form-group">
                        <label for="imageback">保険証裏面</label>
                        <br>
                        <img src="{{ asset('storage/images/'.$user->imageback) }}" style="width:auto;height:100px">
                        <input type="file" name="imageback" class="imageback" id="imageback" value="">
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">編集する</button>
                    
                </form>
            </div>
        </div>
    </main>
@endsection