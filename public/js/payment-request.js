function generateLink(valid){

  if(valid==false){ return; }

  $(".btn-submit").prop("disabled",true);
  bURL = base_url + '/Paymaya/request_payment';
  $.ajax({
    url: bURL,
    type: "POST",
    dataType: 'json',
    data: $("#PaymentForm").serialize(),
    success: function(response){
      window.location.href = response.redirectUrl;
      $(".btn-submit").prop("disabled",false);
    },
    error: function(){

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