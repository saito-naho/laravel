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
                    {{-- 患者検索 --}}
                    <form method="GET" action="{{ route('admin.patientList') }}">
                        <input type="hidden" name="search" value="search">
                        <div class="form-group row">
                            <label for="name" class="col-sm-2 col-form-label">氏名</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="name" name="name" placeholder="氏名を入力してください。">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="tel" class="col-sm-2 col-form-label">電話番号</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="tel" name="tel" placeholder="電話番号を入力してください。">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-outline-dark btn-lg btn-block btn-sm">患者検索</button>
                    </form>
                    <div class='d-flex justify-content-around mt-3'>
                        <a class="btn" href="{{ route('admin.index') }}" style="background-color:#5D99FF; color:white;">
                            予約一覧
                        </a>
                        <a class="btn"  href="{{ route('admin.doctorList') }}" style="background-color:#CC99FF; color:white;">
                            医師一覧
                        </a>
                    </div>
                    <br>
                    <div class="card">
                        <div class="card-header">
                            <div class='text-center'>患者一覧</div>
                        </div>
                        
                        <div class="card-body">
                            <table class='table'>
                                <thead>
                                    <tr>
                                        <th scope='col'>名前</th>
                                        <th scope='col'></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(isset($patients))
                                    @foreach($patients as $patient)
                                    <tr>
                                        <th scope='col'>{{ $patient->name }}</th>
                                        <th scope='col'>
                                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#testModal" data-user-id="{{ $patient->id }}">
                                                詳細
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
        <div class="modal fade" id="testModal" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">詳細情報</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                  </button>
                </div>
                <div class="modal-body">
                    {{-- ここに入れる --}}
                    <table class="table">
                        <tbody>
                            <tr>
                                <th scope="row">名前</th>
                                <td class="name"></td>
                            </tr>
                            <tr>
                                <th scope="row">電話番号</th>
                                <td class="tel"></td>
                            </tr>
                            <tr>
                                <th scope="row">メールアドレス</th>
                                <td class="email"></td>
                            </tr>
                            <tr>
                                <th scope="row">住所</th>
                                <td class="address"></td>
                            </tr>
                            <tr>
                                <th scope="row">生年月日</th>
                                <td class="birth"></td>
                            </tr>
                            <tr>
                                <th scope="row">保険証表面</th>
                                <td class="imagefront" ></td>
                            </tr>
                            <tr>
                                <th scope="row">保険証裏面</th>
                                <td class="imageback"></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
              </div>
            </div>
        </div>
@endsection



{{-- 当初下記に記載していたが、JSに記述したためコメントアウト --}}
{{-- 記述方法、箇所記録のために残したい --}}
{{-- <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>

<script>
$(function(){
  $('#testModal').on('show.bs.modal', function(event){
    // クリックしたボタンのID取得
    var button = $(event.relatedTarget);
    var id = button.data('user-id');
    
    
    $('.modal-footer').empty();
    $('.modal-body .imagefront').empty();
    $('.modal-body .imageback').empty();

    //ajax（非同期通信） 
    $.ajax({
      type: "get", //HTTP通信の種類
      url:'/ajax/patient/' + id, //通信したいURL
      dataType: 'json'
    })
    //通信が成功したとき200
    .done((res)=>{
      let id = res.id;//userinfoテーブルのID
      let userId = res.user_id;
      let name = res.name;
      let tel = res.tel;
      let email = res.email;
      let address = res.address;
      let birth = res.birth;
      let imagefront = res.imagefront;
      let imageback = res.imageback;
      
      let buttonhtml = `
            <a href="../../user/${userId}/edit">
                <button type="button" class="btn btn-secondary">
                    編集
                </button>
            </a>
      `
      let front = `
      <img src="../../../storage/images/${imagefront}" style="width:auto;height:100px">
      `
      let back = `
      <img src="../../../storage/images/${imageback}" style="width:auto;height:100px">
      `
      var modal = $(this);
      modal.find('.modal-body .name').text(name);
      modal.find('.modal-body .tel').text(tel);
      modal.find('.modal-body .email').text(email);
      modal.find('.modal-body .address').text(address);
      modal.find('.modal-body .birth').text(birth);
      modal.find('.modal-footer').append(buttonhtml);
      modal.find('.modal-body .imagefront').append(front);
      modal.find('.modal-body .imageback').append(back);
    
    })
    //通信が失敗したとき（200以外
    .fail((error)=>{
      console.log(error)
    })

  });
});
</script> --}}
