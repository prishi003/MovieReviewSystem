
<?php
    session_start();
    include 'connection.php';

    $uname=$_POST['userName'];
    $pass=$_POST['password'];

    $sql="Select username FROM admin WHERE username='$uname' AND pass='$pass'";

    $result=mysqli_query($conn,$sql);

	$flag=0;
    if(!$row=mysqli_fetch_assoc($result)){
    	echo '<script>var r=confirm("Invalid Username or Password!!!");
				if(r==true || r==false)
				{
					window.location.href = "login_admin.php";
				}
				</script>'; 
		$flag=1;
    }
	if($flag==0)
	{
    	$_SESSION['uid']=$row['uid'];
        header('Location:adminIndex.php');
    }

?>