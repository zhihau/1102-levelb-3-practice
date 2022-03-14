<h1 class="ct">預告片清單</h1>

<form action="api/edit_poster.php" method="post">
    <table>
        <tr>
            <td>預告片海報</td>
            <td>預告片片名</td>
            <td>預告片排序</td>
            <td>操作</td>
        </tr>
        <?php
        $rs=$Poster->all('order by `rank`');
        foreach($rs as $k=>$r){
            $c=$r['sh']==1?"checked":"";

            $prev=($k!=0)?$rs[$k-1]['id']:$r['id'];
            $next=($k!=(count($rs)-1))?$rs[$k+1]['id']:$r['id'];
        ?>
        <tr>
            <td><img src="../img/<?=$r['path'];?>" alt=""></td>
            <td><input type="text" name="name[]" value="<?=$r['name'];?>"></td>
            <td>
            <button type="button" data-rank="<?=$r['id']."-".$prev;?>">往上</button>
            <button type="button" data-rank="<?=$r['id']."-".$next;?>">往下</button></td>
            <td>
                <input type="checkbox" name="sh[]" value="<?=$r['id'];?>" <?=$c;?>>顯示
                <input type="checkbox" name="del[]" value="<?=$r['id'];?>">刪除
                <select name="ani[]">
                    <option value="1" <?=$r['ani']==1?"selected":"";?>>淡入淡出</option>
                    <option value="2" <?=$r['ani']==2?"selected":"";?>>縮放</option>
                    <option value="3" <?=$r['ani']==3?"selected":"";?>>滑入滑出</option>
                </select>
            </td>
            <input type="hidden" name="id[]" value="<?=$r['id'];?>">
        </tr>
        <?php
        }
        ?>
    </table>
    <div class="ct">
        <input type="submit" value="編輯確定"><input type="reset" value="重置">
    </div>
</form>

<h1 class="ct">新增預告片海報</h1>

<form action="api/add_poster.php" method="post" enctype="multipart/form-data">

<div class="ct">
    <div>預告片海報<input type="file" name="path" id="path"></div>
    <div>預告片片名<input type="text" name="name" id="name"></div>
    <div>
        <input type="submit" value="新增"><input type="reset" value="重置">
    </div>
</div>
</form>
<script>
    $('button').on('click',function(){
        let id=$(this).data('rank').split('-');

        $.post('api/rank.php',{id,"table":'poster'},function(){
            location.reload();
        })
    })
</script>