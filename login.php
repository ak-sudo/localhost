<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title></title>
    <?php include 'css/style.php' ?>
    <?php include 'links/links.php' ?>
</head>
<body>

<?php

include 'dbcon.php';

if(isset($_POST['submit'])){
    $email=$_POST['email'];
    $password=$_POST['password'];

    $email_search="select * from regestration where email='$email' and status='active' ";
    $query=mysqli_query($con, $email_search);

    $email_count=mysqli_num_rows($query);
    if($email_count){
        $email_pass=mysqli_fetch_assoc($query);

        $db_pass=$email_pass['password'];
        $_SESSION['username']=$email_pass['username'];

        $pass_decode=password_verify($password, $db_pass);

        if($pass_decode){
            echo "Login successful..." ;
            ?>
            <script>
               location.replace("home.php");
            </script>
            <?php
        }else{
        echo "Incorrect password...";
        }
    }else{
        echo "Invalid email...";
    }
}

?>
    
    <div)  class="card bg-light">
    <article class="card-body mx-auto" style="max-width: 400px;">
     <h4 class="card-title-mt-3-text-center">Create Account</h4>
     <p class="text-center">Get started with your free account</p>
     <p>
        <a href="" class="btn btn-block btn-gmail"><i class="fa fa-google"></i>   Login via Gmail</a>
        <a href="" class="btn btn-block btn-facebook"><i class="fa fa-facebook-f"></i>   Login via Facebook</a>
     </p>
     <p class="divider-text">
        <span class="bg-light">OR</span>
     </p>

     <div>
         <p class="bg-success text-white px-4"><?php
            if(isset($_SESSION['msg'])){
                echo $_SESSION['msg'];
            }else{
                echo $_SESSION['msg']="You are Logged out. Please login again!";
            }
          ?></p>
     </div>
     <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST">
        <div class="form-group input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fa fa-user"></i></span>
            </div>
            <input name="email" class="form-control" placeholder="Email" type="email" required>
            </div>

        <div class="form-group input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fa fa-lock"></i></span>
            </div>
            <input class="form-control" placeholder="Password" type="password" name="password" value="" required>
            </div>

            <div class="form-group">
               <button type="submit" name="submit" class="btn btn-primary btn-block"> Login Now </button>
               </div>
               <p class="text-center">Forgot password?  <a href="recover_email.php">Click Here</a></p>
               <p class="text-center">Don't have an account? <a href="regis.php">SignUp Here</a></p>
            </form>
        </article>
        </div>
</body>
</html>