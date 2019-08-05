<?php
include 'functions.php';
$user_email=$_POST["user_email"];
$user_first_name=$_POST["user_first_name"];
$user_last_name=$_POST["user_last_name"];
		
$insertq=mysqli_query($con,"insert into subscriber set user_email='". $user_email."',user_first_name='". $user_first_name."',user_last_name='". $user_last_name."'");
echo $insertq;
die();
if($insertq){
echo 1;
}	else{
echo 0;
}
