<div class="half">
      <h1>院線片清單</h1>
      <div class="rb tab" style="width:95%;display:flex;flex-wrap:wrap">
       
              <?php

$today=date("Y-m-d");
$ondate=date("Y-m-d",strtotime("-2 days"));

$all=$Movie->math('count','*',"where `sh`=1 && `ondate` between '$ondate' and '$today'");
$div=4;
$pages=ceil($all/$div);
$now=$_GET['p']??1;
$start=($now-1)*$div;
$rs=$Movie->all("where `sh`=1 && `ondate` between '$ondate' and '$today' order by `rank` limit $start,$div");
foreach($rs as $k=>$r){
   
              ?>
            <div style="width:49%;display:flex;">
              <div class="left">
                  <img src="../icon/<?=$r['poster'];?>" width="80px" height="150px">
              </div>
              <div class="right">
                <div><?=$r['name'];?></div>
                <div>分級：<img src="../icon/<?="03C0".$r['level'].".png";?>" alt=""></div>
                <div>上映日期：<?=$r['ondate'];?></div>
                <div>
                    <button type="button" onclick="location.href='?do=intro&id=<?=$r['id'];?>'">劇情簡介</button>
                    <button type="button" onclick="location.href='?do=ord&id=<?=$r['id'];?>'">線上訂票</button>
                </div>
                </div>
            </div>
            <?php
}
            ?>
          
</div>
        <div class="ct"> 
<?php
if(($now-1)>0){
    $pre=$now-1;
    echo "<a href='?do=movie&p=$pre'> &lt; </a>";
}
for($i=1;$i<=$pages;$i++){
    $s=$now==$i?"24px":"16px";
    echo "<a href='?do=movie&p=$i' style='font-size:$s'> $i </a>";
}
if(($now+1)<=$pages){
    $next=$now+1;
    echo "<a href='?do=movie&p=$next'> &gt; </a>";
}
?>

        
      </div>
    </div>