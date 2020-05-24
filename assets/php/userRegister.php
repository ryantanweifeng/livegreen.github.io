<?php
session_start();

$errors = array();

$username = $_POST["username"];
$password = $_POST["password"];
$fullname = $_POST["fullname"];
$user_type = $_POST["usertype"];
if($user_type == 'Collector'){
    $address =$_POST["address"];
    $schedule = $_POST["schedule"];

}else{
    

}


//connect to user database
$conn = new mysqli("localhost", "root","", "livegreen");

//check for connection
if(mysqli_connect_error()){

    die("Failed to connect to database!");
}else{
    $sql = "select * from users where username= '$username' ";
    $result = $conn -> query($sql);
    $user = mysqli_fetch_assoc($result);

    
    if($user["username"]== $username){
        array_push($errors, "Username already exist");
        echo "<script type='text/javascript'>
		alert('Oops! Username already existed! Please use other username...');
		window.location = '/Assignment2/registerAsLiverGreenUser.html'; </script>";

    }else{
        if($user_type == "Recycler"){
            $sql= "insert into users(username,password,fullname,usertype) values('$username','$password', '$fullname','$user_type')";
            
        }else{
            $sql= "insert into users(username,password,fullname,address,schedule,usertype) values('$username','$password', '$fullname','$address','$schedule','$user_type')";

        }
        
        
        if ($conn->query($sql)==TRUE){
            
            echo "<script type='text/javascript'>
            alert('Registered as LiveGreen User successfully!');
            window.location = '/Assignment2/index.html'; </script>";
        }


    }

    
}






?>