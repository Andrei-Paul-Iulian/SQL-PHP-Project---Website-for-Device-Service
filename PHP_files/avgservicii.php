<?php
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
        <th>Nume_Serviciu</th>
        <th>Cost_Serviciu</th>
    </thead>
    <tbody>
    <?php
        if(is_array($fetchData2))
        {      
            $sn = 1;
            foreach($fetchData2 as $data2)
            {
                ?>
                <tr>
                <td><?php echo $sn; ?></td>
                <td><?php echo $data2['Nume_Serviciu']??''; ?></td>
                <td><?php echo $data2['Cost_Serviciu']??''; ?></td>
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
                    <?php echo $fetchData2; ?>
                </td>
            <tr>
            <?php
        }
            ?>
    </tbody>
    </table>
    <li><a href="mydevices.php">Back</a></li> 
   </div>
</div>
</div>
</div>
</body>
</html>