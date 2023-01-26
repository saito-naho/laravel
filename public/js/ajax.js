
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
      let id = res[0].id;//userinfoテーブルのID
      let userId = res[0].user_id;
      let date_at = res[0].date_at;
      let time = res[0].time;
      let name = res[0].name;
      let tel = res[0].tel;
      let email = res[0].email;
      let address = res[0].address;
      let birth = res[0].birth;
      let imagefront = res[0].imagefront;
      let imageback = res[0].imageback;
      let headache = '';
      if(res[0].haedache == 3){
            headache = '重い';
      }else if(res[0].haedache == 2){
            headache = '中程度';
      }else if(res[0].haedache == 1){
            headache = '軽い';
      }else{
            headache = 'なし';
      }
      let stomachache = '';
      if(res[0].stomachache == 3){
            stomachache = '重い';
        }else if(res[0].stomachache == 2){
            stomachache = '中程度';
        }else if(res[0].stomachache == 1){
            stomachache = '軽い';
        }else{
            stomachache = 'なし';
        }

      let symptoms = res[0].symptoms;
      let memo = res[0].memo;
      let comment = res[0].comment;
      let doctorName = res[1];
      
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
    //   (モーダルのどこ .クラス名 .Id名).表示(上のletの後ろ)
      modal.find('.modal-body .time').text(time);
      modal.find('.modal-body .date_at').text(date_at);
      modal.find('.modal-body .name').text(name);
      modal.find('.modal-body .tel').text(tel);
      modal.find('.modal-body .email').text(email);
      modal.find('.modal-body .address').text(address);
      modal.find('.modal-body .birth').text(birth);
      modal.find('.modal-body .headache').text(headache);
      modal.find('.modal-body .stomachache').text(stomachache);
      modal.find('.modal-body .symptoms').text(symptoms);
      modal.find('.modal-body .memo').text(memo);
      modal.find('.modal-body .comment').text(comment);
      modal.find('.modal-body .doctorName').text(doctorName);
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
