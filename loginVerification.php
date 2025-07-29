
<?php 
    include 'connection.php';

    $uname=$_POST['userName'];
    $pass=$_POST['password'];

    $sql="Select * FROM user WHERE username='$uname' AND pass='$pass'";

    $result=mysqli_query($conn,$sql);

	$flag=0;
    if(mysqli_num_rows($result)==0)
	{
    	echo '<script>var r=confirm("Invalid Username or Password!!!");
				if(r==true || r==false)
				{
					window.location.href = "login.php";
				}
				</script>'; 
		$flag=1;
    }
	if($flag==0)
	{
        session_start();
    	$_SESSION['username']= $uname;
        header("Location:indexUser.php");
    }
?>