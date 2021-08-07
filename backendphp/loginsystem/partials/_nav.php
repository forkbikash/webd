<?php
echo '<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto mb-2 mb-lg-0">';
if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true)
      echo '<li class="nav-item">
          <a class="nav-link active" aria-current="page" href="./welcome.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="./logout.php">logout</a>
        </li>';
else
      echo '<li class="nav-item">
          <a class="nav-link" href="./login.php">login</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="./signup.php">signup</a>
        </li>';
echo
      '</ul>
    </div>
  </div>
</nav>';
?>