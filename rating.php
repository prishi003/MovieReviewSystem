<?php
session_start();
include "connection.php";
if(isset($_POST["rate"])){
	$flag=0;
	$movieName = $_GET["id"];
	$userName = $_GET["uname"];
	$rating = $_POST["phprating"];
	$sql = "SELECT * FROM rating";
	$result = mysqli_query($conn, $sql);
	if (mysqli_num_rows($result) > 0) 
	{
		while($row = mysqli_fetch_assoc($result)) 
		{
			if($row["username"]==$userName and $row["moviename"]==$movieName)
			{
				echo '<script>var r=confirm("You have already rated this movie!!!");
							if(r==true || r==false)
							{
								window.location.href = "showall_user.php";
							}
							</script>'; 
				$flag=1;
				break;
			}
		}
		
	}
	if($flag==0)
	{
		$rate = "insert into rating(moviename,username,rating) values('$movieName','$userName','$rating')";
		$result = mysqli_query($conn,$rate);
		if($result){
			header("Location:showall_user.php");
		}
		else{
			echo mysqli_error($conn);
		}
	}
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Rate</title>
</head>
<body>

</body>
</html>