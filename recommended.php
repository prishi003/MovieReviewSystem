<?php 
session_start(); 

include 'navloguser.html'; 
include "connection.php";
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Latest Movie</title>

  </head>
  <body> 
      

 <?php
	$uname= $_SESSION["username"];
    $sql = "SELECT m.mid, m.genre FROM moviedetails m, rating r where r.username='".$uname."' and m.moviename=r.moviename ORDER BY rating DESC;";
	$sql1= "SELECT *FROM moviedetails";
$result = mysqli_query($conn, $sql);
$result1 = mysqli_query($conn, $sql1);
if (mysqli_num_rows($result) > 0) 
{   
    echo '<table class="table table-hover" style="margin-left:5em;">
    <tr>
       <th style="font-size:48px; font-weight:bold; color:rgb(100,100,155);">Recommended Movies From Database</th>
    </tr> ';
    if (mysqli_num_rows($result1) > 0)
	{
		while($row = mysqli_fetch_assoc($result)) 
		{
			while($row1 = mysqli_fetch_assoc($result1)) 
			{
				if($row['genre']==$row1['genre'])
				{
					if($row1['mid']!=$row['mid'])
					{					
						echo " <tr>";
						echo "<td style='font-size:24px; color:rgb(76, 75, 75);'>";
						echo "<b>" .$row1["moviename"] . "</b>";
						echo "</td>";
					}
				}
			}
		}
	}
    echo " </table>";
} else {
    echo '<h1 style="font-size:48px; font-weight:bold; color:rgb(100,100,155); text-align:center;">Recommended to watch any movie from database!!!</h1>';
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