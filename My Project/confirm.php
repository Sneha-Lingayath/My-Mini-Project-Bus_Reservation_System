<?php
session_start();
$conn = mysqli_connect("localhost","root","","project");
if(!$conn){
  echo 'Connection error: '. mysqli_connect_error();

}
  if(isset($_POST['submit']))
{

	header("Location:rating.php");
}

?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/css?family=Kaushan+Script|Source+Serif+Pro&display=swap" rel="stylesheet">
	<style type="text/css">
		tr{
			
			text-align: left;
		}
		td{
			text-align: center;

		}
		tr{
			text-align: center;
		}
		table{
			text-align: left;

		}
	</style>

</head>
<body>
	<div class="container text-right">
	<form action="logout.php">
		<button class="btn btn-success">logout</button>
	</form>
</div>
	<h1>BOOKING SUCESSEFUL</h1>
					<div class="container">
	<form  method="POST">
		<button class="btn btn-success" value="submit" name="submit" type="submit">ADD RATING</button>
	</form>
	</div>
</body>
</html>