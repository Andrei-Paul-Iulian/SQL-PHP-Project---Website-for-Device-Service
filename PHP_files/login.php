<?php

session_destroy();

$con = mysqli_connect ('localhost', 'root', '');
mysqli_select_db($con, 'service');

if(isset($_POST['Email']))
{
    $email = $_POST['Email'];
    $password = $_POST['Parola'];

    $sql = "select * from clienti where textEmail = '$email' AND textParola = '$password' Limit 1";
    echo $sql;
    $result=mysqli_query($con, $sql);

    if(mysqli_num_rows($result) == 1)
    {
        $Email = $_POST['Email'];
        header("Location: start.php?Email=$Email");
    }
    else
    {
        echo "Incorrect password!";
    }
}

?>

