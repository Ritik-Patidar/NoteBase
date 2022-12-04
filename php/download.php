<?php 

$file = "../".$_GET['file'];

$fname = basename($file);

header("content-disposition: attachment; filename=" .urlencode($fname));

$fb = fopen($file,"r");

while(!feof($fb)){
    echo fread($fb,8192);
    flush();
}

?>