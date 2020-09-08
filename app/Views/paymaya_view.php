<html lang="en"><head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="<?= base_url('image/logo-lindenteak.png'); ?>">

    <title>Paymaya</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/checkout/">

    <!-- Bootstrap core CSS -->
    <link href="https://getbootstrap.com/docs/4.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="https://getbootstrap.com/docs/4.0/examples/checkout/form-validation.css" rel="stylesheet">
    <style>
      label{
        font-weight: 500;
      }
    </style>
  </head>

  <body class="bg-light">

    <div class="container">
      <div class="py-5 text-center">
        <img style="width:250px; height:180px;" class="d-block mx-auto" src="<?= base_url('image/paymaya_logo.png') ?>" alt="" width="72" height="72">
        <!-- <h2>Checkout form</h2>	 -->
      </div>

      <div class="row d-flex justify-content-center">
        <div class="col-md-8 order-md-1">
          <form id="PaymentForm" class="needs-validation" novalidate="">

						<div class="mb-3">
							<label for="address2">Order No.</label>
							<input type="text" class="form-control" id="order-id" name="order-id" required>
							<div class="invalid-feedback">
								Order ID is required.
							</div>
						</div>

            <div class="mb-3">
              <label for="address2">Amount</label>
              <input type="number" class="form-control" id="amount" step="0.01" name="amount" max="100000" required>
              <div class="invalid-feedback">
                <span class="error-amount"></span>
              </div>
            </div>

            <div class="row">
              <div class="col-md-6 mb-3">
                <label for="firstName">First name</label>
                <input type="text" class="form-control" id="fname" placeholder="" name="firstname" required>
                <div class="invalid-feedback">
                  Valid first name is required.
                </div>
              </div>

              <div class="col-md-6 mb-3">
                <label for="lastName">Last name</label>
                <input type="text" class="form-control" id="lname" placeholder="" name="lastname" required="">
                <div class="invalid-feedback">
                  Valid last name is required.
                </div>
              </div>
            </div>

            <div class="mb-3">
              <label for="address2">Phone Number</label>
              <input type="text" class="form-control" id="phone-number" name="phone-number" required>
              <div class="invalid-feedback">
                Phone Number is required.
              </div>
            </div>

            <div class="mb-3">
              <label for="address2">Email Address</label>
              <input type="text" class="form-control" id="email-address" name="email-address" required>
              <div class="invalid-feedback">
                Email Address is required.
              </div>
            </div>

            <!-- <hr class="mb-4"> -->
            <button class="btn btn-primary btn-lg btn-block btn-submit" type="submit">Continue to Payment</button>
          </form>
        </div>
      </div>
      <br><br>
      <div class="row">
        <img class="d-block mx-auto mb-4" src="<?= base_url("image/logo_bottom.png"); ?>">
      </div>
      <br>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="https://getbootstrap.com/docs/4.0/assets/js/vendor/popper.min.js"></script>
    <script src="https://getbootstrap.com/docs/4.0/dist/js/bootstrap.min.js"></script>
    <script src="https://getbootstrap.com/docs/4.0/assets/js/vendor/holder.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script> let base_url = "<?= base_url(); ?>"</script>
    <script src="<?= base_url('js/payment-request.js?v=').strtotime('now'); ?>"></script>
    <script>
      valid = false;
      // Example starter JavaScript for disabling form submissions if there are invalid fields
      (function() {
        'use strict';

        window.addEventListener('load', function() {
          // Fetch all the forms we want to apply custom Bootstrap validation styles to
          var forms = document.getElementsByClassName('needs-validation');

          // Loop over them and prevent submission
          var validation = Array.prototype.filter.call(forms, function(form) {
            form.addEventListener('submit', function(event) {
              var amount = document.getElementById("amount");
              if(amount.validationMessage=="Value must be less than or equal to 100000."){
                $(".error-amount").text("Maximum of 100,000");
              }else{
                $(".error-amount").text("Amount is required");
              }

              // if (form.checkValidity() === false) {
                event.preventDefault();
                event.stopPropagation();
                generateLink(form.checkValidity());
              // }
              form.classList.add('was-validated');
            }, false);
          });
        }, false);
      })();
    </script>



</body></html>
