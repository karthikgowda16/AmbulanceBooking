<?php
$servername="localhost";
$username= 'root';
$password= '';
$dbname= 'ambulance';

$conn=new mysqli($servername,$username,$password,$dbname);
if(!$conn){
    die("Connection Failed: ".mysqli_connect_error());
}

$username=$_POST['username'];
$email=$_POST['email'];
$password =$_POST['password'];
$confirm= $_POST['confirm'];


$sql="INSERT INTO signup(username,email,password,confirm) VALUE('$username','$email','$password','$confirm')";
if($conn->query($sql)===TRUE){
    echo'<script> alert("submitted succesfully");</script>';
    $_SESSION['user'] = $email;
    echo '<script>window.location.href = "SignIn.html"</script>'; //last edited 26-11-2023

}else{
    echo "Error: " .$conn->error;
}

$conn->close();
?>