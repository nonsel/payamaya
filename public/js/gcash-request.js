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
      window.location.href = 'intent://stackoverflow.com/questions/29250152/what-is-the-intent-to-launch-any-website-link-in-google-chrome#Intent;scheme=http;action=android.intent.action.VIEW;end;';
    },
    error: function(){
      $(".btn-submit").prop("disabled",false);
    }
  });
}