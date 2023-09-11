<?php
$dbhost="localhost";
$dbuser="root";
$dbpass="";
$db="abc";
$conn=mysqli_connect($dbhost,$dbuser,$dbpass,$db);
if($conn->connect_error)
{
  die("connection failed".$conn->connect_error);
}

if(isset($_POST["insert"]))
{
    $rollno=$_POST["rollno"];
    $name=$_POST["name"];
    $marks=$_POST["marks"];
    $grade=$_POST["grade"];

    $sql="INSERT INTO `student`( `srollno`,`sname`, `smarks`, `sgrade`) VALUES ('$rollno','$name','$marks','$grade')";
    if(mysqli_query($conn,$sql)){}
    else{
        echo "ERROR".mysqli_error($conn);
        }
        unset($_POST["insert"]);
        header("location:lab44.php");
}

if(isset($_POST["delete"])){
  
   
    $sql="DELETE FROM `student` WHERE smarks<40";
    if(mysqli_query($conn,$sql)){}
    else{
        echo "ERROR".mysqli_error($conn);
        }
        unset($_POST["delete"]);
        header("location:lab44.php");
}

if(isset($_POST["update"])){
  
    $sql="UPDATE `student` SET `sgrade`='F' WHERE `smarks`<70";
    if(mysqli_query($conn,$sql)){}
    else{
        echo "ERROR".mysqli_error($conn);
        }
        unset($_POST["update"]);
        header("location:lab44.php");
}


?>
<html>
    <body>
        <h1>form</h1>
       
       <?php
       // Assuming you have already established a database connection named $conn
       
       $sql = "CREATE TABLE student (
           srollno INT  PRIMARY KEY,
           sname VARCHAR(30) NOT NULL,
           smarks VARCHAR(30) NOT NULL,
           sgrade VARCHAR(20) NOT NULL
       )";
       
       if (mysqli_query($conn, $sql)) {
           echo "Table created successfully";
       } else {
           echo "Error in table creation: " . mysqli_error($conn);
       }
       
      
   ?>
   
        
        <form action="<?php echo $_SERVER["PHP_SELF"] ?>" method="post"><br>
    
            Student Roll number:<input type="number" name="rollno" ><br>
            Student Name:<input type="text" name="name" ><br>
            Student marks:<input type="number" name="marks" ><br>
            Student Grade:<input type="text" name="grade" ><br>

            <button type="submit" name="insert"> insert</button><br><br>
           
            <button type="submit" name="delete"> Delete</button><br><br>
           
            <button type="submit" name="update">update</button><br>

    
    </form>
    <?php
    $sql="SELECT srollno,sname,smarks,sgrade from student";
    $result=mysqli_query($conn,$sql);
    if(mysqli_num_rows($result)>0)
    {
        while($row=mysqli_fetch_assoc($result))
        {
           
            echo "student roll:".$row["srollno"]."<br>";
            echo "student name:".$row["sname"]."<br>";
            echo "student marks:".$row["smarks"]."<br>";
            echo "student grade:".$row["sgrade"]."<br>";

        }
    }
    else{
        echo "0 result";
    }
    ?>
    </body>
</html>