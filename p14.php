<?php
if(isset($_POST["name"]))
{
    echo"the name is :".$_POST["name"];
    exit();
}
?>
<html>
    <body>
        <form action="<?php $_SERVER["PHP_SELF"]?>" method="POST">
    name: <input type="text" name="name" required>
    <button type="submit" value="submit">submit
</button>
    </form>
    </body>
</html>