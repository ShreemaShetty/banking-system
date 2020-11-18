<?php

  require("connect.php");
  $select = "Select * FROM customers ORDER BY id ASC";   
  $result = mysqli_query($conn, $select);
  
  if (mysqli_num_rows($result) > 0) {
      
  }
  else 
    echo "Error";

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v4.1.1">
    <title>Details</title>
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <!-- Bootstrap core CSS -->
    <link href="bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/home.css" rel="stylesheet">
    <link href="css/view.css" rel="stylesheet">

  </head>
  <body class="text-center">
    <div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
      <header class="masthead mb-auto">
          <div class="inner">
          <h3 class="masthead-brand"><a href="index.html">Banking System</a></h3>
          <nav class="nav nav-masthead justify-content-center">
              <a class="nav-link " href="index.html">Home</a>
              <a class="nav-link active" href="details.php">View User</a>
              <a class="nav-link" href="history.php">Transaction History</a>
          </nav>
          </div>
      </header>
  
      <h1>Customer Details</h1>

      <table class="table table-hover table-bordered table-dark">
        <thead>
            <tr>
            <th scope="col">ID</th>
            <th scope="col">Name</th>
            <th scope="col">Email id</th>
            <th scope="col">Account Balance</th>
            <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
          <tr>
            <?php
              while($row = mysqli_fetch_assoc($result)){?>
              <tr>
                  <td><?php echo $row["id"]; ?></td>
                  <td><?php echo $row["name"]; ?></td>
                  <td><?php echo $row["email"]; ?></td>
                  <td><?php echo $row["current_balance"]; ?></td>
                  <td><a href="view.php?id=<?php echo $row['id']; ?>">View</a></td>
              <tr>
            <?php } ?>
          </tr>
      </tbody>
    </table>
    
    <!--js files-->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
  </body>
</html>