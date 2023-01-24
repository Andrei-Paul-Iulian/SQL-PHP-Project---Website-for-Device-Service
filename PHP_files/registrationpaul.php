<?php

session_destroy();

$textNume = $_POST['Nume'];
$textPrenume = $_POST['Prenume'];
$textTelefon = $_POST['Telefon'];
$textEmail = $_POST['Email'];
$textAdresa = $_POST['Adresa'];
$textOras = $_POST['Oras'];
$textJudet = $_POST['Judet'];
$textParola = $_POST['Parola'];
$textReParola = $_POST['ReParola'];


    $con = mysqli_connect ('localhost', 'root', '');
    mysqli_select_db($con, 'service');
    
    $s = "select * from clienti where textEmail = '$textEmail' Limit 1";
   
    $result = mysqli_query($con, $s);
    $num = mysqli_num_rows($result);
    
    
    if ($num == 1) 
    {
        echo "Email is already in use.";
    }
    else
    { 
        if($textParola != $textReParola)
        {
            echo "Passwords do not match.";
        }
        else
        {
            $reg = "INSERT INTO clienti (`textNume`, `textPrenume`, `textTelefon`, `textEmail`, `textAdresa`, `textOras`, `textJudet`, `textParola` ) VALUES ('$textNume', '$textPrenume', '$textTelefon', '$textEmail', '$textAdresa', '$textOras', '$textJudet', '$textParola')";
            mysqli_query($con, $reg);
            echo "Registration Successful";
        }     
    }
?>