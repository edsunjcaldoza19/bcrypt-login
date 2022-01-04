<?php
    session_start();
    if(!ISSET($_SESSION['username'])){
		header('location:index.php');
	}
?>
<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<div class="jumbotron text-center">
  <h1 class="display-3">Success!</h1>
  <p class="lead"><strong>This is a secure page</strong>. Page can only be accessed by loggin in using registered accounts.</p>
  <hr>
  <p>
   Welcome <?php echo $_SESSION['name']; ?>
  </p>
  <p class="lead">
    <a class="btn btn-primary btn-sm" href="be/logout.php" role="button">Logout and go to login page</a>
  </p>
</div>