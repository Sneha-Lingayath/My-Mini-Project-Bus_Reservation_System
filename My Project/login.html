 <?php
 session_start();
	
	
$conn = mysqli_connect("localhost","root","","project");
if(!$conn){
  echo 'Connection error: '. mysqli_connect_error();

}

echo "connected";
 if(isset($_POST['submit']))

{
  
    $name = $_POST['name'];
      $password = $_POST['password'];

      $sql= "SELECT  * from customer where cust_name='$name' and password='$password'";
       $result=mysqli_query($conn,$sql);
       if(mysqli_num_rows($result)==1)
       {
       	$_SESSION["name"]=$name; 
       	while($row =$result->fetch_assoc())
       {
       		$cid=$row['cust_id'];
       		$phno=$row['cust_ph'];
       }

       $_SESSION["cust_id"]=$cid;	
       $_SESSION["cust_ph"]=$phno;	
       	header("Location:ticket.php");
      	
       }
   }
   

?>

<!DOCTYPE html>
<html>
<head>
	<title>login</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<style type="text/css">
		form{
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
		h2{
			color: white;
		}
	</style>
</head>
<body>
	<div class="container">
		<div class="row text-center">
			<div class="col-md-4">
				<div>
						<form method="POST">
							<h2>LOGIN HERE</h2>
				
					<input type="text" name="name" placeholder="enter your name" required>
					<p>                     <p>
					<input type="password" name="password" placeholder="enter your password" required>
					<br/>
					<br/>
					<button class="btn btn-success" type="submit" value="submit" name="submit">login</button>
					
					
				</form>
				</div>
			
			</div>
			
		</div>
		
	</div>
			
</body>
</html>