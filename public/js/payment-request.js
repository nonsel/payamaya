$("form").submit(function(e){

  e.preventDefault();
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

});//END:: FORM SUBMIT
