$('.btn-submit').click(function(){
  var username  = $(".username").val(),
      password  = $(".password").val();
  $.ajax({
    type:'post',
    url:'Login/verify',
    dataType:'json',
    data:{name:username,word:password}
  }).done(function(data) {
    if (data.ret) {
      alert(data.msg);
      return;
    }
    return parent.remove();
  });

})
