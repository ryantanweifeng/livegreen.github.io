<?php

$submissionName = $_POST["submissionName"];
$materialID = $_POST["materialID"];
$materialName = $_POST["materialName"];
$description = $_POST["description"];
$collector = $_POST["collector"];
$proposedDate = $_POST["date"];
$pointsPerKg = $_POST["pointsPerKg"];


$conn = new mysqli("localhost","root","","livegreen");

if($conn->connect_error){

    die("Connection error!");

}

// access the submission table
$submissionTable=  "use submission";

//insert data into submission table
$result= $conn->query($submissionTable);

$insertSubmission= "insert into submission(submissionName, materialID, materialName,description,pointsPerKg,username,proposedDate) 
                    values('$submissionName','$materialID','$materialName','$description','$pointsPerKg','$collector','$proposedDate')";


if ($conn->query($insertSubmission)==TRUE){
    echo "<script type='text/javascript'>
    alert('Submitted successfully!');
    window.location = '/Assignment2/assets/php/recyclerLogin.php'; </script>";
}
                        

?>