<h1 class="ct">線上訂票</h1>


<table>
    <tr>
        <td>電影：</td>
        <td>
            <select name="movie" id="movie"></select>
        </td>
    </tr>
    <tr>
        <td>日期：</td>
        <td>
            <select name="date" id="date"></select>
        </td>
    </tr>
    <tr>
        <td>場次：</td>
        <td>
            <select name="session" id="session"></select>
        </td>
    </tr>
</table>
<div class="ct">
    <button>確定</button><button onclick="reset()">重置</button>
    
</div>

<script>
    let id=(new URL(location)).searchParams.get('id')
    getMovies(id)
function getMovies(id){
 $.post('api/get_movies.php',{id},(movies)=>{
     $('#movies').html(movies);
     getDays();
 })
}
function getDays(){
    id=$('#movies').val();
 $.post('api/get_days.php',{id},(days)=>{
     $('#days').html(days);
     getSessions();
 })
}
function getSessions(){
    id=$('#days').val();
 $.post('api/get_sessions.php',{id},(sessions)=>{
     $('#sessions').html(sessions);
     
 })
}
function reset(){
    getMovies(id)
}
$('#movies').on('change',()=>{getDays()})
$('#days').on('change',()=>{getSessions()})
</script>