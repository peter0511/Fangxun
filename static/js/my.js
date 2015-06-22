$(document).ready(function(){
  $('.btn-success').click(function(){
    var Input = $('form').serialize();
    $.ajax({
      url: "/user/ajax_save_user",
      type: "POST",
      dataType: "json",
      data : {input: Input},
      success : function(data){
        if (data.status != 1) {
          alert(data.msg);
        }else{
          alert(data.msg);
        }
      }
    })
  })
});
