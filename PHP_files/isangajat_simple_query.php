<?php

$con = mysqli_connect ('localhost', 'root', '');
mysqli_select_db($con, 'service');

session_start();
$Email = $_SESSION['Email'];
$nume = $_POST['Nume_Client'];


$id = "SELECT * FROM clienti WHERE textEmail = '$Email' ORDER BY ID_Client DESC Limit 1";
$result = mysqli_query($con, $id) or die("bad query: $id");
$row = mysqli_fetch_assoc($result);
$id_client = $row['ID_Client'];

$query = "SELECT CONCAT(A.Nume_Angajat, ' ', A.Prenume_Angajat) AS full_name FROM angajat A JOIN clienti C ON A.Nume_Angajat = C.textPrenume WHERE A.Nume_Angajat = '$nume'";
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
        header("Location: mydevices.php?nume=$answer");
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