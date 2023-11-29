<?php
session_start();
$servername="localhost";
$username= 'root';
$password= '';
$dbname= 'ambulance';

$conn=new mysqli($servername,$username,$password,$dbname);
if(!$conn){
    die("Connection Failed: ".mysqli_connect_error());
}

// $username=$_POST['username'];
$email=$_POST['email'];
$password =$_POST['password'];


$sql="SELECT * FROM signup WHERE email = '$email' AND password = '$password'";
if($conn->query($sql)==TRUE){
    echo'<script> alert("submitted succesfully");</script>';
    $_SESSION['user'] = $email;
    echo '<script>window.location.href = "contact.html"</script>';
}else{
    echo "Error: " .$conn->error;
}

$conn->close();
?>