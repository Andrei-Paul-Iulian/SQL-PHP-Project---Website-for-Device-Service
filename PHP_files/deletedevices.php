<?php

$con = mysqli_connect ('localhost', 'root', '');
mysqli_select_db($con, 'service');

$name = $_POST['Name'];

$sql = "SELECT * FROM dispozitive WHERE Nume_Dispozitiv = '$name' Limit 1";

$result = mysqli_query($con, $sql);
$num = mysqli_num_rows($result);
   

    if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['Delete']))
    {
        $reg = "DELETE FROM dispozitive WHERE Nume_Dispozitiv = '$name'";
        if(mysqli_query($con, $reg))
            header("Location: mydevices.php");
        else
        {
            echo "Account not deleted";
        } 
    }
    else header("Location: start.php?");
?>    