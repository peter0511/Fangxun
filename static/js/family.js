$(document).ready(function(){
  $('.town').change(function(){
    var Street = $(".street"),
        Town = $('.town').val(),
        Community = $('.community');
    $.getJSON("/family/select_address",{address:Town},function(json){ 
      $("option[class='true']",Street).remove(); //清空原有的选项 
      $("option[class='true']",Community).remove(); //清空原有的选项 
      Street.removeAttr('disabled');
      $.each(json,function(index,array){ 
        var option = "<option value='"+array['id']+"' class='true'>"+array['name']+"</option>"; 
        Street.append(option); 
      }); 
    }); 
  })

  $('.street').change(function(){
    var Community = $('.community'),
        Street = $(".street").val();
    $.getJSON("/family/select_address",{address:Street},function(json){ 
      $("option[class='true']",Community).remove(); //清空原有的选项 
      Community.removeAttr('disabled');
      $.each(json,function(index,array){ 
        var option = "<option value='"+array['id']+"' class='true'>"+array['name']+"</option>"; 
        Community.append(option); 
      }); 
    }); 
  })

  $('.btn-success').click(function(){
    var Input = $('form').serialize(),
        Agree = $("input[name='agree']:checked").val();
    if (Agree) {
      $.ajax({
        url: "/family/ajax_save_house",
        type: "POST",
        dataType: "json",
        data : {input: Input},
        success : function(data){
          if (data.msgs) {
            alert(data.msgs);
            window.location.href="/family";
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
