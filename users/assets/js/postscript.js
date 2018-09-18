/* Scroll to last chat message */
function autoScroll() {
  var x = document.getElementById("chatlogs");
//  x.scrollIntoView(false);
   x.scrollTo(0,5000,document.body.scrollHeight);
}
/* Refresh chat */
function msgReload(){
  var timeout = setTimeout("location.reload(true);",10000);
  function resetTimeout() {
    clearTimeout(timeout);
    timeout = setTimeout("location.reload(true);",10000);
  }
}
/* calling functions */
autoScroll();
msgReload();
setInterval(autoScroll, 10000);
