<?php  

include 'includes/connection.php';

if(isset($_POST['submit'])){

    $userid = $_GET['userid'];

    $title = $_POST['title'];
    $document = $_FILES['document'];


    $filename = $document['name'];
    $filepath = $document['tmp_name'];
    $fileerror = $document['error'];

    
    if($fileerror == 0){

        $output_dir = "db/" ;
        $folder_name = "teacher".$userid ;
        if(!file_exists($output_dir . $folder_name)){
            @mkdir($output_dir . $folder_name, 0777);
        }

        $destination = 'db/'.$folder_name.'/'.$filename;

        move_uploaded_file($filepath,$destination);
        $tname = "teacher".$userid;
        $insert = "INSERT INTO `$tname` (`title`, `document`) VALUES ('$title', '$destination')";
        $query = mysqli_query($con,$insert);

        header('location:profiles.php');

    }

}

?>