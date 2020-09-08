function generateLink(valid){
  $(".btn-submit").prop("disabled",true);

  if(valid==false){ 
    $(".btn-submit").prop("disabled",false);
    return; 
  }

  bURL = base_url + '/Paymaya/request_payment';
  $.ajax({
    url: bURL,
    type: "POST",
    dataType: 'json',
    data: $("#PaymentForm").serialize(),
    success: function(response){
      window.location.href = response.redirectUrl;
    },
    error: function(){
      $(".btn-submit").prop("disabled",false);
    }
  });//END:: AJAX

}//END:: generateLink


function selected_payment(link){
  window.location.href = link;
}

$("#phone-number").keypress(function (e) {
  if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
    return false;
  }
});