<?php
	include_once 'connect.php';
	$sql = "";
	$err = "";
	if(isset($_POST['submit']))
	{
		$name = "";
		if(isset($_POST['name']))
			$name = $_POST['name'];
		$sql = "SELECT * FROM test WHERE name = '$name'";
	}	
	else
		$sql= "SELECT * FROM test";

	$i =1;
	
	$result = mysqli_query($conn,$sql); 
	$num = mysqli_num_rows($result);
	if ($num == 0) {
		$err = "* Name/Table does not exists";
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Display</title>
	 <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

	<style type="text/css">
		
	</style>
</head>
<body >
	<br><br>
	<div align="center">
	<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
	<input type="text" name="name" placeholder="Enter your name"> 
	<input type="submit" class="btn btn-info" name="submit">
	</form>
	</div>
	<br>
	<?php echo $err; ?>
	</form>
	<br> <br> 
	<br>
	<div class="container">
	<table class="table table-striped">
		<tr class="table-light">
			<?php
			
			if($num>0)
			{
				echo "	<th>S.No</th>
						<th>Name</th>
						<th>Email</th>
						<th>Phone No.</th> ";
			}
					while($row = mysqli_fetch_row($result)){
					$f1=$row[0];
					$f2=$row[1];
					$f3=$row[2];
			?>
		</tr>
		<tr class="table-light">
			<td><?php echo $i; ?></td>
			<td><?php echo $f1; ?></td>
			<td><?php echo $f3; ?></td>
			<td><?php echo $f2; ?></td>
		</tr>
		<?php
			$i++;
			}
		?>
	</table>
	<div align="center">
	<a href="index.html" ">Go back</a>
	</div>
</div>
</body>
</html>