<style>
    .lists *,.controls *{
        box-sizing: border-box;
    }
    .lists{
        text-align: center;
        margin:auto;
    }
    .po{
        width:210px;
        position: absolute;
        display:none;
    }
    .controls{
        display: flex;
        align-items:center;
    }
    .icon{
        flex-shrink: 0;
        width:80px;
position:relative;
    }
    .icon img{
        width:100%;
        border:2px solid white;
    }
    .icon img:hover{
        border:2px solid blue;
    }
    .icons{

        width:320px;
        display: flex;
        overflow:hidden;
    }
</style>
<div class="half" style="vertical-align:top;">
      <h1>預告片介紹</h1>
      <div class="rb tab" style="width:95%;">
        <div id="abgne-block-20111227">
          <ul class="lists">
              <?php
              $pos=$Poster->all("where `sh`=1 order by `rank`");
foreach($pos as $k=>$p){
    echo "<div class='po' data-ani='{$p['ani']}'>";
echo "<img src='../img/{$p['path']}'>";
echo $p['name'];
    echo "</div>";
}
              ?>
          </ul>
          <ul class="controls">
              <button id="left" style="font-size:24px">&lt;</button>
              <?php
              echo "<div class='icons'>";
foreach($pos as $k=>$p){
    echo "<div class='icon'>";
echo "<img src='../img/{$p['path']}'>";
echo $p['name'];
    echo "</div>";
}
echo "</div>";
              ?>
              <button id="right" style="font-size:24px">&gt;</button>
          </ul>
        </div>
      </div>
    </div>

    <script>
        $('.po').eq(0).show();

        let slides;
        let all=$('.po').length;
        let i=0;
        let p=0;
        slide('start');
        function slide(status){
            switch(status){
                case "start":
                    slides=setInterval(()=>{
                    i++;
                    if(i>all-1){
                        i=0;
                    }
                    ani(i);
                    },2500);
                    break;
                case "stop":
                    clearInterval(slides);
                    break;
            }
        }
        $('.left,.right').on('click',function(){
            if($(this).hasClass('left')){
                if((p-1)>=0){
                p=p-1;
                }
            }else{
                if((p+1)<all-4){
                    p=p+1;
                }

            }
            $('.icon').animate({right:p*80});
        })
        function ani(n){
            next=$('.po').eq(n);
            ani=next.data('ani')
            now=$('.po:visible');
            switch(ani){
                case 1:
                    // 淡入淡出
                    now.fadeOut(2000);
                    next.fadeIn(2000);
                    break;
                case 2:
                    // 縮小
                    now.hide(1000,function(){
                        next.show(1000)
                    })
                    break;
                case 3:
                    // 滑入滑出
                    now.slideUp(1000,function(){
                        next.slideDown(1000)
                    })
                    break;
            }
        }
    </script>