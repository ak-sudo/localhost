<?php
session_start();

include 'dbcon.php';

if(isset($_GET['token'])){

    $token=$_GET['token'];

    $updatequery="update regestration set status='active' where token='$token' ";

    $query=mysqli_query($con, $updatequery);

    if($query){
        if(isset($_SESSION['msg'])){
            $_SESSION['msg']="Account Verification Successful";
            header('location:login.php');
        }else{
            $_SESSION['msg']="You are Logged out, please login again...";
            header('location:login.php');
        }
    }else{
        $_SESSION['msg']="Account Verification Failed";
            header('location:regis.php');

    }


}

?>