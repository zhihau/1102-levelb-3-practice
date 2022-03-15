<?php

include_once  "../base.php";

$DB=new DB($_POST['table']);
dd($_POST);
$r1=$Poster->find($_POST['id'][0]);
$r2=$Poster->find($_POST['id'][1]);
dd($r1);
dd($r2);
$tmp=$r1;
$r1['rank']=$r2['rank'];
$r2['rank']=$tmp['rank'];
dd($r1);
dd($r2);
$Poster->save($r1);
$Poster->save($r2);


