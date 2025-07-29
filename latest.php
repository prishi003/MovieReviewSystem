<?php 
session_start(); 

include 'navbar.html'; 
include "connection.php";
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
   
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

     <link rel="stylesheet" type="text/css" href="css/style.css">
    <title>Latest Movie</title>

  </head>
  <body> 
     
 <?php

    $sql = "SELECT moviename,year FROM moviedetails where year>=2016 ORDER BY year DESC";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
   
    echo '<table class="table table-hover" style="margin-left:5em;">
    
	<tr>
       <th style="font-size:48px; font-weight:bold; color:rgb(100,100,155);">Movie Name</th>
       <th style="font-size:48px; font-weight:bold; color:rgb(100,100,155);">Year</th>
    </tr> ';
    while($row = mysqli_fetch_assoc($result)) 
	{
		$mname = $row["moviename"];
          echo " <tr>";
                    echo "<td style='font-size:24px; color:rgb(169,169,169);'>";
                    echo "<b>" .$row["moviename"] . "</b>";
                    echo "</td>";
                   echo "<td style='font-size:24px; font-weight:bold; color:rgb(169,169,169);'>"; echo $row["year"]; echo "</td>";
                   
       }
       
    
    echo " </table>";
} else {
    echo "0 results";
}

mysqli_close($conn);


?>

   <footer>
       
       <div class="container">
     
  <h4 style="text-align: center; background-color: lightgrey; width: 100%;"> &copy; Studio Ghibli</h4>
       </div>
   </footer>
 
 </body>

 </html>