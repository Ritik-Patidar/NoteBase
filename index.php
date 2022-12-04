<!DOCTYPE html>
<html lang="en">

<head>
    <?php 
    include 'includes/headerlinks.php' ;
    include 'includes/connection.php';

    session_start();
    ?>
    <title>Home</title>
</head>
<body>
    <!-- <nav class="navbar navbar-expand-sm navbar-dark" style="background:transparent;">
        <div class="container-fluid">
            <ul class="navbar-nav ml-auto" style="color:#01A9BE;">
                <li class="nav-item active-link">
                    <a href="#" class="text-decoration-none mx-3">Home</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="text-decoration-none mx-3">About</a>
                </li>
            </ul>
        </div>
    </nav> -->


    <div class="container-fluid bg">

        <div class="row" style="margin-right: 0px !important ; margin-left:0px !important;">

            <div class="col-md-6 p-5" >
               <img class="img-fluid" src="./images/home.svg" alt="">
            </div>

            <div class="col-md-6 flex-column justify-content-center align-items-center" style="margin: auto;display: flex; flex-direction: row; justify-content: center;">
                <div class="text-dark text-center">
                    <h1>Make Learning Easy</h1><br>
                    <h4>don’t change your learning just change a way of learning.</h4>
                </div>
                <div>
                    <button type="button" class="btn btn-outline-primary index-btn " data-toggle="modal" data-target="#myModal">Teacher</button>


                    <!-- Modal -->
                    <div class="modal fade" id="myModal" role="dialog">
                        <div class="modal-dialog">

                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header ">
                                    <h3 class="modal-title w-100 text-center">LOGIN</h3>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>

                                <?php

                                if (isset($_POST['submit'])) {
                                    $email = $_POST['email'];
                                    $password = $_POST['password'];

                                    $email_search = " select * from teacherdata where email='$email' ";
                                    $query = mysqli_query($con, $email_search);

                                    $email_count = mysqli_num_rows($query);
                                    
                                    $_SESSION['time'] = time() + 10 ;

                                    if ($email_count) {
                                        $user_data = mysqli_fetch_assoc($query);

                                        $database_pass = $user_data['encrypt_password'];
                                        $_SESSION['user'] = $user_data['user'];
                                        $_SESSION['subjectname'] = $user_data['subject'];
                                        $_SESSION['subjectcode'] = $user_data['subject_code'];
                                        $_SESSION['id'] = $user_data['id'];

                                        $_SESSION['logged_in'] = true;

                                        $decrypt_pass = password_verify($password, $database_pass);


                                        if ($decrypt_pass) {
                                        ?>
                                            <script>
                                                // alert("Login Successfull");
                                                location.replace("profiles.php"); 
                                            </script>
                                        <?php
                                        } 
                                        else {
                                            $_SESSION['msg'] = "Incorrect Password" ; 
                                        ?>
                                            <script>
                                                // alert("Password Incorrect");                                            
                                                location.replace("index.php?modal=true");                                            
                                            </script>
                                        <?php
                                        }
                                    } 
                                    else {
                                            $_SESSION['msg'] = "User Does Not Exist" ;
                                        ?>
                                            <script>
                                            // alert("User does not exist");
                                            location.replace("index.php?modal=true");
                                            </script>
                                <?php
                                    }
                                }
                                ?>

                                <div class="modal-body">
                                    <div class="tab-content">
                                        <div id="teacher" class="tab-pane active"><br>
                                            <div class="login-container">
                                                <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" class="login-form" method="POST" >
                                                    
                                                    <?php 
                                                        if(isset($_SESSION['msg'])){
                                                            
                                                            if(time()  > $_SESSION['time'] ){
                                                                unset($_SESSION['msg']);
                                                            } 
                                                            else{
                                                                if($_SESSION['msg'] == "Password has been updated"){
                                                                ?>
                                                                <div class="alert alert-success text-center" role="alert">
                                                                    <?php echo $_SESSION['msg'] ; ?>                                                               
                                                                </div>
                                                                <?php
                                                                }
                                                                else{
                                                                ?>
                                                                <div class="alert alert-danger text-center" role="alert">
                                                                    <?php echo $_SESSION['msg'] ; ?>                                                               
                                                                </div>
                                                            <?php
                                                            }
                                                        }
                                                    }
                                                    ?>
                                                    
                                                    <div class="form-group">
                                                        <label for="email">E-mail</label><br>
                                                        <input type="email" id="email" name="email" placeholder="Email" class="form-control" required>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="password">Password</label><br>
                                                        <input type="password" id="password" name="password" placeholder="password" class="form-control" required>
                                                    </div>
                                                    
                                                    <button type="submit" name="submit" class="btn btn-success"><span class="glyphicon glyphicon-off"></span> Log in</button>
                                                    <a href="forgotpass.php">forgot password?</a>
                                                    <span>Need an account.<a href="register.php"> Sign Up</a></span>
                                                </form>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>

                    </div>
                    <a href="studentdashboard.php" type="button" class="btn btn-outline-primary index-btn">Student</a>
                </div>
            </div>
        </div>

        <!-- <div class=" bg-danger" style="height: 850px;">

        </div> -->
    </div>

    <?php include 'includes/footerlinks.php' ?>

    <?php

    if (isset($_GET['modal'])) {
    ?>

        <script>
            $(function() {
                $('#myModal').modal('show');
            });
        </script>

    <?php
    }
    ?>
</body>

</html>