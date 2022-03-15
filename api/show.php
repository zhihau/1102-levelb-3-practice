<?php

include_once  "../base.php";


$m=$Movie->find($_POST['id']);

$m['sh']=($m['sh']+1)%2;

$Movie->save($m);