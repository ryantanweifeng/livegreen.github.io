<?php

session_start();
$collectorName = $_POST["collectorName"];
$submissionName =  $_POST["submissionName"];
$pointsPerKg = $_POST["pointsPerKg"];
$submissionID = $_POST["submissionID"];
$materialName = $_POST["materialName"];
$status = $_POST["status"];
$currentPoints = $_POST["currentPoints"];
if($status == 'Accepted'){
    $weightInKg = $_POST["weightInKg"];
    $weightInKg = (int)$weightInKg;

}else{
    $weightInKg = $_POST["weightInKg"]=0;

}




//connect to the livegreen database
$conn = new mysqli("localhost","root","","livegreen");


//check connection

if($conn->connect_error){

    die("Failed to connect to the database.");
}else{


    $sql = "select * from users where username= '$submissionName' ";
    $result = $conn -> query($sql);
    $user = mysqli_fetch_assoc($result);

     if($user["username"]== $submissionName){
         $currentPoints= $user["totalPoints"];
         $totalPoints =  $currentPoints + ($pointsPerKg * $weightInKg);
         if($totalPoints >= 100 && $totalPoints <500){

            $ecoLevel = "Eco-Saver";
        }else if($totalPoints >= 500 && $totalPoints < 1000){

            $ecoLevel = "Eco-Hero";

        }else{ 

            $ecoLevel = "Eco-Warrior";
        }
        

         $updateTables= "update submission, users set submission.materialName = '$materialName',users.ecoLevel = '$ecoLevel', submission.status='$status', submission.weightInKg='$weightInKg',submission.pointsAwarded = '$totalPoints' 
                              ,users.totalPoints = '$totalPoints' where submission.submissionID= '$submissionID' and users.username = '$submissionName'";

         if ($conn->query($updateTables)==TRUE){

            

            $_SESSION['totalPoints']=$totalPoints;
            $_SESSION['ecoLevel'] = $ecoLevel;

            echo "<script type='text/javascript'>
            alert('Updated successfully!');
            window.location = '/Assignment2/assets/php/collectorLogin.php'; </script>";
         }

     }

        $sql2 = "select * from users where username= '$collectorName' ";
        $result2 = $conn -> query($sql2);
        $user2 = mysqli_fetch_assoc($result2);

        if($user2["username"]== $collectorName){

            $currentPoints= $user2["totalPoints"];
            $totalPoints =  $currentPoints + ($pointsPerKg * $weightInKg);

            $updateTables2= "update submission, users set submission.materialName = '$materialName', submission.status='$status', submission.weightInKg='$weightInKg',submission.pointsAwarded = '$totalPoints' 
                             ,users.totalPoints = '$totalPoints' where submission.submissionID= '$submissionID' and users.username = '$collectorName'";


            if ($conn->query($updateTables2)==TRUE){

                $_SESSION['totalPoints']=$totalPoints;


                echo "<script type='text/javascript'>
                alert('Updated successfully!');
                window.location = '/Assignment2/assets/php/collectorLogin.php'; </script>";
            }else{

                die("Info not inserted!");
            }

        }else{die("User not found".$collectorName);}

    
    


}



?>
<?php
// access the submission and users table

//$accessTables=  "use submission and users";
//$totalPoints = $pointsPerKg * $weightInKg;




// //update submission table
// $result= $conn->query($accessTables);

  
// //connect to the livegreen database
// $conn = new mysqli("localhost","root","","livegreen");


// //check connection

// if($conn->connect_error){

//     die("Failed to connect to the database.");
// }

// $table = "use users";



// $result = $conn ->query($sql);

// if($result ->num_rows == 0){

//   die("More items to recycle are coming soon.");

// }else{
//     $sql = "select * from users";
//      while($row= $result->fetch_assoc()){

//                         $currentPoints = $row[""];



//                         if($row["username"] == $collector_username){
//                             $updateTables= "update submission, users set submission.materialName = '$materialName', submission.status='$status', submission.weightInKg='$weightInKg',submission.pointsAwarded = '$totalPoints' 
//                                                 ,users.totalPoints = '$totalPoints' where submission.submissionID= '$submissionID' and users.username = '$collector_username'";



//                         }else{


//                             $updateTables= "update submission, users set submission.materialName = '$materialName', submission.status='$status', submission.weightInKg='$weightInKg',submission.pointsAwarded = '$totalPoints' 
//                             ,users.totalPoints = '$totalPoints' where submission.submissionID= '$submissionID' and users.username = '$submissionName'";


//                         }
//         }
// }

// if ($conn->query($updateTables)==TRUE){
    

    




// 


    

//     $sql = "select * from users where username= '$collector_username' and usertype= 'Collector'";
//     $result = $conn -> query($sql);
//     $user = mysqli_fetch_assoc($result);

//     $currentPoints =$user["totalPoints"];
//     $newPoints = $pointsPerKg * $weightInKg;
//     $totalPoints = $currentPoints + $newPoints;




?>