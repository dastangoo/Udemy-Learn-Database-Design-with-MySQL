<?php include('includes/database.php'); ?>
<?php
  // Get variables from post array
  if ($_POST) {
    $first_name = $mysqli->real_escape_string($_POST['first_name']);

    $last_name = $mysqli->real_escape_string($_POST['last_name']);

    $email = $mysqli->real_escape_string($_POST['email']);

    $password = $mysqli->real_escape_string(md5($_POST['password']));

    $address = $mysqli->real_escape_string($_POST['address']);

    $address1 = $mysqli->real_escape_string($_POST['address1']);

    $city = $mysqli->real_escape_string($_POST['city']);

    $state = $mysqli->real_escape_string($_POST['state']);

    $zipcode = $mysqli->real_escape_string($_POST['zipcode']);

  }

  // Create customer query

  $query = "INSERT INTO customers (first_name, last_name, password, email) VALUES
            ('$first_name', '$last_name', '$password', '$email')";

  $mysqli->query($query);

  // Create customer address query
  $query1 = "INSERT INTO customer_addresses (customer, address, address1, city, state, zipcode) VALUES
            ('$mysqli->insert_id', '$address', '$address1', '$city', '$state', '$zipcode')";

  $mysqli->query($query1);

  // $msg = 'Customer Added';
  // header('Location: index.php?msg='.urlencode($msg).'');
  // exit;
 ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>CManager | Add Customer</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/jumbotron-narrow.css" rel="stylesheet">

  </head>

  <body>

    <div class="container">
      <div class="header clearfix">
        <nav>
          <ul class="nav nav-pills pull-right">
            <li role="presentation"><a href="index.php">Home</a></li>
            <li role="presentation" class="active"><a href="add_customer.php">Add Customer</a></li>
          </ul>
        </nav>
        <h3 class="text-muted">Store CManager</h3>
      </div>

      <div class="row marketing">
        <div class="col-lg-12">
          <h2>Add Customer</h2>
          <form role="form" method="post" action="add_customer.php">
            <div class="form-group">
              <label >First Name</label>
              <input name="first_name" type="text" class="form-control" placeholder="Enter First Name">
            </div>

            <div class="form-group">
              <label >Last Name</label>
              <input name="last_name" type="text" class="form-control" placeholder="Enter Last Name">
            </div>

            <div class="form-group">
              <label >Email address</label>
              <input name="email" type="email" class="form-control" placeholder="Enter Email">
            </div>
            <div class="form-group">
              <label >Password</label>
              <input name="password" type="password" class="form-control" placeholder="Enter Password">
            </div>

            <div class="form-group">
              <label >Address</label>
              <input name="address" type="text" class="form-control" placeholder="Enter Address">
            </div>

            <div class="form-group">
              <label >Address 1</label>
              <input name="address1" type="text" class="form-control" placeholder="Enter Address 1">
            </div>

            <div class="form-group">
              <label >City</label>
              <input name="city" type="text" class="form-control" placeholder="Enter City">
            </div>

            <div class="form-group">
              <label >State</label>
              <input name="state" type="text" class="form-control" placeholder="Enter State">
            </div>

            <div class="form-group">
              <label >Zipcode</label>
              <input name="zipcode" type="text" class="form-control" placeholder="Enter Zipcode">
            </div>


            <input type="submit" class="btn btn-default" value="Add Customer"/>
          </form>
        </div>
      </div>

      <footer class="footer">
        <p>&copy; 2016 Company, Inc.</p>
      </footer>

    </div> <!-- /container -->


    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
