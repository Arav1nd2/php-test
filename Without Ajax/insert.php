<?php
$nameerr = "";
$name = "";
$phone = "";
$email = "";
include_once 'connect.php';
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
if (isset($_POST['submit'])) {
if (isset($_POST['name'])) {
	$name=$_POST['name'];
}
if(isset($_POST['phone']))
{	$phone=$_POST['phone'];
}
if(isset($_POST['email']))
{	$email=$_POST['email'];
}
$sqlcheck="SELECT * FROM test WHERE email='$email'";
$res=mysqli_query($conn,$sqlcheck);
if(mysqli_num_rows($res)>0)
{
	$nameerr="* Email Already exists";
	$name="";
}

$sql = "INSERT INTO test (name,phno,email) VALUES ('$name','$phone','$email')";

if(!empty($name))
{
if (mysqli_query($conn, $sql)) {
    $message="New record added Succesfully";
    echo "<script type='text/javascript'> alert('$message')</script>";
 }
 else
 	echo "error";
}
 }
 else
 {
 	header('insert2.php');	
 }
mysqli_close($conn);

?>
<html>
<style type="text/css">
	.error{
		color: #FF0000;
		font-size: 10px;
	}
</style>
<head>
	<title>Add Members</title>
	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
  	<link href="https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet"> 
	<style type="text/css">
		.lb{
	font-family: 'Pacifico', cursive;
	}
	</style>
</head>
<body>
	 <div class="container">
    <div class="row"><br> <br><br><br><br> </div>
    <div class="row justify-content-md-center">
      <div clas="col-md-auto" style="width:400px">
		<div class="card cc">
			<div class="card-body">
				<h1 class="lb">Add Members</h1>
				<br><br>
			<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
			Name : <input type="text" name="name"> <br><br>
			Phone : <input type="text" name="phone"> <br><br>
			Email : <input type="text" name="email"> <span class="error"> <?php echo $nameerr;?></span><br><br>
			<input type="submit" class="btn btn-info" name="submit"><br>
			</form>
			 <a href="index.html">Go back</a>
			</div>
		</div>
	  </div>
	 </div>

	</div>
</body>
</html>