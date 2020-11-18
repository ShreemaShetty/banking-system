<?php

  require("connect.php");
  $select = "Select * FROM customers ORDER BY id ASC";   
  $result = mysqli_query($conn, $select);
  
  if(mysqli_num_rows($result) > 0) {
      
  }
  else echo "Error";

?>

<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta http-equiv="x-ua-compatible" content="ie=edge">

        <title>Details</title>

        <!-- Bootstrap CSS -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script> 
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

        <!-- Bootstrap core CSS -->
        <link href="bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="bootstrap-social.css"> 

        <!-- Custom styles for this template -->
        <link href="css/home.css" rel="stylesheet">
        <link href="css/view.css" rel="stylesheet">

        <style>
            .container {
            border: 2px solid #ccc;
            background-color: #fff;
            color:#000;
            border-radius: 5px;
            padding: 16px;
            margin: 16px 0;
            font-size: 20px;
            margin-right: 15px;
            text-align:left;
            }

            .container:hover{
                background-color: #ccc;
            }

            .container::after {
            content: "";
            clear: both;
            display: table;
            }

            @media (max-width: 500px) {
            .container {
                text-align: center;
            }
            }
        </style>
    </head>
    <body class="text-center">
        <div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
            <header class="masthead mb-auto">
                <div class="inner">
                    <h3 class="masthead-brand"><a href="index.html">Banking System</a></h3>
                    <nav class="nav nav-masthead justify-content-center">
                        <a class="nav-link " href="index.html">Home</a>
                        <a class="nav-link " href="details.php">View User</a>
                        <a class="nav-link" href="history.php">Transaction History</a>
                    </nav>
                </div>
            </header>
            <main>
            <h2 style="text-align:center">Transfer Credits</h2>
            <?php
                while($row = mysqli_fetch_assoc($result)){?>
                    <a href="transfer.php?id=<?php echo $row['id']; ?>">
                        <div class="container">
                        <p>Name: <?php echo $row["name"]; ?></p>
                        <p>Email id: <?php echo $row["email"]; ?></p>
                        <p>Account Balance<?php echo $row["current_balance"]; ?></p>
                        </div></a>
                <?php } ?>
            </main>
        
        <!--js files-->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    </body>
</html>

