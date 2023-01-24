<?php

$con = mysqli_connect ('localhost', 'root', '');
mysqli_select_db($con, 'service');

session_start();
$Email = $_SESSION['Email'];

$Nume_Dispozitiv = $_POST['Nume_Dispozitiv'];

$id = "SELECT * FROM clienti WHERE textEmail = '$Email' ORDER BY ID_Client DESC Limit 1";
$result = mysqli_query($con, $id) or die("bad query: $id");
$row = mysqli_fetch_assoc($result);
$id_client = $row['ID_Client'];

$query = "SELECT CONCAT(A.Nume_Angajat, ' ', A.Prenume_Angajat) AS full_name
            FROM servicii S JOIN dispozitive D ON S.Nume_Serviciu = D.Nume_Serviciu
                            JOIN angajat A ON A.ID_Angajat = S.ID_Angajat 
            WHERE S.Nume_Serviciu = (SELECT Nume_Serviciu FROM dispozitive WHERE Nume_dispozitiv = '$Nume_Dispozitiv') AND Nume_dispozitiv = '$Nume_Dispozitiv' ";
$result = $con->query($query);

if($result == true)
{ 
    if ($result->num_rows > 0)
    {
        if (mysqli_num_rows($result) > 0) {
            while($rowData = mysqli_fetch_array($result)){
                  $answer = $rowData["full_name"];
            }
        }
        header("Location: mydevices.php?angajat=$answer");
    } 
    else 
    {
        $msg= "No Data Found"; 
    }
}
else
{
    $msg= mysqli_error($con);        
}

?>