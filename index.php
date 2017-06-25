<?php include('includes/database.php'); ?>
<?php
  // Create the select query
  $query = "SELECT
            customers.id,
            customers.first_name,
            customers.last_name,
            customers.email,
            customer_addresses.address,
            customer_addresses.address1,
            customer_addresses.city,
            customer_addresses.state,
            customer_addresses.zipcode
            FROM customers
            INNER JOIN customer_addresses
            ON customer_addresses.customer = customers.id
            ORDER BY join_date DESC";
  // Get results
  $result = $mysqli->query($query) or die($mysqli->error.__LINE__);
 ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>CManager | Dashboard</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/jumbotron-narrow.css" rel="stylesheet">

  </head>

  <body>

    <div class="container">
      <div class="header clearfix">
        <nav>
          <ul class="nav nav-pills pull-right">
            <li role="presentation" class="active"><a href="index.php">Home</a></li>
            <li role="presentation"><a href="add_customer.php">Add Customer</a></li>
          </ul>
        </nav>
        <h3 class="text-muted">Store CManager</h3>
      </div>

      <div class="row marketing">
        <div class="col-lg-12">
          <?php
            if (isset($_GET['msg'])) {
              echo '<div class="msg"'.$_GET['msg'].'</div>';
            }
           ?>
          <h2>Customers</h2>
          <table class="table table-striped">
            <tr>
              <th>Customer Name</th>
              <th>Email</th>
              <th>Address</th>
              <th></th>
              <th></th>
            </tr>
           <?php
            // Check if at least one row found
            if ($result->num_rows > 0) {
              // Loop through resutls
              while ($row = $result->fetch_assoc()) {
                // Display customer info
                $output = '<tr>';
                $output .= '<td>'.$row['first_name'].' '.$row['last_name'].'</td>';
                $output .= '<td>'.$row['email'].'</td>';
                $output .= '<td>'.$row['address'].' '. $row['city'].' '.$row['state'].'</td>';
                $output .= '<td><a href="edit_customer.php?id='.$row['id'].'" class="btn btn-info btn-sm">Edit</a></td>';
                $output .= '<td><a href="#" class="btn btn-danger btn-sm">Delete</a></td>';
                $output .= '</tr>';

                // Echo output
                echo $output;

              }
            }
            else {
              echo 'Sorry, no customers were found';
            }

            ?>
          </table>
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
