<html lang="en"><head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="robots" content="noindex" />
    <link rel="icon" href="<?= base_url('image/logo-lindenteak.png'); ?>">
    <title>Linden Teak Furniture | Payment Methods</title>
    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/checkout/">
    <link href="https://getbootstrap.com/docs/4.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/4.0/examples/checkout/form-validation.css" rel="stylesheet">
  </head>

  <body class="bg-light">

    <div class="container pt-5">
      <div class="text-center">
        <img class="d-block mx-auto" src="<?= base_url('image/gcash-logo.png') ?>" alt="">

        <div class="mt-5 mb-5 text-center">
          <div style="color: #0075ff; border: solid 1px #0075ff; padding: 5px 10px; max-width: 600px; margin: auto; font-size: 18px">
            <i class="fas fa-check-circle"></i> CHECK THE RECIPIENT NAME BEFORE YOU TAP "CONFIRM"
          </div>
        </div>
        <div class="mb-5" style="font-size: 23px">
          <div>Recipient Name: <b>Allan Sy Anngala</b></div>
          <div>Gcash Number: <b>09178485200</b></div>
        </div>
      </div>

      <hr>
      <div class="row d-flex justify-content-center">
        <div class="col-md-7 order-md-1">
          <form id="PaymentForm" class="needs-validation" novalidate="">
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
              <label for="address2">Email Address</label>
              <input type="email" class="form-control" id="email-address" name="email-address" required>
              <div class="invalid-feedback">
                Email Address is required.
              </div>
            </div>

            <!-- <hr class="mb-4"> -->
            <button class="btn btn-primary btn-lg btn-block btn-submit" type="submit">Continue to Payment</button>
            <div class="text-center mt-4">
              <a href="<?= base_url('/') ?>">Select another payment method</a>
            </div>
          </form>
          
          <a href="intent://scan/#Intent;scheme=gcash;package=com.globe.gcash.android;S.browser_fallback_url=https://play.google.com/store/apps/details?id=com.globe.gcash.android&hl=en;end"> 
            <input type="button" value="Open App1"/>
          </a>
          <!-- <input type="button" value="Open App2" onclick="openApp2()" /> --> 
          <!-- <input type="button" value="Open App3" onclick="openApp3()" /> --> 
          <!-- <input type="button" value="Open App4" onclick="openApp4()" /> -->
        </div>
      </div>
      <br><br>
      <div class="row">
        <img class="d-block mx-auto mb-4" src="<?= base_url("image/footer-logo-gcash.png"); ?>">
      </div>
      <br>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script> let base_url = "<?= base_url(); ?>"</script>
    <script src="https://kit.fontawesome.com/63b8cb9027.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://getbootstrap.com/docs/4.0/assets/js/vendor/popper.min.js"></script>
    <script src="https://getbootstrap.com/docs/4.0/dist/js/bootstrap.min.js"></script>
    <script src="https://getbootstrap.com/docs/4.0/assets/js/vendor/holder.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="<?= base_url('js/commons.js?v=').strtotime('now'); ?>"></script>
    <script src="<?= base_url('js/gcash-request.js?v=').strtotime('now'); ?>"></script>
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
              event.preventDefault();
              event.stopPropagation();
              generateLink(form.checkValidity())
              form.classList.add('was-validated');
            }, false);
          });
        }, false);
      })();
    </script>



</body></html>
