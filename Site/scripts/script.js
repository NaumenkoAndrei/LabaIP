let header_burger = document.querySelectorAll('.header_burger,.header_link');
let header_menu = document.querySelector('.header_menu');
let back = document.querySelector('body');

header_burger.forEach(function (item){
  item.onclick = function () {
    item.classList.toggle('active');
    header_menu.classList.toggle('active');
    back.classList.toggle('lock');
  }
});




let numimg=1;
const countimg=12;
const countdiv=100;
const speed=10;

function genImg(){
  let widthdiv=450/countdiv;
  let img="../images/"+numimg+".jpg";
  for(let i=0;i<countdiv;i++){
    let item=$("<div></div>");
    item.addClass("uwu");
    item.css("width",widthdiv+"px");
    item.css("background-image",'url('+img+')');
    item.css("background-size",'450px');
    item.css("background-position-x",-i*widthdiv+"px");
    $("#mainImage").append(item);

  }
}
function changeImg(){
  let img="../images/"+numimg+".jpg";
  let i=1;
  $("#mainImage div").each(function (){
    $(this).fadeOut(speed*i,function(){
      $(this).css("background-image",'url('+img+')');
      $(this).fadeIn(speed*i);
    });
    i++;
  })
}
function leftChangeImage(){
  if(numimg>1)
    numimg--;
  else
    numimg=countimg;
  changeImg();
}
function rightChangeImage(){
  if(numimg<countimg)
    numimg++;
  else
    numimg=1;
  changeImg();
}
$(document).ready(function(){
  genImg();
})