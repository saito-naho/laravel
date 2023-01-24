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
                                        <th scope='col'></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(isset($doctors))
                                    @foreach($doctors as $doctor)
                                    <tr>
                                        <th scope='col'>{{ $doctor->user->name }}先生</th>
                                        <th scope='col'>{{ $doctor->specialty }}</th>
                                        <th scope='col'>
                                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal" data-doctor-id="{{ $doctor->id }}">
                                                シフト
                                            </button>
                                        </th>
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

        {{-- モーダル --}}
        <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title">シフト</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    </div>
                    <div class="modal-body">
                        {{-- ここに入れる --}}

                        
                    </div>
                </div>
            </div>
        </div>
@endsection


<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>

<script>
$(function(){
  $('#modal').on('show.bs.modal', function(event){
    // クリックしたボタンのID取得
    var button = $(event.relatedTarget);
    var id = button.data('doctor-id');

    $('.modal-body').empty();

    //ajax（非同期通信） 
    $.ajax({
      type: "get", //HTTP通信の種類
      url:'/ajax/doctor/' + id, //通信したいURL
      dataType: 'json'
    })
    //通信が成功したとき200
    .done((res)=>{
      let time1 = res.time1;
      let time2 = res.time2;
      let time3 = res.time3;
      let time4 = res.time4;
      let time5 = res.time5;
      let time6 = res.time6;
      let time7 = res.time7;
      let time8 = res.time8;
      let time9 = res.time9;
      let time10 = res.time10;
      
      let html = `
      <table class="table">
                            <tbody>
                                <tr>
                                    <td scope='row'>10:00-10:30</td>
                                    <td class='time1'>${ time1 ? '〇' : '-' }</td>
                                </tr>
                                <tr>
                                    <td scope='row'>10:30-11:00</td>
                                    <td class='time2'>${ time2 ? '〇' : '-' }</td>
                                </tr>
                                <tr>
                                    <td scope='row'>11:00-11:30</td>
                                    <td class='time3'>${ time3 ? '〇' : '-' }</td>
                                </tr>
                                <tr>
                                    <td scope='row'>11:30-12:00</td>
                                    <td class='time4'>${ time4 ? '〇' : '-' }</td>
                                </tr>
                                <tr>
                                    <td scope='row'>14:00-14:30</td>
                                    <td class='time5'>${ time5 ? '〇' : '-' }</td>
                                </tr>
                                <tr>
                                    <td scope='row'>14:30-15:00</td>
                                    <td class='time6'>${ time6 ? '〇' : '-' }</td>
                                </tr>
                                <tr>
                                    <td scope='row'>15:00-15:30</td>
                                    <td class='time7'>${ time7 ? '〇' : '-' }</td>
                                </tr>
                                <tr>
                                    <td scope='row'>15:30-16:00</td>
                                    <td class='time8'>${ time8 ? '〇' : '-' }</td>
                                </tr>
                                <tr>
                                    <td scope='row'>16:00-16:30</td>
                                    <td class='time9'>${ time9 ? '〇' : '-' }</td>
                                </tr>
                                <tr>
                                    <td scope='row'>16:30-17:00</td>
                                    <td class='time10'>${ time10 ? '〇' : '-' }</td>
                                </tr>
                            </tbody>
                        </table>
      `
     
      var modal = $(this);
      modal.find('.modal-body').append(html);
    
    })
    //通信が失敗したとき（200以外
    .fail((error)=>{
      console.log(error)
    })

  });
});
</script>
