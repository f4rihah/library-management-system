<?php
	include "navbar.php";
	include "connection.php";

if (!isset($_GET['bid'])) {
        // Handle the error - no bid provided
        die("Error: No Book ID provided.");
    }

    $bid = $_GET['bid'];
?>
<!DOCTYPE html>
<html>
<head>
	<title>Update Book</title>
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

	<h2 style="text-align: center; color: #fff;"><b>Update Book Information</b></h2>
	<?php
		$sql = "SELECT * FROM books WHERE bid ='$bid'";
		$result = mysqli_query($db, $sql) or die(mysqli_error($db));

		while ($row = mysqli_fetch_assoc($result)) {
			$bid = $row['bid'];
			$name = $row['name'];
			$authors = $row['authors'];
			$edition = $row['edition'];
			$isbn = $row['isbn'];
			$quantity = $row['quantity'];
			$department = $row['department'];
		}
	?>

	<div class="form1">
		<form action="" method="post" enctype="multipart/form-data">

			<label><h4><b>Book ID</b></h4></label>
			<input class="form-control" type="text" name="bid" value="<?php echo $bid; ?>">

			<label><h4><b>Book Name</b></h4></label>
			<input class="form-control" type="text" name="name" value="<?php echo $name; ?>">

			<label><h4><b>Author</b></h4></label>
			<input class="form-control" type="text" name="authors" value="<?php echo $authors; ?>">

			<label><h4><b>Book Version</b></h4></label>
			<input class="form-control" type="text" name="edition" value="<?php echo $edition; ?>">

			<label><h4><b>ISBN Number</b></h4></label>
			<input class="form-control" type="text" name="isbn" value="<?php echo $isbn; ?>">

			<label><h4><b>Quantity</b></h4></label>
			<input class="form-control" type="text" name="quantity" value="<?php echo $quantity; ?>">

			<label><h4><b>Shelf</b></h4></label>
			<input class="form-control" type="text" name="department" value="<?php echo $department; ?>">

			<br>
			<div style="text-align: center;">
				<button class="btn btn-default" type="submit" name="submit">Save</button>
			</div><br><br>
		</form>
	</div>
	<?php
		if (isset($_POST['submit'])) {
			$bid = $_POST['bid'];
			$name = $_POST['name'];
			$authors = $_POST['authors'];
			$edition = $_POST['edition'];
			$isbn = $_POST['isbn'];
			$quantity = $_POST['quantity'];
			$department = $_POST['department'];

			$sql1 = "UPDATE books SET bid='$bid', name='$name', authors='$authors', edition='$edition', isbn='$isbn', quantity='$quantity', department='$department' WHERE bid='".$bid."';";

			if(mysqli_query($db,$sql1))
			{
				?>
					<script type="text/javascript">
						alert("Saved Successfully.");
						window.location="books.php";
					</script>
				<?php
			}
		}
	?>
</body>
</html>