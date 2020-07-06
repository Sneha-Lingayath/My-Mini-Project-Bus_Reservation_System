<?php 
session_start();
if($_SESSION["name"]==true){
	echo $_SESSION["name"];
}
else{
	header("Location:myfirstpage.php");
}


 ?>
<!DOCTYPE html>
<html>
<head>
	<title>next</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<style type="text/css">
		form{
			position: relative;
			top:30%;
		}
		button{
			margin-top:5%;
		}
		body{
			background-image: url("https://images.unsplash.com/photo-1545787669-6c5af0adb687?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=500&q=60");
			background-repeat: no-repeat;
			background-size: cover;
			background-position: center;
		}
		p{
			color:white;
			font-size: 22px;
		}
		label{
			color: white;
			font-size: 22px;
		}
		input{
			width:60px;
		}
	</style>

</head>
<body>
<div class="container">
	<div class="container text-right">
	<form action="logout.php">
		<button class="btn btn-success">logout</button>
	</form>
</div>
	<div class="row text-left">
		<div class="col-lg-8">
			<form method="POST">
			<p>Total number of seats :</p>
			<br/>
			<br/>
			<p>Total number of seats available :</p>
			<br>
			<br>
			<p>price per seat :</p>
			<br>
			<br>
			<label>enter number of seats required : </label>
			<input type="number" name="seat" value="1">
			<br>
			<button class="btn btn-primary">submit</button>
		    </form>
		</div>
		
	</div>
	
</div>
</body>
</html>