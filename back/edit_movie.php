<h1 class="ct">編輯院線片</h1>
<?php
$m=$Movie->find($_GET['id']);
?>
<form action="api/add_movie.php" method="post" enctype="multipart/form-data">
    <table>
        <tr>
            <td width="20%">影片資料</td>
            <td width="80%">
    <div>片名：<input type="text" name="name" value="<?=$m['name'];?>"></div>
    <div>分級：
        <select name="level" id="">
            <option value="1" <?=$m['level']==1?"selected":"";?>>普遍級</option>
            <option value="2" <?=$m['level']==2?"selected":"";?>>輔導級</option>
            <option value="3" <?=$m['level']==3?"selected":"";?>>保護級</option>
            <option value="4" <?=$m['level']==4?"selected":"";?>>限制級</option>
        </select>(請選擇分級)
    </div>
    <div>片長：<input type="text" name="length" value="<?=$m['length'];?>"></div>
    <?php
$e=explode("-",$m['ondate']);
$year=$e[0];
$month=$e[1];
$day=$e[2];
    ?>
    <div>上映日期：
        <select name="year" id="">
            <option value="2022" <?=$year=='2022'?'selected':"";?>>2022</option>
            <option value="2023" <?=$year=='2023'?'selected':"";?>>2023</option>
            <option value="2024" <?=$year=='2024'?'selected':"";?>>2024</option>
        </select>年
        <select name="month" id="">
            <?php
for($i=1;$i<=12;$i++){
    $s=$month==strval($i)?'selected':"";
    echo "<option value='$i' $s>$i</option>";
}
            ?>
        </select>月
        <select name="day" id="">
        <?php
for($i=1;$i<=31;$i++){
    $s=$day==strval($i)?'selected':"";
    echo "<option value='$i'>$i</option>";
}
            ?>
        </select>日
        </div>
    <div>發行商：<input type="text" name="publish" value="<?=$m['publish'];?>"></div>
    <div>導演：<input type="text" name="director" value="<?=$m['director'];?>"></div>
    <div>預告影片：<input type="file" name="trailer" id="trailer"></div>
    <div>電影海報：<input type="file" name="poster" id="poster"></div>
    
            </td>
        </tr>
        <tr>
            <td>劇情簡介</td>
            <td>
                <textarea name="intro" id="intro" cols="30" rows="10"><?=$m['intro'];?></textarea>
            </td>
        </tr>
    </table>
    <input type="hidden" name="id" value="<?=$m['id'];?>">
    <div class="ct">
        <input type="submit" value="編輯"><input type="reset" value="重置">
    </div>
</form>