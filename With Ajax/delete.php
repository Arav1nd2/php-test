<?php 
	include_once 'connect.php';
	$email = "";
	$err = "";
	if(isset($_POST['submit']))
	{
		if(isset($_POST['email']))
		{
			$email = $_POST['email'];
		}
		$sql1 = "SELECT * FROM test WHERE email = '$email'";
		$res1 = mysqli_query($conn,$sql1);
		$num = mysqli_num_rows($res1);
		if($num == 0)
		{
			$err = "NO Record Found";
			echo "<script> window.alert('$err') </script>";	

		}
		
		$sql = "DELETE FROM test WHERE email = '$email'";
	 	$res = mysqli_query($conn,$sql);
	 	if($res)
	 	{
	 		echo "<script> window.alert('Record Deleted') </script>";
	 	}
	 	else
	 	{
	 		echo "<script> window.alert('$err') </script>";	
	 	}
	 

	}




 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<title>Delete</title>
 	<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 </head>
 <body>
 	<br><br><br><br><br><br><br><br>
 	<div class="container" align="center" >
 	<h1>Delete rows!!</h1>
 	<br><br>
 	<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
 		<input type="text" name="email">
 		<input type="submit" class="btn btn-info" name="submit">
 	</form>
 	<a href="index.html">Go back</a>
 </div>
 </body>
 </html>