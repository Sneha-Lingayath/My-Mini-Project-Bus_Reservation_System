<?php
session_start();
$conn = mysqli_connect("localhost","root","","project");
if(!$conn){
  echo 'Connection error: '. mysqli_connect_error();

}
$cid=$_SESSION["cust_id"];
$bus_no=$_SESSION["bus_no"];
$tno=$_SESSION['t_no'];


  if(isset($_POST['submit']))
{
	$a=$_POST['rating'];
	echo $a;
	$q="CALL ins('$a','$cid','$bus_no','$tno');";
	if(mysqli_query($conn,$q)){
	header("Location:thankyou.php");
   			   		}
}

?><!DOCTYPE html>
<html>
<head>
	<title></title><link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
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
<form method="POST">
	<p>HOW WAS YOUR EXPERIENCE:</p>
  <input type="radio" name="rating" value="GOOD"> GOOD<br>
  <input type="radio" name="rating" value="AVERAGE"> AVERAGE<br>
  <input type="radio" name="rating" value="BAD"> BAD<br>  
  <button class="btn btn-success" name="submit" value="submit">submit</button>
</form>




</body>
</html>
