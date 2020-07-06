<?php 
session_start();
if($_SESSION["name"]==true){
	echo $_SESSION["name"];
}
else{
	header("Location:myfirstpage.php");
}
$conn = mysqli_connect("localhost","root","","project");
if(!$conn){
  echo 'Connection error: '. mysqli_connect_error();

}
$b=$_SESSION["bus_name"];	
$cid=$_SESSION["cust_id"];
	$source=$_SESSION["source"];
  $dest=$_SESSION["dest"];
	$seatno=$_SESSION["no_of_seat"];
	//$bseats=$_SESSION["booked_seats"];
	$bus_no=$_SESSION["bus_no"];
	$amt=$_SESSION["bus_amt"];
	$dt=$_SESSION['date'];
   		 $q6="SELECT t_no FROM ticket WHERE t_src='$source' and t_dest='$dest' and t_date='$dt' ";
    $f=mysqli_query($conn,$q6);
    if(mysqli_num_rows($f)>0)
       {  
        while($row =$f->fetch_assoc())
       {
          $tno=$row['t_no'];
                    
       } 
   	}

   	$_SESSION['t_no']=$tno;



	if(isset($_POST['submit']))
{
	$i=$_POST['seat'];
	echo $i;
	  $q2="SELECT * FROM booking WHERE bus_no='$bus_no' and `date`='$dt' ";
    $res=mysqli_query($conn,$q2);
    if(mysqli_num_rows($res)>0)
       {  
        while($row =$res->fetch_assoc())
       {
          $bseats=$row['booked_seats'];
           //$_SESSION["booked_seats"]=$bseats;
       }
   }
	$bseats=$bseats+$i;
	if($bseats<=$seatno)
	{
		$q="UPDATE booking SET booked_seats='$bseats' where bus_no='$bus_no' and `date`='$dt';";
		if(mysqli_query($conn,$q))
       { 
    
   		$tamt=$amt*$i;
   		$q7="INSERT INTO billing(bill_no,no_of_seat,bill_amt,bill_date,t_no,b_no,cust_id) values('null','$i','$tamt','$dt','$tno','$bus_no','$cid');";
   		if(mysqli_query($conn,$q7)){
   			header("Location:final.php");
   		}
       	

       }

	}


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
			<p>Total number of seats :<?php echo $seatno ?></p>
			<br/>
			<br/>
			<p>Total number of seats available :<?php $q2="SELECT * FROM booking WHERE bus_no='$bus_no' and `date`='$dt' ";
    $res=mysqli_query($conn,$q2);
    if(mysqli_num_rows($res)>0)
       {  
        while($row =$res->fetch_assoc())
       {
          $b=$row['booked_seats'];
       }
   } echo $seatno-$b; ?></p>
			<br>
			<br>
			<!--<p>price per seat :</p>
			<br>
			<br>-->
			<label>enter number of seats required : </label>
			<input type="number" name="seat" value="1" min="0" max="<?php echo $seatno ?>">
			<br>
			<button class="btn btn-primary" type="submit" name="submit" value="submit">submit</button>
		    </form>
		</div>
		
	</div>
	
</div>
</body>
</html>