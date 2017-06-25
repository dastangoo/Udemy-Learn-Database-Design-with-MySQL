<?php include 'includes/database.php' ?>
<?php
  // Assign get variable
  $id = $_GET['id'];

  // Create customer select query
  $query = "SELECT * FROM customers
            INNER JOIN customer_addresses
            ON customer_addresses.customer = customers.id
            WHERE customers.id = $id";

  $result = $mysqli->query($query) or die($mysqli->error.__LINE__);
  if ($result = $mysqli->query($query)) {
    // Fetch object array
    while ($row = $result->fetch_assoc()) {
      $first_name = $row['first_name'];
      $last_name = $row['last_name'];
      $email = $row['email'];
      $password = $row['password'];
      $address = $row['address'];
      $address1 = $row['address1'];
      $city = $row['city'];
      $state = $row['state'];
      $zipcode = $row['zipcode'];
    }
    // Free result set
    $result->close();
  }
 ?>

 <?php
   if ($_POST) {

     // Assign GET variable
     $id = $_GET['id'];

     // Assign variables

     $first_name = $mysqli->real_escape_string($_POST['first_name']);

     $last_name = $mysqli->real_escape_string($_POST['last_name']);

     $email = $mysqli->real_escape_string($_POST['email']);

     $password = $mysqli->real_escape_string($_POST['password']);

     $address = $mysqli->real_escape_string($_POST['address']);

     $address1 = $mysqli->real_escape_string($_POST['address1']);

     $city = $mysqli->real_escape_string($_POST['city']);

     $state = $mysqli->real_escape_string($_POST['state']);

     $zipcode = $mysqli->real_escape_string($_POST['zipcode']);

     // Create customers update
     $query1 = "UPDATE customers
               SET
               first_name = '$first_name',
               last_name = '$last_name',
               password = '$password',
               email = '$email'
               WHERE id = $id
               ";
    $mysqli->query($query1) or die();

    // Create customer_addresses update
    $query2 = "UPDATE customer_addresses
              SET
              address = '$address',
              address1 = '$address1',
              city = '$city',
              state = '$state',
              zipcode = '$zipcode'
              WHERE customer = $id
              ";
    $mysqli->query($query2) or die();

    // $msg = "Customer Updated";
    // header('Location: index.php?msg='.urlencode($msg).'');
    // exit;
   }
  ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>CManager | Edit Customer</title>

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
          <h2>Edit Customer</h2>
          <form role="form" method="post" action="edit_customer.php?id=<?php echo $id ?>">
            <div class="form-group">
              <label >First Name</label>
              <input name="first_name" type="text" class="form-control" placeholder="Enter First Name"
                value="<?php echo $first_name; ?>">
            </div>

            <div class="form-group">
              <label >Last Name</label>
              <input name="last_name" type="text" class="form-control" placeholder="Enter Last Name"
                value="<?php echo $last_name; ?>"$>
            </div>

            <div class="form-group">
              <label >Email address</label>
              <input name="email" type="email" class="form-control" placeholder="Enter Email"
                value="<?php echo $email; ?>">
            </div>
            <div class="form-group">
              <label >Password</label>
              <input name="password" type="password" class="form-control" placeholder="Enter Password"
                value="<?php echo $password; ?>">
            </div>

            <div class="form-group">
              <label >Address</label>
              <input name="address" type="text" class="form-control" placeholder="Enter Address"
                value="<?php echo $address; ?>">
            </div>

            <div class="form-group">
              <label >Address 1</label>
              <input name="address1" type="text" class="form-control" placeholder="Enter Address 1"
                value="<?php echo $address1; ?>">
            </div>

            <div class="form-group">
              <label >City</label>
              <input name="city" type="text" class="form-control" placeholder="Enter City"
                value="<?php echo $city; ?>">
            </div>

            <div class="form-group">
              <label >State</label>
              <input name="state" type="text" class="form-control" placeholder="Enter State"
                value="<?php echo $state; ?>">
            </div>

            <div class="form-group">
              <label >Zipcode</label>
              <input name="zipcode" type="text" class="form-control" placeholder="Enter Zipcode"
                value="<?php echo $zipcode; ?>">
            </div>


            <input type="submit" class="btn btn-default" value="Update Customer"/>
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
