<?php

include_once  "../base.php";

if(!empty($_FILES['path']['tmp_name'])){
    move_uploaded_file($_FILES['path']['tmp_name'],"../img/".$_FILES['path']['name']);
    $_POST['path']=$_FILES['path']['name'];
    $id=$Poster->math('max','id');
    $_POST['rank']=$id+1;
    $Poster->save($_POST);
}
to('../back.php?do=poster');
