function time(){
    var date = new Date();
    var hour  = date.getHours();
    var minutes = date.getMinutes();
    var seconds = date.getSeconds();

    var timeTag = document.getElementById("time");
    timeTag.innerHTML = hour + ":" + minutes + ":" + seconds;
}
setInterval("time()",1000);
