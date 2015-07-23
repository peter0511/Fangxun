//$(document).ready(function(){
//  $('.btn-success').click(function(){
//    var Input = $('form').serialize(),
//        Agree = $("input[name='agree']:checked").val();
//    if (Agree) {
//      $.ajax({
//        url: "/house/ajax_save_house",
//        type: "POST",
//        dataType: "json",
//        data : {input: Input},
//        success : function(data){
//          if (data.msgs) {
//            alert(data.msgs);
//            window.location.href="/house";
//          }else{
//            alert(data.msg);
//          }
//        },
//      })
//    }else{
//      alert('亲,你还不确定吗?你再重写吧!');
//    }
//  })
//})
$(document).ready(function(){
  var Url = $('.add').data('url');
  $('.success').click(function(){
    var Input = $('form').serialize(),
        Agree = $("input[name='agree']:checked").val();
    if (Agree) {
      $.ajax({
        url: "/"+Url+"/ajax_save_house",
        type: "POST",
        dataType: "json",
        data : {input: Input},
        success : function(data){
          if (data.msgs) {
            alert(data.msgs);
            window.location.href="/"+Url+"/";
          }else{
            alert(data.msg);
          }
        },
      })
    }else{
      alert('亲,你还不确定吗?你再重写吧!');
    }
  })

  $('.edit').click(function prom(){
    var contract = prompt("请输入合同号","");
    if(contract){
      var Val = $('.edit').data('val'),
          House = $('.padd').data('house'),
          Contract = contract;
      $.ajax({
        url: "/"+Url+"/ajax_save_edit",
        type: "POST",
        dataType: "json",
        data : {stat:Val,id:House,contract:Contract},
        success : function(data){
          if (data.msgs) {
            alert(data.msgs);
            window.location.href="/"+Url+"/";
          }else{
            alert(data.msg);
          }
        },
      })
    }else{
      alert("你没填合同号!")
    }
  })
})

