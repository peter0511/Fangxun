$(document).ready(function(){
  $('.town').change(function(){
    var Street = $(".street"),
        Town = $('.town').val(),
        Community = $('.community');
    $.getJSON("/address/select_address",{address:Town},function(json){ 
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
    $.getJSON("/address/select_address",{address:Street},function(json){ 
      $("option[class='true']",Community).remove(); //清空原有的选项 
      Community.removeAttr('disabled');
      $.each(json,function(index,array){ 
        var option = "<option value='"+array['id']+"' class='true'>"+array['name']+"</option>"; 
        Community.append(option); 
      }); 
    }); 
  })
})
