<html>
<head>
</head>
<?php
$dbhost='localhost';
$dbuser='root';
$dbpass='';
$db='xyz';
$conn=mysqli_connect($dbhost,$dbuser,$dbpass,$db);
if($conn->connect_error)
{
die("connection failed".mysqli->connect_error);
}
/*$sql="create table employee(empid int not null auto_increment,empname varchar(30) not null,empaddress varchar(30) not null,empsalary int not null,primary key(empid))";
if(mysqli_query($conn,$sql))
{
echo "table created successfully";
}
else
{
echo "error creating table:".mysqli_error($conn);
} */
?>
<body>
<form action="<?php echo $_SERVER['PHP_SELF']?>" method="POST">
name:<input type="text" name="name"><br>
address:<input type="text" name="address"><br>
salary:<input type="text" name="salary"><br>
<button type="submit" name="insert">insert</button><br>
<?php
if(isset($_POST["insert"]))
{
$name=$_POST['name'];
$address=$_POST['address'];
$salary=$_POST['salary'];
$sql="insert into employee(empname,empaddress,empsalary)values('$name','$address','$salary')";
if(mysqli_query($conn,$sql))
{
}
else
{
echo "error in insertion".mysqli_error($conn);
}
unset($_POST['insert']);
header("Location:employee.php");
}
?>
<br>
salary:<input type="text" name="sal"><br>
<button type="submit" name="delete">delete</button><br>
<?php
if(isset($_POST["delete"]))
{
$salary=$_POST['sal'];
$sql1="delete from employee where empsalary>'$salary' ";
if(mysqli_query($conn,$sql1))
{}
else
{
echo "error in deletion".mysqli_error($conn);
}
unset($_POST['delete']);
header("Location:employee.php");
}
?>
<br>
id:<input type="text" name="id"><br>
salary:<input type="text" name="sal2"><br>
<button type="submit" name="update">update</button><br>
<?php
if(isset($_POST["update"]))
{
$salary=$_POST['sal2'];
$id=$_POST['id'];
$sql2="update employee set empsalary='$salary' where empid='$id' ";
if(mysqli_query($conn,$sql2))
{}
else
{
echo "error in upation".mysqli_error($conn);
}
unset($_POST['update']);
header("Location:employee.php");
}
?>
<br>
<?php
$sql3="select * from employee";
$result=mysqli_query($conn,$sql3);
if(mysqli_num_rows($result)>0)
{
while($row=mysqli_fetch_assoc($result))
{
echo "emp id:".$row['empid']."<br>";
echo "emp name:".$row['empname']."<br>";
echo "emp address:".$row['empaddress']."<br>";
echo "emp salary:".$row['empsalary']."<br>";
}
}
else
{
echo "0 result";
}
?>
</form>
</body>
</html>