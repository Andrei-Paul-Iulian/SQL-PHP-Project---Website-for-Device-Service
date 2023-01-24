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

$query = "SELECT S.Cost_Serviciu 
FROM servicii S JOIN dispozitive D 
ON S.Nume_Serviciu = D.Nume_Serviciu 
WHERE S.Nume_Serviciu = 
(SELECT Nume_Serviciu FROM dispozitive WHERE Nume_dispozitiv = '$Nume_Dispozitiv') AND D.Nume_dispozitiv = '$Nume_Dispozitiv'";
$result = $con->query($query);

if($result == true)
{ 
    if ($result->num_rows > 0)
    {
        if (mysqli_num_rows($result) > 0) {
            while($rowData = mysqli_fetch_array($result)){
                  $answer = $rowData["Cost_Serviciu"];
            }
        }
        header("Location: mydevices.php?cost=$answer");
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