<?php

$con = mysqli_connect ('localhost', 'root', '');
mysqli_select_db($con, 'service');

session_start();
$connected_email = $_SESSION['Email'];

$s = "select * from clienti where textEmail = '$connected_email' Limit 1";
   
$result = mysqli_query($con, $s);
$num = mysqli_num_rows($result);

    if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['delete']))
    {
        $reg = "DELETE FROM clienti WHERE textEmail = '$connected_email'";
        if(mysqli_query($con, $reg))
            header("Location: index.html");
        else
        {
            echo "Account not deleted";
        } 
        
    }
    else header("Location: start.php?Email=".$connected_email);
?>    