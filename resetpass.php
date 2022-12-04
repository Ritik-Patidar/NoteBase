<!DOCTYPE html>
<html lang="en">

<head>
    <?php 
    
    include 'includes/headerlinks.php' ;
    include 'includes/connection.php'; 
    session_start();

    ?>

    <title>Reset Password</title>

    <style>
        
    
    </style>

</head>
<body class="forgotpass-body">
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
        <div class="container-fluid">
            <div class="navbar-brand">
                <img src="images/notes.svg" alt="" style="height: 2rem;">
                <a class="navbar-brand" href="index.php">NOTEBASE</a>
            </div>

            <ul class="navbar-nav">
                <li class="nav-item">


                </li>
            </ul>
        </div>
    </nav>

    <?php
    
    if(isset($_POST['submit'])){

        if(isset($_GET['token'])){

            $token = $_GET['token'];

            $newpassword = mysqli_real_escape_string($con,$_POST['newpass']) ; 
            $confirmpassword = mysqli_real_escape_string($con,$_POST['cnewpass']) ;
            
            $encrypt_password = password_hash($newpassword,PASSWORD_BCRYPT);

            if($newpassword === $confirmpassword){
                $update_query = "update teacherdata set encrypt_password='$encrypt_password' , password='$newpassword' where token='$token'";
                // echo $update_query ;
                $query = mysqli_query($con,$update_query);
                if($query){
                    $_SESSION['time'] = time() + 10 ;
                    $_SESSION['msg'] = "Password has been updated" ;
                    header('location:index.php?modal=true');
                
                }
                else{
                    echo "an error occur" ;
                }
            }
            else{
                echo "Password does not match" ;
            }
        }
        else{
            echo "token not found";
        }
    }
    ?>

    <div class="container-fluid">
        <div class="login-container">
            <div class="forgotpass-container resetpass-container">
                <form action="#" class="resetpass-form  login-form" method="POST">
                    <h5>Create your new password.</h5><br><br>
                    <div class="form-group">
                        <label for="email">New Password</label><br>
                        <input type="password" name="newpass" placeholder="Password" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Confirm Password</label><br>
                        <input type="password" name="cnewpass" placeholder="Confirm Password" class="form-control" required>
                    </div>
                    
                    <button type="submit" name="submit" class="btn btn-success"><span class="glyphicon glyphicon-off"></span>Reset Password</button>
                </form>
            </div>
        </div>
    </div>
  

    <?php include 'includes/footerlinks.php' ?>

</body>

</html>