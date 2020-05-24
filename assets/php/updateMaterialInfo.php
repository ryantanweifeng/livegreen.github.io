<?php
$materialID = $_POST['materialID'];
$materialName = $_POST['materialName'];
$description = $_POST['description'];
$pointsPerKg = $_POST['pointsPerKg'];


//check connection

$conn = new mysqli("localhost","root", "","livegreen");

if($conn->connect_error){


    die("Connection error!");

}

// access the material table

$materialTable=  "use material";

//update table
$result= $conn->query($materialTable);

$updateMaterialTable= "update material set materialName = '$materialName', description='$description', pointsPerKg='$pointsPerKg' 
                        where materialID= '$materialID'";



if ($conn->query($updateMaterialTable)==TRUE){
    echo "<script type='text/javascript'>
    alert('Updated successfully!');
    window.location = '/Assignment2/assets/php/adminLogin.php'; </script>";
}
                        




?>