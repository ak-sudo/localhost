<?php
session_start();
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <title>iCoder-Heaven for Programmers</title>
</head>

<body>

<?php

include 'contactcon.php';

if(isset($_POST['submit'])){
    $email=mysqli_real_escape_string($con, $_POST['email']) ;
    $Query=mysqli_real_escape_string($con, $_POST['query']) ;
    $status=mysqli_real_escape_string($con, $_POST['status']) ;
    $level=mysqli_real_escape_string($con, $_POST['level']) ;
    $about=mysqli_real_escape_string($con, $_POST['about user']) ;
    $sugg=mysqli_real_escape_string($con, $_POST['suggestion for us']) ;

    $emailquery=" select * from us where email=$email";

    $query=mysqli_query($con, $emailquery);
    if($email===$emailquery){

    $newquery="INSERT INTO `contact`.`us`(`email`, `query`, `status`, `level`, `about user`, `suggestion for us`) VALUES ('$email', '$Query', '$status', '$level', '$about', '$sugg')"; 

            $iquery=mysqli_query($con, $newquery);

            if($iquery){
                       ?>
                            <script>
                               alert("Thanks for the review!");
                            </script>
                        <?php
                    }}else{
                       
                       ?>
                            <script>
                               alert("We are unable to create your account at the moment, please try again later.");
                            </script>
                       <?php 
                    }
                  
    
}

?>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">iCoder</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="home.php">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="about.html">About</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Topics
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="tech.html">Technology</a>
                        <a class="dropdown-item" href="web.html">Web Development</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="support.html">Support Us</a>
                        <a class="dropdown-item" href="write.html">Write for Us</a>
                    </div>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="contact.html">Contact Us</a>
                </li>
            </ul>
            <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
        </div>
    </nav>
    <div class="container my-4">
        <h2>Contact Us</h2>
        
        <form>
            <div class="form-group">
              <label for="exampleFormControlInput1">Email address</label>
              <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com" name="email">
            </div>
            <div class="form-group">
              <label for="exampleFormControlSelect1" >Select your Query</label>
              <select class="form-control" id="exampleFormControlSelect1" name="query">
                <option>Web</option>
                <option>Tech Stack</option>
                <option>Technology</option>
                <option>Got Hacked</option>
                <option>Others</option>
              </select>
            </div>
            <div class="form-group">
              <label for="exampleFormControlSelect1" >Select your Query</label>
              <select class="form-control" id="exampleFormControlSelect1" name="status">
                <option>I am LoggedIn</option>
                <option>I am not LoggedIn</option>
              </select>
            </div>
            <div class="form-group row">
                <div class="col-sm-2">Are you a Member? </div>
                <div class="col-sm-10">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="gridCheck1" name="level">
                    <label class="form-check-label" for="gridCheck1">
                      Yes
                    </label>
                  </div>
                </div>
              </div>

              <div class="form-group row">
                <div class="col-sm-2">Are you a Professor? </div>
                <div class="col-sm-10">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="gridCheck2" name="level">
                    <label class="form-check-label" for="gridCheck2">
                      Yes
                    </label>
                  </div>
                </div>
              </div>

              <div class="form-group row">
                <div class="col-sm-2">Are you a Coder? </div>
                <div class="col-sm-10">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="gridCheck3" name="lavel">
                    <label class="form-check-label" for="gridCheck3">
                      Yes
                    </label>
                  </div>
                </div>
              </div>

              <div class="form-group">
                <label for="exampleFormControlTextarea1">Tell us about yourself</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="about user"></textarea>
              </div>

            <div class="form-group">
              <label for="exampleFormControlTextarea2">Elaborate Your Concern</label>
              <textarea class="form-control" id="exampleFormControlTextarea2" rows="3" name="suggestion for us"></textarea>
            </div>
            <button class="btn btn-primary" name="submit">Submit</button>
          </form>
        
    </div>

    <footer class="container">
        <p class="float-right"><a href="#">Back to top</a></p>
        <p>© 2020-2021 iCoder, Inc. · <a href="#">Privacy</a> · <a href="#">Terms</a></p>
     </footer>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
        integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV"
        crossorigin="anonymous"></script>
</body>

</html>