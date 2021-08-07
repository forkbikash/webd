<?php
if($_SERVER['REQUEST_METHOD']=='POST'){
  require './partials/_dbconnect.php';
  $username=$_POST['username'];
  $password=$_POST['password'];
  $cpassword=$_POST['cpassword'];
  if($password==$cpassword){
    $passwordhash= password_hash($password, PASSWORD_DEFAULT);
    $sql= "select * from `users`;";
    $result= mysqli_query($conn, $sql);
    if($result){
      $sql="INSERT INTO `users` (`username`, `passwordhash`, `datetime`) VALUES ('$username', '$passwordhash' , current_timestamp());";
      $result= mysqli_query($conn, $sql);
      if($result){
        echo 'record inserted....you can login now man';
      }
      else{
        echo 'record insertion failed man';
      }
    }
    else{
      $sql="CREATE TABLE `users`.`users` ( `sl` INT(11) NOT NULL AUTO_INCREMENT , `username` VARCHAR(11) NOT NULL , `passwordhash` VARCHAR(255) NOT NULL , `datetime` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP , PRIMARY KEY (`sl`), UNIQUE (`username`));";
      $result= mysqli_query($conn, $sql);
      if($result){
        $sql="INSERT INTO `users` (`username`, `passwordhash`, `datetime`) VALUES ('$username', '$passwordhash', current_timestamp());";
        $result= mysqli_query($conn, $sql);
        if($result){
          echo 'record inserted....you can login now';
        }
        else{
        echo 'record insertion failed';
        }
      }
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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">

    <title>signup</title>
  </head>
  <body>
    <?php require './partials/_nav.php'; ?>

    <div class="container">
    <form action="./signup.php" method="post">
  <div class="mb-3">
    <label for="username" class="form-label">Username</label>
    <input type="text" maxlength="11" required class="form-control" id="username" name="username">
  </div>
  <div class="mb-3">
    <label for="password" class="form-label">Password</label>
    <input type="password" maxlength="11" required class="form-control" id="password" name="password">
  </div>
  <div class="mb-3">
    <label for="cpassword" class="form-label">Confirm password</label>
    <input type="password" maxlength="11" required class="form-control" id="cpassword" name="cpassword">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>

    <!-- Optional JavaScript -->
    <!-- Popper.js first, then Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
  </body>
</html>