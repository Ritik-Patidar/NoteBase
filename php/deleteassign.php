<?php

include '../includes/connection.php' ;

$id = $_GET['fileid'];
$tablename = $_GET['tname'];
$filename = $_GET['fname'];
$teacherid = $_GET['teacherid'];

// echo $filename ;
unlink("../".$filename);

$assigntable = $tablename.$id."_submission"; 

$deleteassigntable = "DROP TABLE `$assigntable`";
$rundeletequery = mysqli_query($con,$deleteassigntable);

$deletequery = "delete from $tablename where assign_id=$id";
$query = mysqli_query($con,$deletequery);


$dirPath = "../db/teacher".$teacherid."/".$tablename."/".$assigntable  ;


if (substr($dirPath, strlen($dirPath) - 1, 1) != '/') {
    $dirPath .= '/';
}
$files = glob($dirPath . '*', GLOB_MARK);
foreach ($files as $file) {
    if (is_dir($file)) {
        self::deleteDir($file);
    } else {
        unlink($file);
    }
}
rmdir($dirPath);



header('location:../profiles.php');

?>