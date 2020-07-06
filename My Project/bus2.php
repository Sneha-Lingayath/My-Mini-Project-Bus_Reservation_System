<?php 
session_start();
if($_SESSION["name"]==true){
 	echo $_SESSION["name"];
 }
 else{
 	header("Location:myfrontpage.php");
 }
$conn = mysqli_connect("localhost","root","","project");
if(!$conn){
  echo 'Connection error: '. mysqli_connect_error();

}
$source=$_SESSION["source"];
  $dest=$_SESSION["dest"];
  echo "connected";



if(isset($_POST['submit']))
{
  $b=$_POST['bname'];
 // echo $b;
  $_SESSION["bus_name"]=$b;
  echo $b;

$dt=$_SESSION['date'];

$qe="SELECT * FROM bus_info WHERE bus_src='$source' and bus_dstn='$dest'and bus_name='$b';";
    $re=mysqli_query($conn,$qe);
    if(mysqli_num_rows($re)>0)
       {  
        while($row =$re->fetch_assoc())
       {
          $bus_no=$row['bus_no'];
          $seatno=$row['no_of_seat'];
          $amt=$row['bus_amt'];
          $_SESSION["no_of_seat"]=$seatno;
          $_SESSION["bus_no"]=$bus_no;
          $_SESSION["bus_amt"]=$amt;
       }
       }
     // echo $dt;
     //echo $bus_no;
     //echo $seatno;
    $q2="SELECT * FROM booking WHERE bus_no='$bus_no' and `date`='$dt' ";
    $res=mysqli_query($conn,$q2);
    if(mysqli_num_rows($res)>0)
       {  
        while($row =$res->fetch_assoc())
       {
          $bseats=$row['booked_seats'];
           $_SESSION["booked_seats"]=$bseats;
       }
          
       
       //echo $bseats;
       if($bseats<$seatno)
       {
        header("Location:seat.php");
       }
     }
else
      {

        $q="INSERT INTO booking(book_id,bus_no,`date`,total_seats,booked_seats) values('null','$bus_no','$dt','$seatno',0);";
        if(mysqli_query($conn,$q))
        {
          header("Location:seat.php");
        }
      }
  }



?>
 <!DOCTYPE html>
<html>
<head>
	<title>details</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<style type="text/css">
	table{
		border: 2px solid black;
	}
	td{
		border: 2px solid black;
	}
	tr{
		border: 2px solid black;
	}
	#b1{
		
		border: 2px solid black;
		background-color: #6be6e8;
	
		margin-left: 28%;
		margin-top: 3%;
		margin-bottom: 1%;
		padding: 5%;
	}
	body{
		background-color: #505951;

	}
	
	</style>
</head>
<body>
<div class="container">
			<div class="row text-center">
				
				
<div id="b1" class="col-lg-6">


     <?php $sql= "SELECT * FROM bus_info WHERE bus_src='$source' and bus_dstn='$dest';";
       $result=mysqli_query($conn,$sql);


       if (mysqli_num_rows($result)>0) {
       	while($row = $result->fetch_assoc()){
       		   echo "<td>
       		   			<tr>NAME : ". $row['bus_name']."</tr>
       		   		    <br>
       		   		    <br>
       		   			<tr>TICKET-AMOUNT: ".$row['bus_amt']."</tr>
       		   			<br>
       		   			<br>
       		   			
       		   			</td>" ;

       	

                }
                }
                else {
                  echo "0 results";
                }
                ?>

			
                	
  					
  					
  		
    
    <form method="POST">
    	
    	<input type="text" name="bname" placeholder="enter the bus name">
    	<button class="btn btn-primary" name="submit" type="submit" value="submit">submit</button>
    </form>
    

    
 




			</div>
			
			
		</div>
		</div>
		
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>