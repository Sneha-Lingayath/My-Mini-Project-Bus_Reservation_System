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
  $q1="SELECT * FROM bus_info WHERE bus_src='$source' and bus_dstn='$dest'";
        $result=mysqli_query($conn,$q1);
        if(mysqli_num_rows($result)>0)
       {
         
        while($row =$result->fetch_assoc())
       {
          $seatno=$row['no_of_seat'];
          $bus_no=$row['bus_no'];
       }
       $_SESSION["no_of_seat"]=$seatno;
         //$_SESSION["bus_no"]=$bus_no;


    }

    if(isset($_POST['confirm']))
  { 
    $dt=$_SESSION['date'];
    $q2="SELECT * FROM booking WHERE bus_no='$bus_no' and `date`='$dt' ";
    $res=mysqli_query($conn,$q2);
    if(mysqli_num_rows($res)>0)
       {  
        while($row =$res->fetch_assoc())
       {
          $bseats=$row['booked_seats'];
          
       }
       if($bseats<=$seatno)
       {
        header("Location:seat.php");
       }

        }
      else
      {

        $q="INSERT INTO booking(book_id,bus_no,`date`,total_seats,booked_seat) values(null,'$bus_no','$dt','$seatno',0)";
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
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<!-- <style>
        .button {
          background-color: #874FFF;
          border: none;
          color: white;
          padding: 30px 120px;
          text-align: center;
          text-decoration: none;
          display: inline-block;
          font-size: 16px;
          margin: 8px 8px;
          cursor: pointer;
          height:20px;
          width:100px;

        }
        </style>-->
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Document</title>
    </head>
    <body align="center">
    	<div class="container">
    		<div class="row text-right">
    			<div class="col-lg-4">
    				<form action="logout.php">
    					<button class="btn btn-success">logout</button>
    				</form>
    			</div>
    			
    		</div>
    		
    	</div>
    <h3>CHOOSE YOUR BUS </h3>

<div class="container-fluid">
  <table>
    <th></th>
    <th></th>
  <?php
   if (mysqli_num_rows($result)>0) {
        while($row = $result->fetch_assoc()){
             echo "<tr>
                  <td>NAME : ". $row['bus_name']."</td>
                    <br>
                    <br>
                  <td>VEHICLE-NAME : ".$row['bus_amt']."</td>
                  <br>
                  <br>
                  </tr>" ;

        

                }
                }
                else {
                  echo "0 results";
                }

    ?>
  </table>

    <!--<form method="POST">
      <button class="btn btn-primary" value="confirm" name="confirm">confirm</button>
    </form>-->

</div>
</body>
</html>