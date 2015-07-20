$(document).ready(function(){
  $('.btn-success').click(function(){
    var Input = $('form').serialize(),
        Agree = $("input[name='agree']:checked").val();
    if (Agree) {
      $.ajax({
        url: "/house/ajax_save_house",
        type: "POST",
        dataType: "json",
        data : {input: Input},
        success : function(data){
          if (data.msgs) {
            alert(data.msgs);
            window.location.href="/house";
          }else{
            alert(data.msg);
          }
        },
      })
    }else{
      alert('亲,你还不确定吗?你再重写吧!');
    }
  })
})
