<?php
$showerror=false;
$err=false;

if($_SERVER["REQUEST_METHOD"]=="POST"){
  


include 'lgot/dbconnect.php';
$username=$_POST["username"];
$password=$_POST["password"];
$cpassword=$_POST["cpassword"];
//$exists=false;
$existsql="SELECT *FROM `users` WHERE username ='$username'";
$result=mysqli_query($conn,$existsql);
$numexistrows=mysqli_num_rows($result);
if($numexistrows>0){
  //$exist=true;
  $showerror="username already exists";
}
else{

if(($password == $cpassword)){
  $hash=password_hash($password,PASSWORD_DEFAULT);
  $sql="INSERT INTO `users` (`username`, `password`, `dt`) VALUES ('$username', '$hash', current_timestamp())";
  $result=mysqli_query($conn,$sql);
  if($result){
    $err=true;
  }}
  
else{
  $showerror="password do not match";

}

}
}


?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <title>signup</title>
  </head>
  <body>
    
    <?php require 'lgot/nav.php'?>
    <?php
    if($err){
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Success!</strong> Account created
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
    }
    if($showerror){
      echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Error!</strong>'.$showerror.'
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
      }
?>
    <div class="container">
    <h1 class='text-center'>signup </h1>
    <form action="/loginlogout/signup.php" method="post">
  <div class="mb-3">
    <label for="username" class="form-label">username</label>
    <input type="text" maxlength="11" class="form-control" id="username" name="username" >
    
  </div>
  <div class="mb-3">
    <label for="password" class="form-label">Password</label>
    <input type="password" class="form-control" id="password" class="password" name="password">
  </div>
  <div class="mb-3">
    <label for="cpassword" class="form-label">Confirm Password</label>
    <input type="password" class="form-control" id="cpassword" class="cpassword" name="cpassword">
  </div>
 
 
  <button type="submit" class="btn btn-primary">signup</button>
</form>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
    -->
  </body>
</html>
</body>
</html>