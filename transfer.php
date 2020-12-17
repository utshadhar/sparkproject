<?php
session_start();
$server="localhost";
$username="root";
$password="";
$con=mysqli_connect($server,$username,$password,"bank");
if(!$con){
    die("Connection failed");
} 


$flag=false;

if (isset($_POST['transfer']))
{
$sender=$_SESSION['sender'];
$receiver=$_POST["reciever"];
$amount=$_POST["amount"];?>



<?php

$sql = "SELECT current_balance FROM customers WHERE name='$sender'";
$result = $con->query($sql);

if ($result->num_rows > 0) {
  
  while($row = $result->fetch_assoc()) {
 if($amount>$row["current_balance"] or $row["current_balance"]-$amount<100){
    echo "<script>swal( 'Error','Insufficient Balance!','error' ).then(function() { window. location = 'viewcustomers.php'; });;</script>";
   
 }
else{
    $sql = "UPDATE `customers` SET current_balance=(current_balance-$amount) WHERE Name='$sender'";
    

if ($con->query($sql) === TRUE) {
  $flag=true;
} else {
  echo "Error updating record: " . $conn->error;
}
 }
 
  }
} else {
  echo "0 results";
} 

if($flag==true){
$sql = "UPDATE `customers` SET current_balance=(current_balance+$amount) WHERE name='$receiver'";

if ($con->query($sql) === TRUE) {
  $flag=true;  
  
} else {
  echo "Error updating record: " . $con->error;
}
}
if($flag==true){
$sql = "INSERT INTO `transfer` (`transfer_id`, `sender`, `receiver`, `amount`) VALUES (NULL, '$sender','$receiver','$amount')";
if ($con->query($sql) === TRUE) {
} else 
{
  echo "Error updating record: " . $con->error;
}
}
}
if($flag==true){
    header("location:transferrecords.php");
}
elseif($flag==false)
{
     header("location:transfermoney.php");
}
?>