<?php
$username = $_POST["username"];
$password = $_POST["password"];
$fullname = $_POST["fullname"];

//check connection

$conn = new mysqli("localhost","root", "","livegreen");

if($conn->connect_error){


    die("Connection error!");

}

// access the material table

$usersTable=  "use users";

//update table
$result= $conn->query($usersTable);

$updatePersonInfoTable= "update users set password = '$password', fullname='$fullname'
                        where username= '$username'";



if ($conn->query($updatePersonInfoTable)==TRUE){
    echo "<script type='text/javascript'>
    alert('Personal information has been updated sucessfully!');
    window.location = '/Assignment2/assets/php/collectorLogin.php'; </script>";
}
                        




?>
