<?php
$con=mysqli_connect("localhost","root","");
mysqli_select_db($con,"lecture");
session_start();		
	if($_SERVER["REQUEST_METHOD"] == "POST") {
      $username = mysqli_real_escape_string($con,$_POST['username']);
      $password = mysqli_real_escape_string($con,$_POST['password']); 
      $sql = "SELECT NAME,PASSWORD FROM admin WHERE name = '$username' and pass = '$password'";
      $result = mysqli_query($con,$sql);
      /*$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $count = mysqli_num_rows($result);*/
    // if($count == 1) {
         $_SESSION['login_user'] = $username;
         
         header("location: admin/index.php");  
	  }
		
?>

<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<link rel="stylesheet" type="text/css" href="style.css">
<link rel="stylesheet" href="css/bootstrap.css">
<title>Admin Login</title>
</head>	
<body><br><br><br><br><br>
<center>
<div class="card bg-secondary mb-3" style="max-width: 20rem; max-height: 100rem">
 <div class="card-body">
	 <p><b>Admin Login</b></p>
 <form method="post" action="">
<input class="box" type="text" name="username" placeholder="Username" required><br><br>
<input class="box"  type="password" name="password" placeholder="Password" required><br><br>
<input class="btn-lgn" type="submit" name="login" value="Login" >
	 </form>
	 </div>
	</div>
    </center>
<script src="js/jquery.js"></script>
<script src="js/bootstrap.js"></script>
	</body>
	</html>
