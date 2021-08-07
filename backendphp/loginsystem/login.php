<?php
if($_SERVER['REQUEST_METHOD']=='POST'){
  require './partials/_dbconnect.php';
  $username=$_POST['username'];
  $password=$_POST['password'];
  $sql="select * from `users` where `username`='$username';";
  $result= mysqli_query($conn, $sql);
  if($result){
  $num= mysqli_num_rows($result);
  if($num==1){
    while ($row=mysqli_fetch_assoc($result)) {
      if(password_verify($password, $row['passwordhash'])){
        session_start();
        $_SESSION['loggedin']= true;
        $_SESSION['username']= $username;
        header("location: ./welcome.php");
      }
      else{
        echo 'failed to log in man1';
      }
    }
  }
  else{
    echo 'failed to log in man2';
  }
  }
  else{
    echo 'failed to log in';
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

    <title>login</title>
  </head>
  <body>
    <?php require './partials/_nav.php'; ?>

<div class="container">
    <form action="./login.php" method="post">
  <div class="mb-3">
    <label for="username" class="form-label">Username</label>
    <input type="text" maxlength="11" required class="form-control" id="username" name="username">
  </div>
  <div class="mb-3">
    <label for="password" class="form-label">Password</label>
    <input type="password" maxlength="11" required class="form-control" id="password" name="password">
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