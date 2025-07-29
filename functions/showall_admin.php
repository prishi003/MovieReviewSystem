 <?php session_start();
    include 'connection.php';  
    include 'admin_navbar.html';
    ?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <link rel="stylesheet" type="text/css" href="css/style.css">
    <title>ShowAll</title>
    <style>
        
        .movie-container {
            text-align: center;
            margin-top: 20px;
        }
        .movie-image {
            width: 200px;
            height: 300px;
            margin: 10px;
            transition: transform 0.4s ease-in-out;
            border-radius: 10px; /* Optional: Adds rounded corners */
        }
        .movie-image:hover {
            transform: scale(1.06); /* Slight zoom effect */
        }
    </style>
</head>
<body>
<div style="background-image: url('images/main2.jpg');">

   <?php

    $sql = "SELECT * FROM moviedetails";
	$result = mysqli_query($conn, $sql);
	echo'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
if (mysqli_num_rows($result) > 0) {
    $count=0;
    while($row = mysqli_fetch_assoc($result))
	{
		$location=$row["image"];
		echo'<html><body><a href="details_admin.php?mid='.$row["mid"].'">';
		echo '<img src="'.$location.'" class="movie-image">';
		$count++;
		if($count==5)
		{
			echo'<br><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
			$count=0;
		}
		echo"&nbsp;&nbsp;&nbsp;&nbsp;";
		echo'</a></body></html>';
		
    }
		
} else {
    echo "0 results";
}
mysqli_close($conn);



?>

   <footer>
       
       <div class="container">
     
  <h4 style="text-align: center; background-color: lightgrey; width: 100%;"> &copy; Studio Ghibli  </h4>
       </div>
   </footer>
</body>
</html>