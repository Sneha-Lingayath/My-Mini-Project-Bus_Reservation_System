<?php
session_start();
$conn = mysqli_connect("localhost","root","","project");
if(!$conn){
  echo 'Connection error: '. mysqli_connect_error();

}

?>
<!DOCTYPE html>
<html>
<head>
	<title></title>

</head>
<body>
	<h1>THANKYOU!!!!!!!!!!</h1>
	<div class="container text-right">
	<form action="logout.php">
		<button class="btn btn-success">logout</button>
	</form>
</div>
	
</body>
</html>