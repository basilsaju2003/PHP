<html>
<head>
</head>
<body>
<form action="<?php echo $_SERVER['PHP_SELF']?>" method="POST">
    Subject 1: <input type="text" name="sub1"><br>
    Subject 2: <input type="text" name="sub2"><br>
    Subject 3: <input type="text" name="sub3"><br>
    Subject 4: <input type="text" name="sub4"><br>
    Subject 5: <input type="text" name="sub5"><br>
    Subject 6: <input type="text" name="sub6"><br>
    <button type="submit" name="submit">Submit</button>
</form>

<?php
if (isset($_POST["submit"])) {
    $sub1 = $_POST['sub1'];
    $sub2 = $_POST['sub2'];
    $sub3 = $_POST['sub3'];
    $sub4 = $_POST['sub4'];
    $sub5 = $_POST['sub5'];
    $sub6 = $_POST['sub6'];

    function calcGrade($marks)
    {
        $grade = ""; 
        if ($marks >= 90)
            $grade = "A+";
        else if ($marks >= 80)
            $grade = "A";
        else if ($marks >= 70)
            $grade = "B+";
        else if ($marks >= 60)
            $grade = "B";
        else if ($marks >= 50)
            $grade = "C+";
        else if ($marks >= 40)
            $grade = "C";
        else if ($marks < 40)
            $grade = "Failed";

        return $grade; 
    }

    $grade1 = calcGrade($sub1); 
    echo "Subject 1 Grade: $grade1 <br>";
    $grade2 = calcGrade($sub2); 
    echo "Subject 1 Grade: $grade2 <br>";
    $grade3 = calcGrade($sub3); 
    echo "Subject 1 Grade: $grade3 <br>";
   $grade4 = calcGrade($sub4); 
    echo "Subject 1 Grade: $grade4 <br>";
  $grade5 = calcGrade($sub5); 
    echo "Subject 1 Grade: $grade5 <br>";
   $grade6 = calcGrade($sub6); 
    echo "Subject 1 Grade: $grade6 <br>";

}
?>
</body>
</html>
