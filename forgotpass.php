<!DOCTYPE html>
<html lang="en">

<head>
    <?php 
    include 'includes/headerlinks.php';
    include 'includes/connection.php';
   
   ?>
    <title>Forgot Password</title>
    
    <style>
        
    
    </style>

</head>
<body class="forgotpass-body">
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">Logo</a>

            <ul class="navbar-nav">
                <li class="nav-item">


                </li>
            </ul>
        </div>
    </nav>
    <?php 
    if(isset($_POST['submit'])){
        $email = $_POST['email'] ;

        $email_search = " select * from teacherdata where email='$email' ";
        $query = mysqli_query($con,$email_search);

        $email_count = mysqli_num_rows($query);
    
        if($email_count){
            
            $userdata = mysqli_fetch_array($query);

            $username = $userdata['user'] ;
            $usertoken = $userdata['token'];


            $to_email = "ritikpatidar029@gmail.com" ;
            $subject = "Password Reset" ;
            $body = "Hi, $username.Click here to reset your password http://localhost/minor%20project/resetpass.php?token=$usertoken " ;
            $header = "From: ritik.patidar.sbg@gmail.com"; 
            

            if(mail($to_email,$subject,$body,$header)){
                // echo "Email successfully Sent to $to_email";
                ?>
                <div class="container-fluid">
                    <div class="login-container">
                        <form action="#" class="forgotpass-form login-form" method="POST">
                            <img class="forgot-img" src="images/email.svg" alt="">
                            <h5>Please check your inbox and click in the received link to reset a password.</h5>
                        </form>
                    </div>
                </div>
        
                <?php
            }
            else{
                echo "Email sending failed";
            }
        }
        else{
            echo "User does not exist" ;
        }   
    }
    
    if(!isset($_POST['submit'])){
        ?>
        <div class="container-fluid">

            <div class="login-container">
                <div class="forgotpass-container">

                    <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" class="forgotpass-form login-form" method="POST">
                        <img class="forgot-img" src="images/forgot.svg" alt="">
                        <h5>Please Enter Your Email Address To Verify</h5>
                        <div class="form-group">
                            <!-- <label for="email">E-mail</label><br> -->
                            <br>
                            <input type="email" id="email" name="email" placeholder="Email" class="form-control" required>
                        </div>
                        
                        <button type="submit" name="submit" class="btn btn-success"><span class="glyphicon glyphicon-off"></span>Verify</button>
                        <span>Remember Password?<a href="index.php?modal=true"> Login</a></span>
                    </form>
                </div>
            </div>
        </div>
    <?php     
    }
    else{
    ?>
        <!-- <div class="container-fluid">
            <div class="login-container">
                <form action="#" class="forgotpass-form login-form" method="POST">
                    <img class="forgot-img" src="images/email.svg" alt="">
                    <h5>Please check your inbox and click in the received link to reset a password.</h5>
                </form>
            </div>
        </div>
         -->


    <?php 
    }
    ?>


    <?php include 'includes/footerlinks.php' ?>

</body>

</html>