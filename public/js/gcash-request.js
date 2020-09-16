function generateLink(valid){

  $(".btn-submit").prop("disabled",true);

  if(valid==false){ 
    $(".btn-submit").prop("disabled",false);
    return; 
  }

  bURL = base_url + '/Gcash/request_payment';


  $.ajax({
    url: bURL,
    type: "POST",
    dataType: 'json',
    data: $("#PaymentForm").serialize(),
    success: function(response){
      openApp()
    },
    error: function(){
      $(".btn-submit").prop("disabled",false);
    }
  });
}

function openApp(){
  window.open('intent://scan/#Intent;scheme=com.globe.gcash.android;package=com.globe.gcash.android;end',"_self");
}