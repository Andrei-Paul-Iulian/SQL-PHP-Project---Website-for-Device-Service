<?php

$newpassword = $_POST['newpassword'];
$confirmpassword = $_POST['confirmpassword'];

session_start();
$connected_email = $_SESSION['Email'];

$con = mysqli_connect ('localhost', 'root', '');
mysqli_select_db($con, 'service');

$s = "select * from clienti where textEmail = '$connected_email' Limit 1";
   
$result = mysqli_query($con, $s);
$num = mysqli_num_rows($result);
    
    
    if ($num != 1) 
    {
        echo "Email not found";
    }
    else
    {   
        if($newpassword != $confirmpassword)
        {
            echo "Passwords do not match.";
        }
        else
        {
            $reg = "UPDATE clienti SET textParola = '$confirmpassword' WHERE textEmail = '$connected_email'";
            mysqli_query($con, $reg);
            echo "Password changed"; 
        }
             
    }
    header("Location: start.php");
?>
