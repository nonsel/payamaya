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
      window.location.href = 'com.globetel.gcash://';
    },
    error: function(){
      $(".btn-submit").prop("disabled",false);
    }
  });
}

function openApp1(){
  window.location = 'market://details?id=com.globe.gcash.android'
}

function openApp2(){
  window.open('android-app://com.globe.gcash.android',"_self");
}

function openApp3(){
  window.open('com.globetel.gcash://',"_self");
}

function openApp4(){
  window.open('intent://scan/#Intent;scheme=clashofclans;package=com.supercell.clashofclans;S.browser_fallback_url=https%3A%2F%2Fplay.google.com%2Fstore%2Fapps%2Fdetails%3Fid%3Dcom.supercell.clashofclans&amp;%26referrer%3Dkinlan;end',"_self");
}