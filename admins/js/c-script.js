function time(){
    var date = new Date();
    var hour  = date.getHours();
    var minutes = date.getMinutes();
    var seconds = date.getSeconds();

    var timeTag = document.getElementById("time");
    timeTag.innerHTML = hour + ":" + minutes + ":" + seconds;
}
/* Toggle between adding and removing the "responsive" class to topnav when the user clicks on the icon */
function myFunction() {
    var x = document.getElementById("myTopnav");
    if (x.className === "topnav") {
        x.className += " responsive";
    } else {
        x.className = "topnav";
    }
}
/* Toggle tutorials list */
function displayList(){
  var x = document.getElementById("tutorial-list");
  if(x.classList.contains('list')){
    x.style.display = "block";
    x.classList.remove('list');
  }else{
    x.style.display = "none";
    x.classList.add('list');
  }
}
function displayList1(){
  var x = document.getElementById("tutorial-list1");
  if(x.classList.contains('list')){
    x.style.display = "block";
    x.classList.remove('list');
  }else{
    x.style.display = "none";
    x.classList.add('list');
  }
}
function displayList2(){
  var x = document.getElementById("tutorial-list2");
  if(x.classList.contains('list')){
    x.style.display = "block";
    x.classList.remove('list');
  }else{
    x.style.display = "none";
    x.classList.add('list');
  }
}
function displayList3(){
  var x = document.getElementById("tutorial-list3");
  if(x.classList.contains('list')){
    x.style.display = "block";
    x.classList.remove('list');
  }else{
    x.style.display = "none";
    x.classList.add('list');
  }
}
function displayList4(){
  var x = document.getElementById("tutorial-list4");
  if(x.classList.contains('list')){
    x.style.display = "block";
    x.classList.remove('list');
  }else{
    x.style.display = "none";
    x.classList.add('list');
  }
}
function displayList5(){
  var x = document.getElementById("tutorial-list5");
  if(x.classList.contains('list')){
    x.style.display = "block";
    x.classList.remove('list');
  }else{
    x.style.display = "none";
    x.classList.add('list');
  }
}
/*Previews image before uploading */
function previewFile(){
       var preview = document.querySelector('img'); //selects the query named img
       var file    = document.querySelector('input[type=file]').files[0]; //sames as here
       var reader  = new FileReader();

       reader.onloadend = function () {
           preview.src = reader.result;
       }

       if (file) {
           reader.readAsDataURL(file); //reads the data as a URL
       } else {
           preview.src = "photo/user.png";
       }
  }

setInterval("time()",1000);
