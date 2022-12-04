<?php 

include 'includes/connection.php';

session_start();


if(isset($_POST['submit'])){
    $email = $_POST['email'] ;
    $password = $_POST['password'];

    $_SESSION['mail'] = $_POST['email'] ;
    
    $email_search = " select * from teacherdata where email='$email' ";
    $query = mysqli_query($con,$email_search);

    $email_count = mysqli_num_rows($query);

    if($email_count){
        $user_data = mysqli_fetch_assoc($query);

        $database_pass = $user_data['encrypt_password'];
        $_SESSION['user'] = $user_data['user'];
        $_SESSION['subjectname'] = $user_data['subject'];
        $_SESSION['subjectcode'] = $user_data['subject_code'];
        $_SESSION['id'] = $user_data['id'];
        // $_SESSION['mail'] = $email ;

        $_SESSION['logged_in'] = true ;
        

        $decrypt_pass = password_verify($password,$database_pass);

        if($decrypt_pass){
            ?>
            <script>
                alert("Login Successfull");
                location.replace("profiles.php");
            </script>
            <?php
        }else{
            ?>
            <script>
                alert("Password Incorrect");
                location.replace("index.php");
            </script>
            <?php
        }
    }else{
        ?>
            <script>
                alert("User does not exist");
                location.replace("index.php");
            </script>
            <?php
    }

}
?>