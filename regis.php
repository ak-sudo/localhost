<?php
session_start();
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
    $username=mysqli_real_escape_string($con, $_POST['username']) ;
    $email=mysqli_real_escape_string($con, $_POST['email']) ;
    $mobile=mysqli_real_escape_string($con, $_POST['mobile']) ;
    $password=mysqli_real_escape_string($con, $_POST['password']) ;
    $cpassword=mysqli_real_escape_string($con, $_POST['cpassword']) ;

    $pass=password_hash($password, PASSWORD_BCRYPT);
    $cpass=password_hash($cpassword, PASSWORD_BCRYPT);

    $token=bin2hex(random_bytes(15));

    $emailquery=" SELECT * FROM `regestration` WHERE email='$email' ";
    $query=mysqli_query($con, $emailquery);

    $emailcount=mysqli_num_rows($query);

    if($emailcount>0){
                      ?>
                            <script>
                               alert(" Email already exists.Try an another one.. ");
                            </script>
                       <?php 
    }else{
        if($password === $cpassword){

            
            $newquery="INSERT INTO `regestration`(`username`, `email`, `mobile number`, `password`, `cpassword`, `token`, `status`) VALUES ( '$username', '$email', '$mobile', '$pass', '$cpass', '$token', 'inactive')"; 

            $iquery=mysqli_query($con, $newquery);

            if($iquery){
                $subject="Activation Email from iCoder";
                $body="Hi, $username. Click the given link to activate your account: http://localhost/bootstrap/activate.php?token=$token";
                $sender="From: myicodercode@gmail.com";
		$receiver="To: $email";

                if(mail($receiver, $subject, $body, $sender)){
                    $_SESSION['msg']="Check your mail inbox to activate your account $email";
                    header('location:home.php');
                }else{
                    echo "Email sending failed try again later";
                }
                   
                    }else{
                       
                       ?>
                            <script>
                               alert("We are unable to create your account at the moment, please try again later.");
                            </script>
                       <?php 
                    }

        }else{
            ?>
                <script>
                    alert(" Password entered do not match. Do check and rewrite them again.. ");
                </script>
            <?php 
        }
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
     <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST">
        <div class="form-group input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fa fa-user"></i></span>
            </div>
            <input name="username" class="form-control" placeholder="Full name" type="text" required>
            </div>

        <div class="form-group input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fa fa-envelope"></i></span>
            </div>
            <input name="email" class="form-control" placeholder="Email Address" type="email" required>
            </div>

        <div class="form-group input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fa fa-phone"></i></span>
            </div>
            <input name="mobile" class="form-control" placeholder="Phone Number" type="mobile" required>
            </div>

        <div class="form-group input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fa fa-lock"></i></span>
            </div>
            <input class="form-control" placeholder="Create Password" type="password" name="password" value="" required>
            </div>

        <div class="form-group input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fa fa-lock"></i></span>
            </div>
            <input class="form-control" placeholder="Confirm password" type="password" name="cpassword" required>
            </div>

            <div class="form-group">
               <button type="submit" name="submit" class="btn btn-primary btn-block"> Create Account </button>
               </div>
               <p class="text-center">Have an account? <a href="login.php">Log In</a></p>
            </form>
        </article>
        </div>
</body>
</html>