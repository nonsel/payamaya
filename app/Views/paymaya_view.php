<html lang="en"><head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="https://getbootstrap.com/docs/4.0/assets/img/favicons/favicon.ico">

    <title>Checkout example for Bootstrap</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/checkout/">

    <!-- Bootstrap core CSS -->
    <link href="https://getbootstrap.com/docs/4.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="https://getbootstrap.com/docs/4.0/examples/checkout/form-validation.css" rel="stylesheet">
  </head>

  <body class="bg-light">

    <div class="container">
      <div class="py-5 text-center">
        <img style="width:280px; height:100px;" class="d-block mx-auto mb-4" src="https://www.manilatimes.net/wp-content/uploads/2018/10/PayMaya-Logo20181007.jpg" alt="" width="72" height="72">
        <!-- <h2>Checkout form</h2>	 -->
      </div>

      <div class="row d-flex justify-content-center">
        <div class="col-md-8 order-md-1">
          <form class="needs-validation" novalidate="">

						<div class="mb-3">
							<label for="address2">Order ID</label>
							<input type="text" class="form-control" id="order-id" required>
							<div class="invalid-feedback">
								Order ID is required.
							</div>
						</div>

            <div class="row">
              <div class="col-md-6 mb-3">
                <label for="firstName">First name</label>
                <input type="text" class="form-control" id="fname" placeholder="" value="" required>
                <div class="invalid-feedback">
                  Valid first name is required.
                </div>
              </div>

              <div class="col-md-6 mb-3">
                <label for="lastName">Last name</label>
                <input type="text" class="form-control" id="lname" placeholder="" value="" required="">
                <div class="invalid-feedback">
                  Valid last name is required.
                </div>
              </div>
            </div>

						<div class="mb-3">
							<label for="address2">Amount</label>
							<input type="number" class="form-control" id="amount" step="0.01" required>
							<div class="invalid-feedback">
								Amount is required.
							</div>
						</div>

            <!-- <hr class="mb-4"> -->
            <button class="btn btn-primary btn-lg btn-block" type="submit">Continue to Payment</button>
          </form>
        </div>
      </div>

      <!-- <footer class="my-5 pt-5 text-muted text-center text-small">
        <p class="mb-1">© 2020 Company Name</p>
        <ul class="list-inline">
          <li class="list-inline-item"><a href="#">Privacy</a></li>
          <li class="list-inline-item"><a href="#">Terms</a></li>
          <li class="list-inline-item"><a href="#">Support</a></li>
        </ul>
      </footer> -->
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="https://getbootstrap.com/docs/4.0/assets/js/vendor/popper.min.js"></script>
    <script src="https://getbootstrap.com/docs/4.0/dist/js/bootstrap.min.js"></script>
    <script src="https://getbootstrap.com/docs/4.0/assets/js/vendor/holder.min.js"></script>
    <script>
      // Example starter JavaScript for disabling form submissions if there are invalid fields
      (function() {
        'use strict';

        window.addEventListener('load', function() {
          // Fetch all the forms we want to apply custom Bootstrap validation styles to
          var forms = document.getElementsByClassName('needs-validation');

          // Loop over them and prevent submission
          var validation = Array.prototype.filter.call(forms, function(form) {
            form.addEventListener('submit', function(event) {
              if (form.checkValidity() === false) {
                event.preventDefault();
                event.stopPropagation();
              }
              form.classList.add('was-validated');
            }, false);
          });
        }, false);
      })();
    </script>
		<script>
			$("form").submit(function(e){
				e.preventDefault();

				// $.ajax({
				// 	url: base_url+"/Stripe/payment_intent_error",
				// 	type: "POST",
				// 	data: {
				// 					result:result.error,
				// 				},
				// 	// dataType: 'json',
				// 	success: function(response){
				//
				// 	},
				// 	error: function(){
				//
				// 	}
				// });//END:: AJAX

			});
		</script>


</body></html>
