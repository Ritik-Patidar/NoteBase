<?php

include '../includes/connection.php';

if(isset($_POST['submit'])){

    $username = mysqli_real_escape_string($con, $_POST['username']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $subject = mysqli_real_escape_string($con, $_POST['subject']);
    $subjectcode = mysqli_real_escape_string($con, $_POST['subjectcode']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $cpassword = mysqli_real_escape_string($con, $_POST['confirmpassword']);

    $pass = password_hash($password,PASSWORD_BCRYPT);
    $cpass = password_hash($cpassword,PASSWORD_BCRYPT);

    $token = bin2hex(random_bytes(15));

    $checkmail = " select * from teacherdata where email='$email' ";
    $query = mysqli_query($con,$checkmail);

    $emailcount = mysqli_num_rows($query);

     
    if($emailcount > 0){
        ?>
        <br><script>
            alert("User Already Exist");
            location.replace("../index.php");
        </script>
        <?php
    }else{
    
        if($password === $cpassword){
      
            $insertquery = "insert into teacherdata( user,email,subject,subject_code,encrypt_password,password,token) values('$username','$email','$subject','$subjectcode','$pass','$password','$token')";
     
            $insert = mysqli_query($con,$insertquery);
            
            if($insert){
                $fetchemail = " select * from teacherdata where email='$email' ";
                $query = mysqli_query($con,$fetchemail);

                $user_data = mysqli_fetch_assoc($query);

                $userid = "teacher".$user_data['id'];
                $createtable = "CREATE TABLE `$userid` ( `id` INT(255) NOT NULL AUTO_INCREMENT ,  `title` VARCHAR(255) NOT NULL ,`document` VARCHAR(255) NOT NULL ,PRIMARY KEY  (`id`))";

                $result = mysqli_query($con,$createtable);
                
                $assigntablename = $userid."_assignment" ;
                $createassigntable =  "CREATE TABLE `$assigntablename` ( `assign_id` INT(255) NOT NULL AUTO_INCREMENT ,  `title` VARCHAR(255) NOT NULL ,  `description` TEXT NOT NULL ,  `due_date` DATE NOT NULL ,  `file` VARCHAR(255) NOT NULL ,    PRIMARY KEY  (`assign_id`))";

                $assignresult = mysqli_query($con,$createassigntable);



                ?>
                <script>
                    alert("Registration Succesfull");
                    location.replace("../index.php?modal=true");
                </script>
                <?php
            }else{
                ?>
                <script>
                    alert("Registration failed");
                    ;location.replace("../index.php")
                </script>
                <?php
            }

        }else{
            ?>
            <script>
                alert("Password does not match");
                location.replace("../index.php");
            </script>
            <?php
        }
    }
}

?>