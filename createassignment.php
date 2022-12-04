<?php  

include 'includes/connection.php';

if(isset($_POST['submit'])){

    $userid = $_GET['userid'];

    $title = $_POST['title'];
    $description = $_POST['description'];
    $duedate = $_POST['duedate'];

    $document = $_FILES['document'];


    $filename = $document['name'];
    $filepath = $document['tmp_name'];
    $fileerror = $document['error'];

    
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
        
        // $assign_dir = "db/teacher$userid/teacher".$userid."_assignment/" ;
        // $assign_folder_name = "teacher".$userid."_assignment_".$userid ;
        // if(!file_exists($assign_dir . $assign_folder_name)){
        //     @mkdir($assign_dir . $assign_folder_name, 0777);
        // }


        $destination = 'db/teacher'.$userid.'/'.$folder_name.'/'.$filename;

        move_uploaded_file($filepath,$destination);
        $tname = "teacher".$userid."_assignment";

        $insert = "INSERT INTO `$tname` (`title`, `description`, `due_date` , `file`) VALUES ('$title', '$description' , '$duedate' , '$destination')";
 
        $query = mysqli_query($con,$insert);

        header('location:profiles.php');

    }

}

?>