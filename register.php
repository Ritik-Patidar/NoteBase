<!DOCTYPE html>
<html lang="en">

<head>
    <?php include 'includes/headerlinks.php' ?>

    <title>Register</title>
</head>

<body>
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
        <div class="container-fluid">
            <div class="navbar-brand">
                <img src="images/notes.svg" alt="" style="height: 2rem;">
                <a class="navbar-brand" href="index.php">NOTEBASE</a>
            </div>

        </div>
    </nav>

    <div class="container-fluid" style="display: flex; justify-content: center;">
        <div class="register-box">
            <div class="row">
                <div class="col register-header">
                    <h1>Register</h1>
                    <p>Please fill in this form to create an account.</p>
                </div>
            </div>
            <div class="row register-form">
                <div class="col w-50 m-auto">
                    <form action="php/regis_details.php" method="POST">
                    
                        <div class="form-group">
                            <label for="username">Name</label><br>
                            <input type="text" id="username" name="username" placeholder="Enter Name" class="form-control" required>    
                        </div>

                        <div class="form-group">
                            <label for="email">Email</label><br>
                            <input type="email" id="email" name="email" placeholder="Enter Email" class="form-control" required>
                        </div>
                        
                        <div class="form-group">
    
                            <div class="row">
                                <div class="col-sm">                    
                                    <label for="subject">Subject</label><br>
                                    <input type="text" id="subject" name="subject" placeholder="Enter Subject" class="form-control" required>
                                </div>
                            <div class="col-sm">
                                    <label for="subject-code">Subject Code</label><br>
                                    <input type="text" id="subjectcode" name="subjectcode" placeholder="Enter Subject Code" class="form-control" required>
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="password">Password</label><br>
                            <input type="password" id="password" name="password" placeholder="Enter Password" class="form-control" required>
                        </div>
                        
                        <div class="form-group">
                            <label for="confirm-password">Confirm Password</label><br>
                            <input type="password" id="confirmpassword" name="confirmpassword" placeholder="Confirm Password" class="form-control" required>
                        </div>
                        <div class="m-auto p-2" style="width:fit-content;width:-moz-fit-content;">
                            <button type="submit" name="submit" class="btn btn-success">Register</button>
                        </div>
                        
                        <div class="m-auto p-2" style="width:fit-content;width:-moz-fit-content;">
                            <span>Already have an account.<a href="index.php?modal=true"> Log in</a></span>
                        </div>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>


<?php include 'includes/footerlinks.php' ?>

</body>

</html>