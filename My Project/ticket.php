 <?php
 session_start();
$conn = mysqli_connect("localhost","root","","project");
if(!$conn){
  echo 'Connection error: '. mysqli_connect_error();
}

echo "connected";
 if(isset($_POST['submit']))

{
  
     $source=$_POST['source'];
    $dest=$_POST['dest'];
    $dt=$_POST['dt'];
    
    $cid=$_SESSION["cust_id"];
      $sql="INSERT INTO ticket (t_no,t_src,t_dest,t_date,cust_id) values ('null','$source','$dest','$dt','$cid');";
       if(mysqli_query($conn,$sql)){
       	$q1="SELECT * FROM bus_info WHERE '$source'=bus_src and '$dest'=bus_dstn";
        $result=mysqli_query($conn,$q1);
         if(mysqli_num_rows($result)>0)
       {
       	$_SESSION['source']=$source;
       	$_SESSION['dest']=$dest;
       	$_SESSION['date']=$dt;
       	header("Location:bus2.php");
       }
       }
       
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Register</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<style type="text/css">
		.f1{
			border: 2px solid black;
			padding: 10%;
			position: relative;

		}
		body{
			background-image: url("https://wallpapercave.com/wp/wp3779033.jpg");
			background-repeat: no-repeat;
			background-size: cover;
			background-position: center;
		}
		h1{
			color: white;
		}
	</style>
</head>
<body>
	<div class="container">
		<div class="row text-center">
			<div class="col-md-4">
				<div>
						<form method="POST" class="f1">
					
						<h1>TICKET</h1>
					<input type="text" name="source" placeholder="enter your source" >
					<p>     </p>
			
					<input type="text" name="dest" placeholder="enter your destination" >
				    <p>         </p>
					<input type="date" name="dt" placeholder="enter the date" >
					<p>          </p>
					<br/>
					<br/>
					<button class="btn btn-success" type="submit" value="submit" name="submit">Submit</button>
					
					
				</form>
			</div>
</div>
<div class="col-md-8 text-right">

				<form action="bookdetails.php">  
		<button class="btn btn-success" type="submit1" value="submit1" name="submit1">bookings</button>
		</form>	
				</div>

			
			
			
		</div>
		
		
	</div>


</body>
</html>