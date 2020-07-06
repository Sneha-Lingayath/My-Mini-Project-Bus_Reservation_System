<?php 
session_start();
$conn = mysqli_connect("localhost","root","","project");
if(!$conn){
  echo 'Connection error: '. mysqli_connect_error();

}
$source=$_SESSION["source"];
	  $dest=$_SESSION["dest"];
	  $b=$_SESSION["bus_name"];

$cid=$_SESSION["cust_id"];
$phno=$_SESSION["cust_ph"];	
$dt=$_SESSION['date'];
       
  if(isset($_POST['submit']))
{

	header("Location:confirm.php");
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





	<h1>BILL</h1>
	<?php 
	echo 'Date : '.date("Y/m/d");
	echo "<br>";
	echo "<br>";
	echo "BUS-NAME:".$b;
	echo "<br>";
	echo "<br>";
	echo "FROM:".$source;
	echo "<br>";
	echo "<br>";
	echo "TO:".$dest;
	echo "<br>";
	echo "<br>";

	?>

	<div>
                	<table>
                		<tr>
                			<th>BILL NO</th>
                			<th>NAME</th>
                			<th>TOTAL SEAT</th>
                			<th>AMOUNT</th>
                			<th>DATE</th>
                			<th>BUS NO</th>
                			<th>TICKET NO</th>
                			<th>PHONE NUMBER</th>
                		</tr>
                		
                		<tr>
                			<?php
                			 $sql= "SELECT bill_no,cust_name,no_of_seat,bill_amt,bill_date,b_no,t_no,cust_ph
                			  FROM billing b,customer c WHERE   b.cust_id=c.cust_id and cust_ph='$phno' and bill_date='$dt';";
       $res=mysqli_query($conn,$sql);
                  				if (mysqli_num_rows($res)>0) {
       							while($row = $res->fetch_assoc()){
       								?>

       								<td><?php echo $row['bill_no'] ?></td>
       								<td><?php echo $row['cust_name'] ?></td>
       								<td><?php echo $row['no_of_seat'] ?></td>
       								<td><?php echo $row['bill_amt'] ?></td>
       								<td><?php echo $row['bill_date'] ?></td>
       								<td><?php echo $row['b_no'] ?></td>
       								<td><?php echo $row['t_no'] ?></td>
       								<td><?php echo $row['cust_ph'] ?></td>
       								</tr>
       				<?php
       						}
       						}
       							?>	</table></div>

       							<div class="container">
	<form  method="POST">
		<button class="btn btn-success" value="submit" name="submit">submit</button>
	</form>
	</div>


	
</body>
</html>