<?php
$dbhost="localhost";
$dbuser="root";
$dbpass="";
$db="abc";

$conn=mysqli_connect($dbhost,$dbuser,$dbpass,$db);

if($conn->connect_error)
{
    die("connectionfaild").$conn->connect_error;
}
else
echo "connected";

if(isset($_POST["insert"]))
{
    $depno=$_POST['departmentid'];
    $depname=$_POST['departmentname'];
    $deplocation=$_POST['departmentlocation'];

    $sql="INSERT INTO `department`(`depno`, `depname`, `deplocation`) VALUES ('$depno','$depname','$deplocation')";

    if(mysqli_query($conn,$sql))
    {
        echo "\ninsertion success";
    }
    else{
        echo "ERROR".mysqli_error($conn);
        }
        unset($_POST["insert"]);
        
}

if(isset($_POST["delete"]))
{
    $loc=$_POST["deletelocation"];
    $sql="DELETE FROM `department` WHERE `deplocation`='$loc'";
    if(mysqli_query($conn,$sql))
    {
        echo "\ndeletion success";
    }
    else{
        echo "ERROR".mysqli_error($conn);
        }
        unset($_POST["delete"]);
}

if(isset($_POST["update"]))
{
    $id=$_POST['id'];
    $uploc=$_POST["updatelocation"];
    $sql="UPDATE `department` SET `deplocation`='$uploc' WHERE `depno`='$id'";
    if(mysqli_query($conn,$sql))
    {
        echo "\nupdate success";
    }
    else{
        echo "ERROR".mysqli_error($conn);
        }
        unset($_POST["update"]);
}


?>
<html>
    
    <body>
        <h1>Department Forms</h1>
        <?php

        $sql="CREATE TABLE department (
            depno int(10) not null primary key,
            depname varchar(30) not null,
            deplocation varchar(30) not null
        )";

        if(mysqli_query($conn,$sql))
        {
            echo "table created succesfully";
        }
        else
        {
            echo "error".mysqli_error($conn);
        }
        
        ?>

        <form action="<?php echo $_SERVER["PHP_SELF"]?>" method="post"><br>

            Department ID:<input type="number" name="departmentid" ><br>
            Department Name:<input type="text" name="departmentname" ><br>
            Department Location:<input type="text" name="departmentlocation" ><br>
            <button type="submit" name="insert">Submit</button><br>
            Delete Records of location:<input type="text" name="deletelocation" ><br>
            <button type="submit" name="delete">Delete</button><br>
            Update Records where department id:<input type="text" name="id" ><br>
            Update location to :<input type="text" name="updatelocation" ><br>
            <button type="submit" name="update">Update</button><br>
            

       </form>
       <?php
       $sql="SELECT depno,depname,deplocation FROM department";
       $result=mysqli_query($conn,$sql);
       if(mysqli_num_rows($result)>0)
       {
         echo "DEPARTMENT DEATAILS\n";
         while($rows=mysqli_fetch_assoc($result))
         {
            echo "DEPARTMENT ID     \t   :".$rows["depno"]."<br>";
            echo "DEPARTMENT NAME \t     :".$rows["depname"]."<br>";
            echo "DEPARTMENT LOCATION  \t:".$rows["deplocation"]."<br>";
         }
       }
       else{
             echo "o result";

       }
       
       
       
       ?>
        
    </body>
</html>