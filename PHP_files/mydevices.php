<?php
include("fetch.php");
include("fetch2.php");
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <div class="row">
    <div class="col-sm-8">
        <?php echo $deleteMsg??''; ?>
        <div class="table-responsive">
        <table class="table table-bordered">
        <thead><tr><th>Nr.</th>
        <th>Nume_Dispozitiv</th>
        <th>Tip_Dispozitiv</th>
        <th>Serviciu cerut</th>
    </thead>
    <tbody>
    <?php
        if(is_array($fetchData))
        {      
            $sn = 1;
            foreach($fetchData as $data)
            {
                ?>
                <tr>
                <td><?php echo $sn; ?></td>
                <td><?php echo $data['Nume_Dispozitiv']??''; ?></td>
                <td><?php echo $data['Tip_Dispozitiv']??''; ?></td>
                <td><?php echo $data['Nume_Serviciu']??''; ?></td>
                </tr>
                <?php
                $sn++;
            }
        }
        else
        { 
            ?>
            <tr>
                <td colspan="8">
                    <?php echo $fetchData; ?>
                </td>
            <tr>
            <?php
        }
            ?>
    </tbody>
    </table>

    <form method="post" action="updatedevices.php">
        <label>Old name</label>
        <input type = "text" name = "OldName" required/>
        <label>New name</label>
        <input type = "text" name = "NewName" required/>
        <input type="submit" name="" value="Edit" style="color:rgb(4, 0, 255);">
    </form>
    <form method="post" action="deletedevices.php">
        <label>Device name to be deleted</label>
        <input type = "text" name = "Name" required/>
        <input type = "submit" name="Delete" value="Delete" style="color:rgb(4, 0, 255);">
    </form>

    <form method="post" action="costtotal_simple_query.php">
        <label>Apasati aici pentru a afla costul total pentru serviciile cerute</label>
        <input type = "submit" name="submit" value="Calculeaza costul total" style="color:rgb(4, 0, 255);">
    </form>
    <?php
        if($_GET)
        {
            if(isset($_GET['costtotal']) != NULL){
                $costtotal = $_GET['costtotal'];
                echo "Reparatia pentru toate produsele din lista este ";
                echo $costtotal;
            }                 
        }
    ?>
    
    <form method="post" action="cost_complex_query.php">
        <label>Introduceti numele dispozitivului pentru a vedea cat costa reparatia in functie de serviciul cerut</label>
        <input type = "text" name = "Nume_Dispozitiv" required/>
        <input type = "submit" name="submit100" value="Submit" style="color:rgb(4, 0, 255);">
    </form>
    <?php  
        if($_GET)
        {
            if(isset($_GET['cost']) != NULL){
                $cost = $_GET['cost'];
                echo "Reparatia produsului interogat este ";
                echo $cost;
            }                 
        }
    ?>

    <form method="post" action="angajat_complex_query.php">
        <label>Introduceti numele dispozitivului pentru a vedea numele angajatului care se ocupa de reparatie</label>
        <input type = "text" name = "Nume_Dispozitiv" required/>
        <input type = "submit" name="submit" value="Submit" style="color:rgb(4, 0, 255);">
    </form>
    <?php  
        if($_GET)
        {
            if(isset($_GET['angajat']) != NULL){
                $angajat = $_GET['angajat'];
                echo "Reparatia produsului este realizata de ";
                echo $angajat;
            }                 
        }
    ?>

    <form method="post" action="avgservicii.php">
        <label>Apasati aici pentru a vedea produsele care costa mai mult decat media tuturor serviciilor</label>
        <input type = "submit" name="submit" value="Show" style="color:rgb(4, 0, 255);">
    </form>
    
    <form method="post" action="isangajat_simple_query.php">
        <label>Introduceti numele unui client pentru a vedea daca exista un angajat cu aleasi nume</label>
        <input type = "text" name = "Nume_Client" required/>
        <input type = "submit" name="submit" value="Submit" style="color:rgb(4, 0, 255);">
    </form>
    <?php
        if($_GET)
        {
            if(isset($_GET['nume']) != NULL){
                $nume = $_GET['nume'];
                echo "Numelele angajatului ";
                echo $nume;
            }                 
        }
    ?>

    <form method="post" action="angajati_servicii_query.php">
        <label>Afisati angajatii si serviciile practicate de fiecare dintre ei </label>
        <input type = "submit" name="submit" value="Submit" style="color:rgb(4, 0, 255);">
    </form>

    <form method="post" action="dispozitive_tip_query.php">
        <label>Afisati numele si tipul dispozitivului cu o durata de reparatie mai mica decat:</label>
        <input type = "text" name = "durata" required/>
        <input type = "submit" name="submit" value="Submit" style="color:rgb(4, 0, 255);">
    </form>

    <form method="post" action="top.php">
        <label>Afisati top 3 clienti cu cele mai multe dispozitive reparate</label>
        <input type = "submit" name="submit" value="Submit" style="color:rgb(4, 0, 255);">
    </form>

    <form method="post" action="name_cost.php">
        <label>Afisati numele si costul total al reparatiilor facute de fiecare angajat</label>
        <input type = "submit" name="submit" value="Submit" style="color:rgb(4, 0, 255);">
    </form>

    <li><a href="start.php">Home</a></li> 
   </div>
</div>
</div>
</div>
</body>
</html>