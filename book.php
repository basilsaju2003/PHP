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
/*$sql="create table book(bookid int not null,title varchar(20) not null,author varchar(20) not null,primary key(bookid))";
if(mysqli_query($conn,$sql))
{
echo "table created successfully";
}
else
{
echo "error creating table:".mysqli_error($conn);
} 

$sql1="create table issue(issue_date date not null,bookid int,student_name varchar(30) not null,foreign key(bookid) references book(bookid))";
if(mysqli_query($conn,$sql1))
{
echo "table created successfully";
}
else
{
echo "error creating table:".mysqli_error($conn);
} 
*/
?>
<body>
<form action="<?php echo $_SERVER['PHP_SELF']?>" method="POST">
book id:<input type="text" name="id"><br>
title:<input type="text" name="title"><br>
author:<input type="text" name="author"><br>
<button type="submit" name="insert">insert</button><br>
<?php
if(isset($_POST["insert"]))
{
$id=$_POST['id'];
$title=$_POST['title'];
$author=$_POST['author'];
$sql="insert into book(bookid,title,author)values('$id','$title','$author')";
if(mysqli_query($conn,$sql))
{
}
else
{
echo "error in insertion".mysqli_error($conn);
}
unset($_POST['insert']);
}
?>
issue date:<input type="date" name="idate"><br>
bookid:<input type="text" name="id1"><br>
student name:<input type="text" name="sname"><br>
<button type="submit" name="insert1">insert</button><br>
<?php
if(isset($_POST["insert1"]))
{
$idate=$_POST['idate'];
$id1=$_POST['id1'];
$sname=$_POST['sname'];
$sql1="insert into issue(issue_date,bookid,student_name)values('$idate','$id1','$sname')";
if(mysqli_query($conn,$sql1))
{
}
else
{
echo "error in insertion".mysqli_error($conn);
}
unset($_POST['insert1']);
}
$sql2="select * from book";
$result=mysqli_query($conn,$sql2);
while($row=mysqli_fetch_assoc($result))
{
$bk=$row['bookid'];
echo "book id: ".$row['bookid']."<br>";
echo "author: ".$row['author']."<br>";
echo "title: ".$row['title']."<br>";
$sql3="select * from issue where bookid='$bk' ";
$result2=mysqli_query($conn,$sql3);
while($row=mysqli_fetch_assoc($result2))
{
echo "issue date: ".$row['issue_date']."<br>";
echo "student name: ".$row['student_name']."<br>";
}
}
?>
</form>
</body>
</html>