<?php
include_once "../base.php";

dd($_POST);

dd($_FILES);
dd($_FILES);
if(!empty($_FILES['path']['tmp_name'])){
    move_uploaded_file($_FILES['path']['tmp_name'],"../img/".$_FILES['path']['name']);
    $_POST['path']=$_FILES['path']['name'];
    $maxid=$Poster->math('max','id');
    $_POST['rank']=$maxid+1;
    dd($_POST);
    $Poster->save($_POST);
}
to('../back.php?do=poster');
?>