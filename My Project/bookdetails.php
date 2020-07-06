 <?php
 session_start();
	
	
$conn = mysqli_connect("localhost","root","","project");
if(!$conn){
  echo 'Connection error: '. mysqli_connect_error();

}

$cid=$_SESSION["cust_id"];

?>
<!DOCTYPE html>
<html>
<head>
	<title></title>	
</head>
<body>
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
                			 <th>Delete</th>
                		</tr>
                		
                		<tr>
                			<?php
                			 $sql= "SELECT c.cust_id,bill_no,cust_name,no_of_seat,bill_amt,bill_date,b_no,t_no,cust_ph
                			  FROM billing b,customer c WHERE   b.cust_id=c.cust_id and c.cust_id='$cid';";
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
       								<td>"."<a href="delete.php?bill_no=<?php echo $row['bill_no'] ?>">delete</a>."</td>
       								</tr>
       				<?php
       						}
       						}
       							?>	</table></div>
</body>
</html>