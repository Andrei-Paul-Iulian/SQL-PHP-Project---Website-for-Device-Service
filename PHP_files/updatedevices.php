<?php

$oldname = $_POST['OldName'];
$newname = $_POST['NewName'];

$con = mysqli_connect ('localhost', 'root', '');
mysqli_select_db($con, 'service');

   
$sql = "SELECT * FROM dispozitive WHERE Nume_Dispozitiv = '$oldname' Limit 1";

$result = mysqli_query($con, $sql);
$num = mysqli_num_rows($result);
    
    
    if ($num != 1) 
    {
        echo "ID not found";
    }
    else
    {   
        if($oldname == $newname)
        {
            echo "New Name is the same as Old Name";
        }
        else
        {
            $reg = "UPDATE dispozitive SET Nume_Dispozitiv = '$newname' WHERE Nume_Dispozitiv = '$oldname'";
            mysqli_query($con, $reg);
            echo "Password changed"; 
        }
             
    }
    header("Location: mydevices.php");
?>
