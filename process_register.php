<?php
session_start();
include('includes/dbconfig.php');
if(isset($_POST['registerbtn'])){
    $name = mysqli_real_escape_string($conn,$_POST['name']);
    $email =  mysqli_real_escape_string($conn,$_POST['email']);
    $password1 = mysqli_real_escape_string($conn, $_POST['password']);
    $dob =  mysqli_real_escape_string($conn,$_POST['dob']);
    $longitude = mysqli_real_escape_string($conn,$_POST['longitude']);
    $latitude = mysqli_real_escape_string($conn,$_POST['latitude']);

  
    $query = "SELECT email FROM users where email = '$email' LIMIT 1 ";
    $query_run = mysqli_query($conn,$query);
    if(mysqli_num_rows($query_run) > 0){

        $_SESSION['status']= 'user already exisit';
        header('location:register.php');
    }
    else{
        $insert = "INSERT INTO users (full_name,email,dob,password1,account_number,longitude,latitude) VALUES ('$name','$email','$dob','$password1',generate_account_number(),'$longitude','$latitude')";	
        $insert_run = mysqli_query($conn,$insert);
        if(!$insert_run){
            echo "".mysqli_error($conn);
           $_SESSION['status']= 'Failed to insert: ';
        header('location:register.php');
        }else{
            $_SESSION['status']= 'Successful verify the email';
        header('location:login.php');

        }

    }

}else{
    $_SESSION['status']= 'all required';
    header('location:register.php');
}


?>