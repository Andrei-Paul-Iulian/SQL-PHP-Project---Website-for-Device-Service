<?php

$connect = mysqli_connect ('localhost', 'root', '');
mysqli_select_db($connect, 'service');

$sql = "SELECT A.Nume_Angajat, A.Prenume_Angajat, S.Nume_Serviciu
        FROM angajat A JOIN servicii S ON S.ID_Angajat = A.ID_Angajat
        ORDER BY A.Nume_Angajat ASC";
 $result = mysqli_query($connect, $sql);  
 ?>  
 <!DOCTYPE html>  
 <html>  
      <head>  
           <title>Webslesson Tutorial | Fetch Data from Two or more Table Join using PHP and MySql</title>  
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
      </head>  
      <body>  
           <br />  
           <div class="container" style="width:500px;">  
                <h3 align="">Numele angajatilor si Serviciile practicate de acestia</h3><br />                 
                <div class="table-responsive">  
                     <table class="table table-striped">  
                          <tr>  
                               <th>Nume Angajat</th>  
                               <th>Prenume Angajat</th>
                               <th>Nume Serviciu practicat</th>    
                          </tr>  
                          <?php  
                          if(mysqli_num_rows($result) > 0)  
                          {  
                               while($row = mysqli_fetch_array($result))  
                               {  
                          ?>  
                          <tr>  
                               <td><?php echo $row["Nume_Angajat"];?></td>
                               <td><?php echo $row["Prenume_Angajat"];?></td>  
                               <td><?php echo $row["Nume_Serviciu"]; ?></td>  
                          </tr>  
                          <?php  
                               }  
                          }  
                          ?>  
                     </table>  
                </div>  
           </div>  
           <br />  
      </body>  
 </html>