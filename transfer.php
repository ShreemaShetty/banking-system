
<?php
  require("connect.php");
  $sender_id=$_GET['id'];

  $sql = "SELECT * FROM customers WHERE id=$sender_id";
  $result = mysqli_query($conn, $sql);
  if($result){
    while($row = mysqli_fetch_assoc($result)){
      $sender_id=$row['id'];
      $sender=$row['name'];
    }
  
    $receiver_id=(isset($_POST['receiver']) ? $_POST['receiver'] : null );
    $amount=(isset($_POST['amount']) ? $_POST['amount'] : null );


    $stmt = "SELECT * FROM customers WHERE id=$receiver_id";
    $result1 = mysqli_query($conn,$stmt);
    
    if($result1){
      while($row = mysqli_fetch_assoc($result1)){
        $receiver = $row['name'];
      }
    }

    if (isset($_POST['submit'])){
      if(!empty($sender_id && $sender && $receiver_id && $amount )){

        $stmt = "SELECT * FROM customers WHERE id=$sender_id";
        $result = mysqli_query($conn,$stmt);

        while($row = mysqli_fetch_assoc($result)){
          $balance=$row['current_balance'];
          if( $balance < $amount ){
            ?>
              <script>
              alert("Insufficient balance");
              </script>
            <?php
          }
          else{
            
            $sql = "INSERT into transfers (sender_id,sender_name,receiver_id,receiver_name,transfer_amount) VALUES('$sender_id','$sender','$receiver_id','$receiver','$amount')";
            $stmt= mysqli_query($conn, $sql);

            $sql = "UPDATE customers SET current_balance = current_balance - $amount WHERE id='$sender_id'";
            $stmt= mysqli_query($conn, $sql);

            $sql = "UPDATE customers SET current_balance = current_balance + $amount WHERE id='$receiver_id'";
            $stmt= mysqli_query($conn, $sql);

            ?>
            <script>
              alert("Payment Successful");
            </script>

            <?php 
            
          }
        }
      }
    }
  }
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

    <!-- <link rel="canonical" href="https://getbootstrap.com/docs/4.5/examples/cover/">-->
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
            <a class="nav-link " href="details.php">View User</a>
            <a class="nav-link" href="history.php">Transaction History</a>
          </nav>
        </div>
      </header>
      <main>
        <!-- TRANSACTION START-->
        
        <form method="POST" action="">
          <div class="card">
            <div class="form-group row">
              <label for="name" name="<?php echo $sender_id ?>" class="col-md-2 col-form-label">Sender</label>
              <div class="col-md-10 formInput" id="uname">
                <p><?php echo $sender ?></p>
              </div>
            </div>
            <div class="form-group row">
              <label for="name" class="col-md-2 col-form-label">Receiver</label>
              <div class="col-md-10" >
                <select name="receiver" class="form-control">
                <option selected>Choose Receiver</option>
                  <?php 
                    $stmt = "SELECT * FROM customers WHERE id!=$sender_id ";
                    $result = mysqli_query($conn,$stmt);
                    while($row = mysqli_fetch_assoc($result)){
                      ?>
                      <option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>
                      <?php 
                      }
                  ?>
                </select>
              </div>
            </div>
            <div class="form-group row">
              <label for="amount" class="col-md-2 col-form-label">Transfer Amount</label>
              <div class="col-md-10 ">
                <input type="number" class="form-control" id="amount" name="amount" placeholder="" >
              </div>
            </div>   
            <div class="form-group row">
              <button type="submit" id="submit" name="submit" class="btn btn-primary btn-sm ml-auto">Transfer</button>  
              <button type="button" class="btn btn-primary btn-sm ml-auto" ><a href="view.php?id=<?php echo $sender_id?>">Cancel</a></button>     
            </div>
          </div>
        </form>
      </main>
    
    <!--js files-->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script> 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    <script>
      $(document).ready(function(){
      document.getElementById("submit").onclick = function () {
          if() {
              alert('error please fill all fields!');
              }      

          };   
      });
    </script>    
  </body>
</html>
