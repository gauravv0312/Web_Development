<?php
$showAlert=false;
$showError=false;
if($_SERVER['REQUEST_METHOD']=="POST")
{
    
    include "partials/db_conn.php";
    $username=$_POST["username"];
    $password=$_POST["password"];
    $cpassword=$_POST["cpassword"];

    // check whether this username exits
    $existSql= "SELECT * FROM `contacts` WHERE username = '$username'";
    $result = mysqli_query($conn,$existSql);
    $numExistRows =mysqli_num_rows($result);
    if($numExistRows >0)
    {
      // echo "username is already exist";
      echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
  <strong>Error!</strong> Username is already exist.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
    }
    else
    {
      $exist= false;

       if($password == $cpassword)
      {
        $sql ="INSERT INTO `contacts` ( `username`, `password`, `date`) VALUES ('$username', '$password', current_timestamp())";
        $result =mysqli_query($conn,$sql); 
         if($result)
         {
          $showAlert=true;
        }
      }  
         else{
            $showError=true ;
             }
       }
}
?>
<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
    integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

  <title>Signup Page</title>
</head>

<body>
  <?php
    
    include"partials/navbar.php";
    ?>
  <?php
    if($showAlert)
    {
  echo  '<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Success!</strong> Your account has been created and now you can login here  .
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';}
if($showError)
    {
  echo  '<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Error!</strong> "Your password does not match plz re-enter your password .
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';}
?>
  <div class="container">
    <h1 class="text-center">Welcome To Our Signup Page</h1>

    <!-- Form -->
    <form action="/php/signup.php" method="post">
      <div class="form-group">
        <label for="exampleInputEmail1">Username</label>
        <input type="text" class="form-control" id="Username" name="username" aria-describedby="emailHelp">
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Password</label>
        <input type="password" class="form-control" id="password" name="password">
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Confirm Password</label>
        <input type="password" class="form-control" id="cpassword" name="cpassword">
        <small id="emailHelp" class="form-text text-muted">Plz enter same password as you enter above.</small>
      </div>

      <button type="submit" class="btn btn-primary">Signup</button>
    </form>
  </div>

  <!-- Optional JavaScript; choose one of the two! -->

  <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx"
    crossorigin="anonymous"></script>

  <!-- Option 2: jQuery, Popper.js, and Bootstrap JS
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    -->
</body>

</html>