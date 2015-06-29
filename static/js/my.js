$(document).ready(function(){
  $('.btn-success').click(function(){
    var Input = $('form').serialize();
    $.ajax({
      url: "/user/ajax_save_user",
      type: "POST",
      dataType: "json",
      data : {input: Input},
      success : function(data){
          alert(data.msg);
      },
      error : function(){
          alert('嗯,这个人已经是咱们team之中的了!加油哦!');
          window.location.href="/user"; 
      }
    })
  })
});
