<button type="button" onclick="location.href='?do=add_movie'">新增電影</button>
<?php

?>
<div class="main">
    <?php
$rs=$Movie->all('order by `rank`');
foreach($rs as $k=>$r){

    if($k==0){
        $up=$r['id']."-".$r['id'];
        $down=$r['id']."-".$rs[$k+1]['id'];
    }
    if($k==(count($rs)-1)){
        $up=$r['id']."-".$rs[$k-1]['id'];
        $down=$r['id']."-".$r['id'];
    }
    if($k>0&&$k<(count($rs)-1)){
        $up=$r['id']."-".$rs[$k-1]['id'];
        $down=$r['id']."-".$rs[$k+1]['id'];
    }
    ?>
<div style="display:flex">
 <div>
     <img src="../img/<?=$r['poster'];?>" alt="">
 </div>
 <div>
     分級: <img src="../icon/03C0<?=$r['level'];?>.png" alt="">
 </div>
 <div>
      <div style="display:flex">
          <div>片名：<?=$r['name'];?></div>
          <div>片長：<?=$r['length'];?></div>
          <div>上映時間：<?=$r['ondate'];?></div>
      </div>
      <div>
          <button class="show" data-id="<?=$r['id'];?>">
          <?=$r['sh']==1?"顯示":"隱藏";?>
        </button>
          <button class="sw" data-sw="<?=$up;?>">往上</button>
          <button class="sw" data-sw="<?=$down;?>">往下</button>
<button type="button" onclick="location.href='?do=edit_movie&id=<?=$r['id'];?>'">編輯電影</button>
<button type="button" onclick="del('movie',<?=$r['id'];?>);">刪除電影</button>
      </div>
      <div>
劇情介紹：<?=$r['intro'];?>
      </div>
 </div>
</div>
<?php
}
?>
</div>
<script>
    function del(table,id){
        $.post('api/del.php',{table,id},function(){
            location.reload();
        })
    }
    $('.show').on('click',function(){
        id=$(this).data('id');
        $.post('api/show.php',{id},function(){
            location.reload();
        })
    })
    $('.sw').on('click',function(){
        id=$(this).data('sw').split('-');
        $.post('api/rank.php',{id,table:'movie'},function(){
            location.reload();
        })
    })
</script>