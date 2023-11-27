<?php
	include "navbar.php";
	include "connection.php";

if (!isset($_GET['username'])) {
        // Handle the error - no bid provided
        die("Error: No Username provided.");
    }

    $username = $_GET['username'];
?>
<!DOCTYPE html>
<html>
<head>
	<title>Update User</title>
	<style type="text/css">
		.form-control {
			width: 350px;
			height: 38px;
		}
		.form1 {
			margin: 0 510px;
		}
		label {
			color: white;
		}
	</style>
</head>
<body style="background-color: #DEB887;">

	<h2 style="text-align: center; color: #fff;"><b>Update User Information</b></h2>
	<?php
		$sql = "SELECT * FROM student WHERE username ='$username'";
		$result = mysqli_query($db, $sql) or die(mysqli_error($db));

		while ($row = mysqli_fetch_assoc($result)) {
			$first = $row['first'];
			$last = $row['last'];
			$username = $row['username'];
			$password = $row['password'];
			$roll = $row['roll'];
			$email = $row['email'];
			$contact = $row['contact'];
			$pic = $row['pic'];
		}
	?>

	<div class="form1">
		<form action="" method="post" enctype="multipart/form-data">

			<label><h4>First Name</h4></label>
			<input class="form-control" type="text" name="first" value="<?php echo $first; ?>">

			<label><h4>Last Name</h4></label>
			<input class="form-control" type="text" name="last" value="<?php echo $last; ?>">

			<label><h4>Username</h4></label>
			<input class="form-control" type="text" name="username" value="<?php echo $username; ?>">

			<label><h4>Password</h4></label>
			<input class="form-control" type="text" name="password" value="<?php echo $password; ?>">

			<label><h4>Roll</h4></label>
			<input class="form-control" type="text" name="roll" value="<?php echo $roll; ?>">

			<label><h4>Email</h4></label>
			<input class="form-control" type="text" name="email" value="<?php echo $email; ?>">

			<label><h4>Picture</h4></label>
			<input class="form-control" type="file" name="pic">

			<br>
			<div style="text-align: center;">
				<button class="btn btn-default" type="submit" name="submit">Save</button>
			</div><br><br>
		</form>
	</div>


	<?php
		if (isset($_POST['submit'])) {
			$first = $_POST['first'];
			$last = $_POST['last'];
			$username = $_POST['username'];
			$password = $_POST['password'];
			$roll = $_POST['roll'];
			$email = $_POST['email'];
			$pic = $_POST['pic'];

			$sql1 = "UPDATE student SET username='$username', first='$first', password='$password', roll='$roll', email='$email', pic='$pic', WHERE username='".$username."';";

			if(mysqli_query($db,$sql1))
			{
				?>
					<script type="text/javascript">
						alert("Saved Successfully.");
						window.location="student.php";
					</script>
				<?php
			}
		}
	?>
</body>
</html>