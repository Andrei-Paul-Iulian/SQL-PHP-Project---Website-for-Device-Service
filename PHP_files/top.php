<?php

$connect = mysqli_connect ('localhost', 'root', '');
mysqli_select_db($connect, 'service');


$sql = "SELECT C.textNume, C.textPrenume, COUNT(D.ID_Dispozitiv) AS Nr_dispozitive
        FROM clienti C JOIN dispozitive D ON C.ID_Client = D.ID_Client
        GROUP BY C.textNume, C.textPrenume
        ORDER BY Nr_dispozitive DESC LIMIT 3";
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
                <h3 align="">Top 3 clienti cu cele mai multe dispozitive reparate</h3><br />                 
                <div class="table-responsive">  
                     <table class="table table-striped">  
                          <tr>  
                               <th>Nume Client</th>  
                               <th>Prenume Client</th>
                               <th>Numar Dispozitive</th>  
                          </tr>  
                          <?php  
                          if(mysqli_num_rows($result) > 0)  
                          {  
                               while($row = mysqli_fetch_array($result))  
                               {  
                          ?>  
                          <tr>  
                               <td><?php echo $row["textNume"];?></td>
                               <td><?php echo $row["textPrenume"];?></td>
                               <td><?php echo $row["Nr_dispozitive"];?></td>   
                        
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