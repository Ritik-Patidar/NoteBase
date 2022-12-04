<?php  

include 'includes/connection.php';

if(isset($_POST['submit'])){

    $assign_id = $_GET['assignid'];
    $userid = $_GET['teacherid'];

    $name = $_POST['name'];
    $enrollment_number = $_POST['enroll'];
    $class = $_POST['class'];
    $subject = $_POST['subject'];
    $subject_code = $_POST['subjectcode'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];

    $document = $_FILES['file'];


    $filename = $document['name'];
    $filepath = $document['tmp_name'];
    $fileerror = $document['error'];

    $tablename =  "teacher".$userid."_assignment".$assign_id."_submission";
    $tableQuery = "select 1 from '$tablename' LIMIT 1";
    $isexist = mysqli_query($con,$tableQuery);
    if ($isexist !== FALSE ) {
        
    }
    else {
        // echo "Table does not exist";
        $createSubmissionTable = "CREATE TABLE `$tablename` ( `id` INT(255) NOT NULL AUTO_INCREMENT ,  `name` VARCHAR(255) NOT NULL ,  `enrollment_number` VARCHAR(20) NOT NULL ,  `class` VARCHAR(10) NOT NULL ,  `subject` VARCHAR(50) NOT NULL ,  `subject_code` VARCHAR(10) NOT NULL ,  `email` VARCHAR(50) NOT NULL ,  `mobile_number` VARCHAR(20) NOT NULL ,  `file` VARCHAR(255) NOT NULL ,    PRIMARY KEY  (`id`))";
        $submissionResult = mysqli_query($con,$createSubmissionTable);

    }

    
    if($fileerror == 0){


        $dir = "db/" ;
        $main_folder_name = "teacher".$userid ;
        if(!file_exists($dir . $main_folder_name)){
            @mkdir($dir . $main_folder_name, 0777);
        }


        $output_dir = "db/teacher$userid/" ;
        $folder_name = "teacher".$userid."_assignment" ;
        if(!file_exists($output_dir . $folder_name)){
            @mkdir($output_dir . $folder_name, 0777);
        }
        
        $assign_dir = "db/teacher$userid/teacher".$userid."_assignment/" ;
        $assign_folder_name = "teacher".$userid."_assignment".$assign_id."_submission" ;
        if(!file_exists($assign_dir . $assign_folder_name)){
            @mkdir($assign_dir . $assign_folder_name, 0777);
        }




        $destination = 'db/teacher'.$userid.'/'.$folder_name.'/'.$assign_folder_name.'/'.$filename;

        move_uploaded_file($filepath,$destination);
        // $tname =  "teacher".$userid."_assignment_".$assign_id."_submission";

        $insert = "INSERT INTO `$tablename` (`name`, `enrollment_number`, `class` , `subject` , `subject_code` , `email` , `mobile_number` , `file`) VALUES ('$name', '$enrollment_number' , '$class' , '$subject' , '$subject_code' , '$email' , '$mobile' , '$destination')";
 
        // echo $insert;
        $query = mysqli_query($con,$insert);
        // $val = "'location:teachernotes.php?teacherid=$userid'";
        // header($val);

        ?>
        <script>
            alert("Assignment Successfully Submitted..")
            location.replace("teachernotes.php?teacherid=<?php echo $userid; ?>");
        </script>
        <?php 

    }

}

?>