<?php

session_start();
$errors = array();

$username = $_POST["username"];
$password = $_POST["password"];


//connect to user database
$conn = new mysqli("localhost", "root","", "livegreen");

//check for connection
if(mysqli_connect_error()){

    die("Failed to connect to database!");
}else{
    $sql = "select * from users where username= '$username' and password= '$password' and usertype= 'Collector'";
    $result = $conn -> query($sql);
    $user = mysqli_fetch_assoc($result);

    if($user['username'] == $username && $user['password'] == $password ) {
        $_SESSION['username']=$username;
        $_SESSION['fullname']=$user['fullname'];
        $_SESSION['totalPoints']=$user['totalPoints'];
        echo "<script type='text/javascript'>
            alert('Successfully login by Collector');
            window.location = '/Assignment2/assets/php/collectorLogin.php'; </script>";
    }else if($user['username'] == $username && $user['password'] != $password){

        echo "<script type='text/javascript'>
            alert('Incorrect username or password!');
            window.location = '/Assignment2/assets/php/collectorLogin.php'; </script>";
    
    } 
    else {
            $sql = "select * from users where username= '$username' and password= '$password' and usertype= 'Recycler'";
            $result = $conn -> query($sql);
            $user = mysqli_fetch_assoc($result);

            if($user['username'] == $username && $user['password'] == $password){
                $_SESSION['username']=$username;
                $_SESSION['fullname']=$user['fullname'];
                $_SESSION['totalPoints']=$user['totalPoints'];
                $_SESSION['ecoLevel'] = $user['ecoLevel'];
                echo "<script type='text/javascript'>
                alert('Successfully login by Recycler');
                window.location = '/Assignment2/assets/php/recyclerLogin.php'; </script>";
            }else  {
                $sql = "select * from users where username= '$username' and password= '$password' and usertype= 'Admin'";
                $result = $conn -> query($sql);
                $user = mysqli_fetch_assoc($result);
        
                    if($user['username'] == $username && $user['password'] == $password){
                        $_SESSION['username']=$username;
            
                        echo "<script type='text/javascript'>
                        alert('Successfully login by Admin');
                        window.location = '/Assignment2/assets/php/adminLogin.php'; </script>";
                    }
                    else{

                        echo "<script type='text/javascript'>
                        alert('Invalid password or username!');
                        window.location = '/Assignment2/index.html'; </script>";
                    }
            }



    }

}
        
        



?>

