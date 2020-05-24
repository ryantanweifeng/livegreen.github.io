<?php



$materialName= $_POST['materialName'];
$description = $_POST['description'];
$pointsPerKg = $_POST['pointsPerKg'];

//check connection to database

$conn = new mysqli("localhost", "root","","livegreen");

if($conn ->connect_error){


    die("Connection failed!");
}

//use material table

$sql ="select * from material where materialName='$materialName'and description= '$description' ";
$result= $conn->query($sql);
$material= mysqli_fetch_assoc($result);



if($material['materialName']== $materialName && $material['description']== $description ){


    echo "<script type='text/javascript'>
            alert('Material name, description exist!');
            window.location = '/Assignment2/assets/php/adminLogin.php'; </script>";
}else{

    $sql= "insert into material(materialName,description,pointsPerKg) values('$materialName','$description','$pointsPerKg')";
    
    if ($conn->query($sql)==TRUE){
        
        
        echo "<script type='text/javascript'>
        alert('Material has been added!');
        window.location = '/Assignment2/assets/php/adminLogin.php'; </script>";
    }
}


?>