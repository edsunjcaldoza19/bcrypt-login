<?php
	include '../includes/head.php';
	session_start();


	/* PDO DB connection configuration */

	$db_username = 'root';
	$db_password = '';

	$conn = new PDO( 'mysql:host=localhost;dbname=caldoza-login', $db_username, $db_password );

	if(!$conn){
		die("Fatal Error: Connection Failed!");
	}

	$username = $_POST['username'];
	$password = $_POST['password'];

	if(ISSET($_POST['login'])){
		$sql = $conn->prepare("SELECT * from `tbl_user` where `username` = '$username'");
		$sql->execute();

		if($fetch = $sql->fetch()){

			if(password_verify($password, $fetch['password'])){

				$_SESSION['name'] = $fetch['name'];
                $_SESSION['username'] = $fetch['username'];
                $_SESSION['password'] = $fetch['password'];
				echo '
					<script>
						$(document).ready(function(){
							Swal.fire({
								icon: "success",
								title: "Login Successful. Please Wait...",
								text: "Welcome User",
								timer: 3000,
							}).then(function(){

								window.location.replace("../secure.php");

							});

						});
					</script>
				';

			}else{

				echo '
					<script>
						$(document).ready(function(){
							Swal.fire({
								icon: "error",
								title: "Invalid User Credentials Please Login Again",
								timer: 2000
							}).then(function(){

								window.location.replace("../index.php");

							});

						});
					</script>
				';

			}

		}
		else{
			echo '
					<script>
						$(document).ready(function(){
							Swal.fire({
								icon: "error",
								title: "Invalid User Credentials Please Login Again",
								timer: 2000
							}).then(function(){

								window.location.replace("../index.php");

							});

						});
					</script>
				';
		}
	}
?>