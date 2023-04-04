function loadUserOnline(){
    $.get("functions.php?onlineusers=result",function(data){

        $(".online").text(data);

    });
}
setInterval(function (){
    loadUserOnline();
},500);
