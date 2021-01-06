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
        <img class="d-block mx-auto mb-5" src="<?= base_url('image/gcash-logo.png') ?>" alt="">

        <div class="mb-5" style="font-size: 23px">
          <img class="d-block mx-auto" src="<?= base_url('image/gcash-qr-code.png') ?>" style="max-height: 600px;">
        </div>
      </div>

      <hr>
      <div class="row d-flex justify-content-center">
        <div class="col-md-7 order-md-1">
          <div class="mt-2 text-center text-info">
            <a href="<?= base_url('gcash/how-to-pay') ?>">
              <i class="fas fa-info-circle"></i> How to pay using gcash QR code
            </a>
          </div>
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
