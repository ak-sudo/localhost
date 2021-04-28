<?php

$server="localhost";
$user="root";
$password="";
$db="emailphp";


$con=mysqli_connect($server, $user, $password, $db);
if($con){
    //echo "Connected...";
}else{
    echo "Cannot Connect At The Moment..";
}
?>