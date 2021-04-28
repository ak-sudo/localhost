<?php
session_start();
ob_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <?php include 'css/style.php' ?>
    <?php include 'links/links.php' ?>
</head>
<body>

<?php 

include 'dbcon.php';

if(isset($_POST['submit'])){

    if(isset($_GET['token'])){

    $token=$_GET['token'];

    $password=mysqli_real_escape_string($con, $_POST['password']) ;
    $cpassword=mysqli_real_escape_string($con, $_POST['cpassword']) ;

    $pass=password_hash($password, PASSWORD_BCRYPT);
    $cpass=password_hash($cpassword, PASSWORD_BCRYPT);

            

        if($password === $cpassword){

            $updatequery="update regestration set password='$pass' where token='$token' ";

            $iquery=mysqli_query($con, $updatequery);

            if($iquery){

                $_SESSION['msg']="Your password has been updated successfully!";
                header('location:login.php');
                }else{
                    $_SESSION['passmsg']="Error: Unable to update your password. Please try again later...";
                    header('location:reset_password.php');
                    }
        }else{
            $_SESSION['passmsg']="Error: Please enter the same password both the time!";
        }
    }else{
        echo "No token found!";}

}
?>

    <div  class="card bg-light">
    <article class="card-body mx-auto" style="max-width: 400px;">
     <h4 class="card-title-mt-3-text-center">Create New Password</h4>
     <p class="text-center">|| iCoder, Easy, Clear ||</p>
     <p class="text-danger ps-5">
     <?php
     if(isset($_SESSION['passmsg'])){
        echo $_SESSION['passmsg']; 
     }else{
        echo $_SESSION['passmsg']=""; 
     }
      ?></p>
     <form action="" method="POST">
        <div class="form-group input-group">
            <div class="input-group-prepend">   
                <span class="input-group-text"><i class="fa fa-lock"></i></span>
            </div>
            <input class="form-control" placeholder="New Password" type="password" name="password" value="" required>
            </div>

        <div class="form-group input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fa fa-lock"></i></span>
            </div>
            <input class="form-control" placeholder="Confirm new password" type="password" name="cpassword" required>
            </div>

            <div class="form-group">
               <button type="submit" name="submit" class="btn btn-primary btn-block"> Update Password </button>
               </div>
               <p class="text-center">Have an account? <a href="login.php">Log In</a></p>
            </form>
        </article>
        </div>
</body>
</html>
