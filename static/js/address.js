$(document).ready(function(){
  $('.town').change(function(){
    var Town = $('.town').val(),
        Street = $(".street"), 
        Community = $(".community");
    if (Town) {
      $.getJSON("/address/select_address",{address:Town},function(json){ 
        $("option[class='true']",Street).remove(); //清空原有的选项 
        Street.siblings().removeAttr('name').attr('type','hidden');
        Street.removeAttr('style').removeAttr('disabled');
        Community.attr('disabled','disabled');
        $.each(json,function(index,array){ 
          var option = "<option value='"+array['id']+"' class='true'>"+array['name']+"</option>"; 
          Street.append(option); 
        }); 
      }); 
    } else {
      Street.attr('disabled','disabled');
      Community.attr('disabled','disabled');
    }
  })

  $('.street').change(function(){
    var Street = $(".street"),
        Community = $(".community");
    if (!Street.val()) {
      Street.attr('style','display:none').removeAttr('name');
      Street.siblings().attr('name','street').attr('type','text');
      Community.attr('disabled','disabled');
      Street.siblings().focus(function(){
        Community.removeAttr('disabled');
      })
    } else {
      Community.removeAttr('disabled');
    }
  })






    
  $('.btn-success').click(function(){
    var Input = $('form').serialize();
    $.ajax({
      url: "/address/ajax_save_address",
      type: "POST",
      dataType: "json",
      data : {input: Input},
      success : function(data){
        if (data.msgs) {
          alert(data.msgs);
          window.location.href="/house/add";
        }else{
          alert(data.msg);
        }
      },
    })
  })
});
