<?php

include_once  "../base.php";

$today=date("Y-m-d");
$ondate=date("Y-m-d",strtotime("-2 days"));

$ms=$Movie->all("where `sh`=1 and `ondate` between '$ondate' and '$today'");

foreach($ms as $m){
    $s=$m['id']==$_POST['id']?'selected':"";
 echo "<option value='{$m['id']}' $s>{$m['name']}</option>";
}