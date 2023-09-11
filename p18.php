<?php
$dbhost="localhost";
$dbuser="root";
$dbpass="";
$db="abc";
$conn=mysqli_connect($dbhost,$dbuser,$dbpass,$db);
if($conn->connect_error){
    die("conecction failed".$conn->connect_error);

}
else
echo "connected";
if(isset($_POST["insert"])){
    $name=$_POST["name"];
    $address=$_POST["address"];
    $salary=$_POST["salary"];
    $sql="INSERT INTO `employee`( `empname`, `empaddress`, `empsalary`) VALUES ('$name','$address','$salary')";
    if(mysqli_query($conn,$sql)){}
    else{
        echo "ERROR".mysqli_error($conn);
        }
        unset($_POST["insert"]);
        
}

if(isset($_POST["delete"])){
  
    $sal=$_POST["sal"];
    $sql="DELETE FROM `employee` WHERE empsalary>$sal";
    if(mysqli_query($conn,$sql)){}
    else{
        echo "ERROR".mysqli_error($conn);
        }
        unset($_POST["delete"]);
        
}

if(isset($_POST["update"])){
  
    $id=$_POST["id"];
    $newsal=$_POST["newsal"];
    $sql="UPDATE `employee` SET `empsalary`='$newsal' WHERE `empid`='$id'";
    if(mysqli_query($conn,$sql)){}
    else{
        echo "ERROR".mysqli_error($conn);
        }
        unset($_POST["update"]);
       
}
?>
<html>
    <body>
        <h1>form</h1>
       
       <?php
       // Assuming you have already established a database connection named $conn
       
       $sql = "CREATE TABLE employee (
           empid INT AUTO_INCREMENT PRIMARY KEY,
           empname VARCHAR(30) NOT NULL,
           empaddress VARCHAR(30) NOT NULL,
           empsalary VARCHAR(20) NOT NULL
       )";
       
       if (mysqli_query($conn, $sql)) {
           echo "Table created successfully";
       } else {
           echo "Error in table creation: " . mysqli_error($conn);
       }
       
      
   ?>
   
        
        <form action="<?php echo $_SERVER["PHP_SELF"] ?>" method="post"><br>
    
            Employee Name:<input type="text" name="name"  ><br>
            Employee Address:<input type="text" name="address" ><br>
            Employee Salary:<input type="number" name="salary" ><br>

            <button type="submit" name="insert"> insert</button><br><br>Salary
            <input type="text" name="sal"><br>
            <button type="submit" name="delete"> Delete</button><br><br>
            employee id :<input type="text" name="id"><br>
            new salary :<input type="text" name="newsal"><br>
            <button type="submit" name="update">update</button><br>

    
    </form>
    <?php
    $sql="SELECT empid,empname,empaddress,empsalary from employee";
    $result=mysqli_query($conn,$sql);
    if(mysqli_num_rows($result)>0)
    {
        while($row=mysqli_fetch_assoc($result))
        {
           
            echo "Emp Id:".$row["empid"]."<br>";
            echo "Emp Name:".$row["empname"]."<br>";
            echo "Emp Address:".$row["empaddress"]."<br>";
            echo "Emp salary:".$row["empsalary"]."<br>";

        }
    }
    else{
        echo "0 result";
    }
    ?>
    </body>
</html>