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

  <body class="bg-light">

    <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
      <h5 class="my-0 mr-md-auto font-weight-normal"><img src="<?= base_url('image/logo-lindenteak.png'); ?>" class="img-fluid" alt="Responsive image"></h5>
      <nav class="my-2 my-md-0 mr-md-3">
        <!-- <a class="p-2 text-dark" href="#">Features</a>
        <a class="p-2 text-dark" href="#">Enterprise</a>
        <a class="p-2 text-dark" href="#">Support</a>
        <a class="p-2 text-dark" href="#">Pricing</a> -->
      </nav>
      <a class="btn btn-outline-primary" href="<?= base_url('Login/logout'); ?>">Logout</a>
    </div>

    <div class="container-fluid">
      <br><br>
      <div class="row">
        <div class="col-lg-6">
          <h3>Checkout List</h3>
        </div>
        <div class="col-lg-6">
          <button onclick="getCheckouts()" style="float:right;"class="btn btn-secondary btn-refresh">Refresh</button>
        </div>
      </div>

      <br>
      <table class="tbl-checkout table-striped">
        <thead>
          <tr>
            <th scope="col">Order Number</th>
            <th scope="col">First Name</th>
            <th scope="col">Last Name</th>
            <th scope="col">Amount</th>
            <th scope="col">Phone Number</th>
            <th scope="col">Email</th>
            <th scope="col">Payment Status</th>
            <th scope="col">Payment Channel</th>
            <th scope="col">Date</th>
          </tr>
        </thead>
        <tbody>

        </tbody>
      </table>

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

    <link href="http://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet">
    <script src="http://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>

    <script> let base_url = "<?= base_url(); ?>"</script>
    <script>

    var getCheckouts,dt;

    $(document).ready( function () {

      getCheckouts = function (){

        $('.btn-refresh').text("Refreshing...");

        bURL = base_url + '/Dashboard/getCheckouts';
        $.ajax({
          url: bURL,
          type: "POST",
          dataType: 'json',
          data: $("#PaymentForm").serialize(),
          success: function(response){

            if(response.error==0){
              let table = "";
              let a = response.data;

              for(x in a){
                table += "<tr>";
                table += "<td>"+a[x].order_id+"</td>";
                table += "<td>"+a[x].first_name+"</td>";
                table += "<td>"+a[x].last_name+"</td>";
                table += "<td class='text-right'>" + formatCurrency(a[x].amount).replace('PHP', '') + "</td>";
                table += "<td>"+a[x].phone_number+"</td>";
                table += "<td>"+a[x].email_address+"</td>";
                table += "<td>"+a[x].paymentStatus+"</td>";
                table += "<td>"+a[x].payment_channel+"</td>";
                table += "<td>"+a[x].date_created+"</td>";
                table += "</tr>";
              }//END:: FOR
              $(".tbl-checkout tbody").html(table);
              if(dt){
                dt.destroy();
              }
              dt = $('.tbl-checkout').DataTable({"order": []});
              $('.btn-refresh').text("Refresh");
            }//END:: IF

          },
          error: function(){

          }
        });//END:: AJAX

      }//END:: getCheckouts

      getCheckouts()

      function formatCurrency(amount){
        var format = new Intl.NumberFormat('en-US', { 
          style: 'currency', 
          currency: 'PHP', 
          minimumFractionDigits: 2, 
        }); 

        return format.format(amount);
      }
    });

    </script>

</body></html>
