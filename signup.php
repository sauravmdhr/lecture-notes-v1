<?php
$con=mysqli_connect("localhost","root","");
mysqli_select_db($con,"lecture");

session_start();	

if(isset($_POST['signup'])){
	$username =$_POST['username'];
	$email=$_POST['email'];
	$contact=$_POST['contact'];
	$pass=$_POST['password'];
	$add=$_POST['address'];
	$userf=$_POST['inlineRadioOptions'];
	$val = "SELECT name FROM users WHERE name='$username'" ;
	$check=mysqli_query($con,$val);

  if (mysqli_num_rows($check) != 0)
  {
      echo "<script>alert('Username already exists.Try Different One');</script>";
  }

  else
  {
    
  
$sql = "insert into user (name,pass,address,contact,email,userfield) values('$username','$pass','$add','$contact','$email','$userf')";
      $result = mysqli_query($con,$sql);
echo "<script>alert('Signup Successful.Login Now.');</script>";
if($userf=='lecturer'){
	$sql2 = "insert into lecturers (name) values('$username')";
	   $result = mysqli_query($con,$sql2);}
	   
echo "<script>location.href='login.php'</script>";
  }
}	

?>