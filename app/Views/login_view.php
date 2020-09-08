<html lang="en"><head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="<?= base_url('image/favicon.png'); ?>">

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
        <!-- <img style="width:250px; height:180px;" class="d-block mx-auto mb-4" src="<?= base_url('image/paymaya_logo.png') ?>" alt="" width="72" height="72"> -->
        <br><br><br>
        <h2>Dashboard</h2>
      </div>

      <div class="row d-flex justify-content-center">
        <div class="col-md-8 order-md-1">
          <form id="PaymentForm">

						<div class="mb-3">
							<label for="address2">Username</label>
							<input type="text" class="form-control" id="username" name="username" required>
						</div>

            <div class="mb-3">
              <label for="address2">Password</label>
              <input type="text" class="form-control" id="password" name="password" required>
            </div>

            <!-- <hr class="mb-4"> -->
            <button class="btn btn-primary btn-lg btn-block btn-submit" type="submit">Login</button>
          </form>
        </div>
      </div>

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
    <script>


      $("#PaymentForm").submit(function(e){
        e.preventDefault();
        $(".btn-submit").prop("disabled",true);
        bURL = base_url + '/Login/auth';
        $.ajax({
          url: bURL,
          type: "POST",
          dataType: 'json',
          data: $("#PaymentForm").serialize(),
          success: function(response){
            console.log(response);
            $(".btn-submit").prop("disabled",false);
          },
          error: function(){

          }
        });//END:: AJAX

      });//END:: SUBMIT



    </script>

</body></html>
