<html lang="en"><head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="robots" content="noindex" />
    <link rel="icon" href="<?= base_url('image/logo-lindenteak.png'); ?>">

    <title>Linden Teak Furniture | Payment Methods</title>

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

    <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 bg-white border-bottom shadow-sm">
      <div class="container">
        <a href="<?= base_url('/'); ?>">
          <h5 class="my-0 mr-md-auto font-weight-normal"><img src="<?= base_url('image/logo-lindenteak.png'); ?>" class="img-fluid" alt="Responsive image"></h5>
        </a>
        <nav class="my-2 my-md-0 mr-md-3">
        </nav>
      </div>
    </div>

    <style>
      .div-payment{
        background: white;
        height: 130px;
        border-radius: 10px;
        border: solid 1px;
        margin: 0px 21px 21px 21px;
      }
      .disabled{
        border: solid 1px #dadada;
        filter: grayscale(100%);
        cursor: not-allowed !important;
      }
      .menu{
        cursor: pointer;
      }
    </style>

    <div class="container-fluid pt-5 pb-5" style="background: #eee">
      <div class="container">
        <h5>SELECT PAYMENT METHOD</h5>
        <br>

        <div class="row">

          <div class="col-lg-3 div-payment d-flex align-items-center justify-content-center menu" onclick="selected_payment('<?= base_url('Paymaya'); ?>')">
            <div class="d-flex justify-content-center">
              <img src="<?= base_url('image/main-paymaya.jpg'); ?>" class="img-fluid" alt="Paymaya">
            </div>
          </div>

          <div class="col-lg-3 div-payment d-flex align-items-center justify-content-center menu" onclick="selected_payment('<?= base_url('Gcash'); ?>')">
            <div class="d-flex justify-content-center">
              <img src="<?= base_url('image/main-gcash.png'); ?>" class="img-fluid" alt="Gcash">
            </div>
          </div>

          <div class="col-lg-3 div-payment d-flex align-items-center justify-content-center menu disabled">
            <div class="d-flex justify-content-center">
              <img src="<?= base_url('image/main-creditcard.jpg'); ?>" class="img-fluid" alt="Union Bank">
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="container pt-4 pb-4">
      <div class="row">
        <div class="col-lg-6 text-center text-lg-left">
          <img src="<?= base_url('image/secure-payment.png'); ?>" class="img-fluid" alt="Responsive image">
          <ul class="list-unstyled text-small pl-2 mt-2" style="line-height: 2">
            <li><a class="text-muted" href="<?= base_url('privacy-policy') ?>">Privacy policy</a></li>
            <li><a class="text-muted" href="https://media.wix.com/ugd/f034d8_473be673e5b74671acf13de694b90e9e.pdf">Terms & Conditions</a></li>
          </ul>
        </div>
        <div class="col-lg-6 text-center text-lg-right">
          <hr class="d-lg-none">
          <span>Designed & built by <a href="http://thinkdigitalph.com/" target="_blank">Think Digital PH</a></span>
        </div>
      </div>
    </div>
    <!-- CONTAINER -->

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script> let base_url = "<?= base_url(); ?>"</script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://getbootstrap.com/docs/4.0/assets/js/vendor/popper.min.js"></script>
    <script src="https://getbootstrap.com/docs/4.0/dist/js/bootstrap.min.js"></script>
    <script src="https://getbootstrap.com/docs/4.0/assets/js/vendor/holder.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="<?= base_url('js/commons.js?v=').strtotime('now'); ?>"></script>


</body></html>
