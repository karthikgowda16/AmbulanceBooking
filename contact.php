<?php
session_start();

if (!isset($_SESSION["user"])) {
    header("location:signin.html");
}
$servername="localhost";
$username= 'root';
$password= '';
$dbname= 'ambulance';

$conn=new mysqli($servername,$username,$password,$dbname);
if(!$conn){
    die("Connection Failed: ".mysqli_connect_error());
}

$name =$_POST['name'];
$email=$_POST['email'];
$phone =$_POST['phone'];
$ambulancetype =$_POST['ambulancetype'];
$address =$_POST['address'];
$subject =$_POST['subject'];
$message =$_POST['message'];

$sql="INSERT INTO contact(name,email,phone,ambulancetype,address,subject,message) VALUE('$name','$email','$phone','$ambulancetype','$address','$subject','$message')";
if($conn->query($sql)===TRUE){
    echo'<script> alert("submitted succesfully");</script>';
    $_SESSION['user'] = $email;
    echo '<script>window.location.href = "index.php"</script>';        //26-11-2023

}else{
    echo "Error: " .$conn->error;
}

$conn->close();
?>