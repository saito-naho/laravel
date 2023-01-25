@extends('layouts.app')

@section('content')
        <main class="py-4">
            <div class="row justify-content-around mt-2">
                <div class="col-md-4">
                    <div class='d-flex justify-content-between mt-3'>
                        <a class="d-inline-block" href="{{ route('user.edit',['user'=>$user->id]) }}">
                            <button class='btn btn-danger'>編集</button>
                        </a>
                        <a class="d-inline-block"  href="{{ route('user.destroy',['user'=>$user->id]) }}">
                            <button class='btn btn-secondary'>削除</button>
                        </a>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <div class='text-center'>基本情報</div>
                        </div>
                        
                        <div class="card-body">
                            <table class='table'>
                                <tbody>
                                    <tr>
                                        <th scope='col'>名前</th>
                                        <th scope='col'>{{ $user->name }}</th>
                                    </tr>
                                    <tr>
                                        <th scope='col'>電話番号</th>
                                        <th scope='col'>{{ $user->tel }}</th>
                                    </tr>
                                    <tr>
                                        <th scope='col'>メールアドレス</th>
                                        <th scope='col'>{{ $user->email }}</th>
                                    </tr>
                                    <tr>
                                        <th scope='col'>住所</th>
                                        <th scope='col'>{{ $user->address }}</th>
                                    </tr>
                                    <tr>
                                        <th scope='col'>生年月日</th>
                                        <th scope='col'>{{ $user->birth }}</th>
                                    </tr>
                                        <th scope='col'>保険証表面</th>
                                        <th scope='col'>
                                            <img src="{{ asset('storage/images/'.$user->imagefront) }}" style="width:auto;height:100px">
                                        </th>
                                    </tr>
                                    <tr>
                                        <th scope='col'>保険証裏面</th>
                                        <th scope='col'>
                                            <img src="{{ asset('storage/images/'.$user->imageback) }}" style="width:auto;height:100px">
                                        </th>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>


                
            </div>
        </main>
@endsection
