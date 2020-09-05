$("form").submit(function(e){
  console.log($("#PaymentForm").serialize())
  e.preventDefault();
  var base_url = 'http://localhost:8080/'
  $.ajax({
    url: base_url + 'Paymaya/request_payment',
    type: "POST",
    // dataType: 'json',
    data: $("#PaymentForm").serialize(),
    success: function(response){
         console.log(response)
    },
    error: function(){

    }
  });
});