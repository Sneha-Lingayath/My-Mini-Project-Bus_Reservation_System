<?php
 session_start();
	
	
$conn = mysqli_connect("localhost","root","","project");
if(!$conn){
  echo 'Connection error: '. mysqli_connect_error();

}
	
if(isset($_GET['bill_no']))
{	$cid=$_SESSION["cust_id"];
	echo $cid;
	$b=$_GET['bill_no'];
    $q="DELETE FROM billing WHERE cust_id='$cid' and bill_no='$b';";
    mysqli_query($conn,$q);
  header("Location:bookdetails.php");
}


?>
