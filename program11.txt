<?php
if(isset($_POST["num1"])&&(isset($_POST["num2"])))
{
    $num1=$_POST['num1'];
    $num2=$_POST['num2'];
    $result=$num1+$num2;
    echo "the sum is $result";
    exit(); 
}
?>
<html>
    <body>
        <form action="<?php $_PHP_SELF?>" method="post">
    NUM 1:<input type="text" name="num1" required><br>
    NUM 2:<input type="text" name="num2" required><br>
    <input type="submit" value="submit">
    
    </form>
    </body>
</html>