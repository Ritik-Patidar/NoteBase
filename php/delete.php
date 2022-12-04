<?php

include '../includes/connection.php' ;

$id = $_GET['fileid'];
$tablename = $_GET['tname'];
$filename = $_GET['fname'];
// echo $filename ;
unlink("../".$filename);

$deletequery = "delete from $tablename where id=$id";

$query = mysqli_query($con,$deletequery);

header('location:../profiles.php');

?>