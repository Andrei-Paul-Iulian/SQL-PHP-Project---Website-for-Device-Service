<?php

$con = mysqli_connect ('localhost', 'root', '');
mysqli_select_db($con, 'service');

//session_start();
//$Email = $_SESSION['Email'];

$tableName="servicii";
$columns= ['Nume_Serviciu','Cost_Serviciu'];

//$id = "SELECT * FROM clienti WHERE textEmail = '$Email' ORDER BY ID_Client DESC Limit 1";
//$result = mysqli_query($con, $id) or die("bad query: $id");
//$row = mysqli_fetch_assoc($result);
//$id_client = $row['ID_Client'];

$fetchData2 = fetch_data2($con, $tableName, $columns);

function fetch_data2($con, $tableName, $columns)
{
    if(empty($con))
    {
        $msg= "Database connection error";
    }
    elseif (empty($columns) || !is_array($columns)) 
    {
        $msg="columns Name must be defined in an indexed array";
    }
    elseif(empty($tableName))
    {
        $msg= "Table Name is empty";
    }
    else
    {
        $columnName = implode(", ", $columns);
        $query = "SELECT ".$columnName." FROM $tableName"." 
                    WHERE Cost_Serviciu < (SELECT AVG(Cost_Serviciu) FROM servicii)
                    ORDER BY Cost_Serviciu ASC";
        $result = $con->query($query);

        if($result == true)
        { 
            if ($result->num_rows > 0)
            {
                $row= mysqli_fetch_all($result, MYSQLI_ASSOC);
                $msg= $row;
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
    }

    return $msg;
}
?>