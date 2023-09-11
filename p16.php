<?php
if(isset($_POST["val"]))
{
    $num=$_POST["val"];
    $flag=1;
    for($i=2;$i<=$num/2;$i++)
    {
        if($num%$i==0)
        {
        
        echo "$num is not a prime number";
        $flag=0;
        break;
    }
    }
    if($flag==1)
    echo "$num is a prime number";
    exit();

}
?>
<html>
    <body>
        <form action="<?php $_PHP_SElF ?>" method="POST">
    NUMBER:<input type="text" name="val" required><br>
    <input type="submit" value="submit">
    </form>
    </body>
</html>