<?php
	include '../includes/head.php';
	require_once 'db_pdo.php';

	if(ISSET($_POST['register'])){
		try{
			$name = $_POST['name'];
			$username = $_POST['username'];
			$password = password_hash($_POST['password'], PASSWORD_BCRYPT);

			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$sql = "INSERT INTO `tbl_user`(`name`, `username`, `password`)
			VALUES ('$name', '$username', '$password')";
			$conn->exec($sql);
		}catch(PDOException $e){
			echo $e->getMessage();
		}
		$conn = null;
		echo '
		<script>

			$(document).ready(function(){

				Swal.fire({
					icon: "success",
					title: "User Account Successfully Added. You may now login",
					timer: 3000
				}).then(function(){

					window.location.replace("../index.php");

				});

			});

		</script>
	';

	};

?>
