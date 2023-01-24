<?php

$Nume = $_POST['NumeDispozitiv'];
$Tip = $_POST['device'];
$Serviciu = $_POST['service'];

session_start();
$Email = $_SESSION['Email'];

$con = mysqli_connect ('localhost', 'root', '');
mysqli_select_db($con, 'service');

$id = "SELECT * FROM clienti WHERE textEmail = '$Email' ORDER BY ID_Client DESC Limit 1";
$result = mysqli_query($con, $id) or die("bad query: $id");
$row = mysqli_fetch_assoc($result);
$id_client = $row['ID_Client'];

$reg = "INSERT INTO dispozitive (`Nume_dispozitiv`, `Tip_dispozitiv`, `Nume_Serviciu`, `ID_Client`) VALUES ('$Nume', '$Tip', '$Serviciu', '$id_client')";
mysqli_query($con, $reg);
header("Location: start.php?Email=$Email");
        
?>