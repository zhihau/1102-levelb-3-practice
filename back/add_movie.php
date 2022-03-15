<h1 class="ct">新增院線片</h1>
<form action="api/add_movie.php" method="post" enctype="multipart/form-data">
    <table>
        <tr>
            <td width="20%">影片資料</td>
            <td width="80%">
    <div>片名：<input type="text" name="name" id="name"></div>
    <div>分級：
        <select name="level" id="">
            <option value="1">普遍級</option>
            <option value="2">輔導級</option>
            <option value="3">保護級</option>
            <option value="4">限制級</option>
        </select>(請選擇分級)
    </div>
    <div>片長：<input type="text" name="length" id="length"></div>
    <div>上映日期：
        <select name="year" id="">
            <option value="2022">2022</option>
            <option value="2023">2023</option>
            <option value="2024">2024</option>
        </select>年
        <select name="month" id="">
            <?php
for($i=1;$i<=12;$i++){
    echo "<option value='$i'>$i</option>";
}
            ?>
        </select>月
        <select name="day" id="">
        <?php
for($i=1;$i<=31;$i++){
    echo "<option value='$i'>$i</option>";
}
            ?>
        </select>日
        </div>
    <div>發行商：<input type="text" name="publish" id="publish"></div>
    <div>導演：<input type="text" name="director" id="director"></div>
    <div>預告影片：<input type="file" name="trailer" id="trailer"></div>
    <div>電影海報：<input type="file" name="poster" id="poster"></div>
    
            </td>
        </tr>
        <tr>
            <td>劇情簡介</td>
            <td>
                <textarea name="intro" id="intro" cols="30" rows="10"></textarea>
            </td>
        </tr>
    </table>
    <div class="ct">
        <input type="submit" value="新增"><input type="reset" value="重置">
    </div>
</form>