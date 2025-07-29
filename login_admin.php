<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
       <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css" href="css/style.css">

    <title>Admin Login</title>
    <style>
		        body {
            background-image: url('images/main2.jpg');
            grid-template-rows: 1fr auto; /* Content takes available space, footer sticks */
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            height: 100vh;
            margin: 0;
            padding: 0;
        }
	</style>
     </head>

  <body>
  <?php include 'navbar.html';  ?>

  <div>

  <div>

<div class="container" style="background: rgba(255, 255, 255, 0.46); padding: 20px; border-radius: 10px;">
    <div class="row">
        <div class="page-header">
            <h1 style="font-size:48px; font-weight:bold; color:rgb(24, 24, 47); text-align: left; padding-left:50px">Admin Login</h1>
        </div>
        <form class="form-horizontal" role="form" method="post" name="logInForm" action="loginVerification_admin.php">
            <div class="form-group">
                <label for="userName" class="col-sm-2 control-label">User Name:</label>
                <div class="col-sm-6">
                    <input type="text" name="userName" class="form-control" id="userName" placeholder="User Name">
                </div>
            </div>

            <div class="form-group">
                <label for="password" class="col-sm-2 control-label">Password:</label>
                <div class="col-sm-6">
                    <input type="password" name="password" class="form-control" id="password" placeholder="Password">
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-primary" id="login">Login</button>
                </div>
            </div>
            <img src="images/ghibli_logo.png" height="150" width="auto" alt="" class="logo" align="right">
        </form>
    </div>

</div>

   </div>
   </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
      </body>
</html>