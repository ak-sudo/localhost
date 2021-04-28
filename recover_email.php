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
    $email=mysqli_real_escape_string($con, $_POST['email']) ;

    $emailquery=" SELECT * FROM `regestration` WHERE email='$email' ";
    $query=mysqli_query($con, $emailquery);

    $emailcount=mysqli_num_rows($query);

    if($emailcount){

            $userdata=mysqli_fetch_array($query);

            $username=$userdata['username'];
            $token=$userdata['token'];
	    $email_take=$userdata['email'];

                $subject="Reset Password";
                $body="Hi, $username. We received your request to reset your password for iCoder's account
                 click the link below
                 http://localhost/bootstrap/reset_password.php?token=$token
                 and ignore the mail if you haven't requested
                 Thank You this
                 Team: iCoder";     
                $sender="From: myicodercode@gmail.com";
	        $semail="to: $email_take";


                if(mail($email, $subject, $body, $sender)){
                    $_SESSION['msg']="Check your mail inbox : $email to reset your account's password ";
                    header('location:home.php');
                }else{
                    echo "Email sending failed try again later";
		    
		    
                }
    }else {
        echo "Your Email :  $email is not regestered!";
    }
}
?>

    <div)  class="card bg-light">
    <article class="card-body mx-auto" style="max-width: 400px;">
     <h4 class="card-title-mt-3-text-center">Recover Account</h4>
     <p class="text-center">|| Don't worry, Just type your correct e-mail || </p>
      

     <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST">


        <div class="form-group input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fa fa-envelope"></i></span>
            </div>
            <input name="email" class="form-control" placeholder="Email Address" type="email" required>
            </div>

       

            <div class="form-group">
               <button type="submit" name="submit" class="btn btn-primary btn-block"> Reset Password </button>
               </div>
               <p class="text-center">Have an account? <a href="login.php">Login Here</a></p>
               <p class="text-center">Don't have an account? <a href="login.php">SignUp Here</a></p>
            </form>
        </article>
        </div>
</body>
</html>