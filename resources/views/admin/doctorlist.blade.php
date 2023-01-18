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
                        <a class="d-inline-block" href="{{ route('admin.index') }}">
                            <button class='btn btn-danger'>予約一覧</button>
                        </a>
                        <a class="d-inline-block"  href="{{ route('admin.patientList') }}">
                            <button class='btn btn-secondary'>患者一覧</button>
                        </a>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <div class='text-center'>医師一覧</div>
                        </div>
                        
                        <div class="card-body">
                            <table class='table'>
                                <thead>
                                    <tr>
                                        <th scope='col'>名前</th>
                                        <th scope='col'>専門分野</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(isset($doctors))
                                    @foreach($doctors as $doctor)
                                    <tr>
                                        <th scope='col'>{{ $doctor->user->name }}先生</th>
                                        <th scope='col'>{{ $doctor->specialty }}</th>
                                    </tr>
                                    @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>


                
            </div>
        </main>
@endsection