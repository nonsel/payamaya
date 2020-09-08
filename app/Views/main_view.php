<html lang="en"><head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="<?= base_url('image/logo-lindenteak.png'); ?>">

    <title>LINDENTEAK</title>

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

  <body class="">

    <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
      <h5 class="my-0 mr-md-auto font-weight-normal"><img src="<?= base_url('image/logo-lindenteak.png'); ?>" class="img-fluid" alt="Responsive image"></h5>
      <nav class="my-2 my-md-0 mr-md-3">
        <!-- <a class="p-2 text-dark" href="#">Features</a>
        <a class="p-2 text-dark" href="#">Enterprise</a>
        <a class="p-2 text-dark" href="#">Support</a>
        <a class="p-2 text-dark" href="#">Pricing</a> -->
      </nav>
      <!-- <a class="btn btn-outline-primary" href="<?= base_url('Login/logout'); ?>">Logout</a> -->
    </div>

    <style>
      .div-payment{
        background: white;
        height: 130px;
        border-radius: 10px;
        border: solid 1px;
        margin: 0px 21px 21px 21px;
      }
    </style>

    <div class="container">
      <br><br>
      <h5>SELECT PAYMENT METHOD</h5>
      <br>

      <div class="row">

        <div class="col-lg-3 div-payment">
          <a href="<?= base_url('Paymaya'); ?>">
            <div style="margin-top:30px;" class="d-flex justify-content-center">
              <img src="<?= base_url('image/main-paymaya.png'); ?>" class="img-fluid" alt="Responsive image">
            </div>
          </a>
        </div>

        <div class="col-lg-3 div-payment">
          <a href="#">
            <div style="margin-top:30px;" class="d-flex justify-content-center">
              <img src="<?= base_url('image/main-gcash.png'); ?>" class="img-fluid" alt="Responsive image">
            </div>
          </a>
        </div>

        <div class="col-lg-3 div-payment">
          <a href="#">
            <div style="margin-top:25px;" class="d-flex justify-content-center">
              <img src="<?= base_url('image/main-union-bank.png'); ?>" class="img-fluid" alt="Responsive image">
            </div>
          </a>
        </div>

      </div>

      <hr>

      <div class="row">

        <div class="col-lg-6">
          <img src="<?= base_url('image/secure-payment.png'); ?>" class="img-fluid" alt="Responsive image">
        </div>

      </div>

    </div>
    <!-- CONTAINER -->

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


</body></html>
