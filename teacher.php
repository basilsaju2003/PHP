<?php
$dbhost='localhost';
$dbuser='root';
$dbpass='';
$db='abc';
$conn=mysqli_connect($dbhost,$dbuser,$dbpass,$db);
if($conn->connect_error)
{
die("error in connection:".$conn->connect_error);
}
$sql="create table teacher(tid int not null,name varchar(30) not null,department varchar(10) not null,dob date not null,mobno varchar(11) not null,primary key(tid))";
if(mysqli_query($conn,$sql))
{
}
else
{
 echo "error in connection:".mysqli_error($conn);
}

$sql="create table subject(sid int not null,tid int,subject varchar(20) not null,foreign key(tid) references teacher(tid),primary key(sid))";
if(mysqli_query($conn,$sql))
{
}
else
{
 echo "error in connection:".mysqli_error($conn);
}

?>
<html>
<head>
</head>
<body>
<form action="<?php echo $_SERVER['PHP_SELF']?>" method="POST">
teacher id:<input type="text" name="tid"><br>
name:<input type="text" name="name"><br>
department::<input type="text" name="dpt"><br>
date of birth::<input type="date" name="dob"><br>
mobile number:<input type="text" name="mob"><br>
<button type="submit" name="insert1">insert</button><br><br>
<?php
if(isset($_POST["insert1"]))
{
$tid=$_POST['tid'];
$name=$_POST['name'];
$dpt=$_POST['dpt'];
$dob=$_POST['dob'];
$mob=$_POST['mob'];
$sql="insert into teacher(tid,name,department,dob,mobno)values('$tid','$name','$dpt','$dob','$mob')";
if(mysqli_query($conn,$sql))
{
}
else
{
echo "error in insertion:".mysqli_error($conn);
}
unset($_POST['insert1']);
}
?>
subject id:<input type="text" name="sid"><br>
teacher id:<input type="text" name="tid1"><br>
subject:<input type="text" name="sub"><br>
<button type="submit" name="insert2">insert</button>
<?php
if(isset($_POST["insert2"]))
{
$sid=$_POST['sid'];
$tid1=$_POST['tid1'];
$sub=$_POST['sub'];
$sql2="insert into subject(sid,tid,subject)values('$sid','$tid1','$sub')";
if(mysqli_query($conn,$sql2))
{
}
else
{
echo "error in insertion:".mysqli_error($conn);
}
unset($_POST['insert2']);
}
?>
<br>
<br>
name:<input type="text" name="name2"><br>
tid:<input type="text" name="tid2"><br>
<button type="submit" name="search">search</button><br><br>
<?php
if(isset($_POST['search']))
{
$name2=$_POST['name2'];
$tid2=$_POST['tid2'];
$sql3="select * from teacher where name='$name2' and tid='$tid2' ";
$sql4="select *from subject where tid='$tid2' ";

$result=mysqli_query($conn,$sql3);
$result2=mysqli_query($conn,$sql4);
if(mysqli_query($conn,$sql3))
{
while($row=mysqli_fetch_assoc($result))
{
echo "department: ".$row['department']."<br>";
echo "date of birth: ".$row['dob']."<br>";
echo "mobile number: ".$row['mobno']."<br>";
}
while($row=mysqli_fetch_assoc($result2))
{
echo "subject id: ".$row['sid']."<br>";
echo "subject: ".$row['subject']."<br>";
}
}

unset($_POST['search']);
}
?>
</form>
</body>
</html>