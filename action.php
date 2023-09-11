<?php
require ('conn.php');
$n1=$_POST['NAME'];
echo "NAME:  $n1<br>";
$n2=$_POST['EMAIL'];
echo "EMAIL:$n2<br>";
//$sql="INSERT INTO `test`(`name`, `email`) VALUES ('$n1','$n2')";
//echo $sql;
//echo "connection success";
//if(mysqli_query($conn,$sql))
//echo "insertion success";
//else
//echo "insertion failed";
$sql="UPDATE test SET name='$n1' WHERE email='$n2' ";
if(mysqli_query($conn,$sql))
echo "updation success";
else
echo "updation failed";
?>