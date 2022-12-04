<!DOCTYPE html>
<html lang="en">

<head>
    <?php 
    include 'includes/headerlinks.php' ;
    include 'includes/connection.php' ;
    session_start();

    if(isset($_POST['submit'])){
        $new_name = mysqli_real_escape_string($con, $_POST['updated_name']);
        $new_subject = mysqli_real_escape_string($con, $_POST['updated_subject']);
        $new_subcode = mysqli_real_escape_string($con, $_POST['updated_subcode']);

        $id = $_GET['id'] ;

        $update_query = "update teacherdata set user='$new_name', subject='$new_subject' , subject_code='$new_subcode' where id='$id'";

        $run_query = mysqli_query($con,$update_query);

        $_SESSION['changes_time'] = time() + 10 ;

        if($run_query){
            // $_SESSION['changes_msg'] = "Changes Saved..";
            ?>
            <script>alert("Changes Saved..")</script>
        <?php
        }
    }
    ?>
    <title>Profile</title>
</head>
<body>
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">Logo</a>

        </div>
    </nav>

    <div class="container-fluid" style="display: flex; justify-content: center;">
        <div class="register-box">
            <div class="row">
                <div class="col register-header">
                    <h1>Profile</h1>
                </div>
            </div>
            <div class="row register-form">
                <div class="col w-50 m-auto">


                <?php
                $id = $_GET['id'] ;

                $search = " select * from teacherdata where id= '$id' ";
                $query = mysqli_query($con,$search);
        
                $user_detail = mysqli_fetch_assoc($query);
        
                $_SESSION['name'] = $user_detail['user'];
                $_SESSION['subject'] = $user_detail['subject'];
                $_SESSION['subcode'] = $user_detail['subject_code'];
                $_SESSION['email'] = $user_detail['email'];
                
                ?>
                    <form action="" method="POST">
                    
                        <div class="form-group">
                            <label for="username">Name</label><br>
                            <input type="text" id="username" name="updated_name" value="<?php echo $_SESSION['name'] ; ?>" class="form-control" required>    
                        </div>

                        <div class="form-group">
                            <label for="email">Email</label><br>
                            <input type="email" id="email" name="" value="<?php echo $_SESSION['email'] ; ?>" class="form-control" readonly>
                        </div>
                        
                        <div class="form-group">
    
                            <div class="row">
                                <div class="col-sm">                    
                                    <label for="subject">Subject</label><br>
                                    <input type="text" id="subject" name="updated_subject" value="<?php echo $_SESSION['subject'] ; ?>" class="form-control" required>
                                </div>
                                <div class="col-sm">
                                    <label for="subject-code">Subject Code</label><br>
                                    <input type="text" id="subjectcode" name="updated_subcode" value="<?php echo $_SESSION['subcode'] ; ?>" class="form-control" required>
                                </div>
                            </div>
                        </div>
                        
                        <div class="m-auto p-2" style="width:fit-content;width:-moz-fit-content;">
                            <button type="submit" name="submit" class="btn btn-success">Save Changes</button>
                        </div>
    
                    </form>
                </div>
            </div>
        </div>
    </div>


<?php include 'includes/footerlinks.php' ?>

</body>

</html>