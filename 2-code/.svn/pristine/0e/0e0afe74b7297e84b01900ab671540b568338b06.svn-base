// set options for #address1 which is for province when page loaded
  var token = $("input[name='_token']").val();
$(function(){
  $.post("/getProvince",{_token:token},function(data){
    var data =$.parseJSON(data);
    $.each(data,function(n,value){
      // alert(value["id"]);
      // alert(value["province"]);
      $("#address1").append("<option value="+value["id"]+">"+value["province"]+"</option>");
    });

  });

// when #address1 change, set options for #address2 which is for province
  $("#address1").bind("change",function(){
    var province =   $("#address1").val();

    $.post("/getCity",{_token:token,province:province},function(data){
      var data =$.parseJSON(data);
      $("#address2").empty();
      $("#address3").empty();
      $.each(data,function(n,value){
        //clear the select options then add the new info
        $("#address2").append("<option value="+value["id"]+">"+value["city"]+"</option>");
      });
    });
  });


// when #address2 change, set options for #address3 which is for province
  $("#address2").bind("change",function(){
    var city =   $("#address2").val();

    $.post("/getArea",{_token:token,city:city},function(data){
      // alert(data);
          $("#address3").empty();
      var data =$.parseJSON(data);
      $.each(data,function(n,value){
        //clear the select options then add the new info
        $("#address3").append("<option value="+value["id"]+">"+value["area"]+"</option>");
      });
    });
  });

});






// set #address2 change, set options for #address3 which is for province
// $("#address2").bind("p","change",function(){
//
// }
