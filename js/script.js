let userBox = document.querySelector('.header .header-2 .user-box');

document.querySelector('#user-btn').onclick = () =>{
   userBox.classList.toggle('active');
   navbar.classList.remove('active');
}

let navbar = document.querySelector('.header .header-2 .navbar');

document.querySelector('#menu-btn').onclick = () =>{
   navbar.classList.toggle('active');
   userBox.classList.remove('active');
}
window.onscroll = () =>{
   userBox.classList.remove('active');
   navbar.classList.remove('active');

   if(window.scrollY > 60){
      document.querySelector('.header .header-2').classList.add('active');
   }else{
      document.querySelector('.header .header-2').classList.remove('active');
   }
}

function shp() {
   var x = document.getElementById("password");
   var show_eye = document.getElementById("show_eye");
   var hide_eye = document.getElementById("hide_eye");
   hide_eye.classList.remove("none");
   if (x.type === "password") {
     x.type = "text";
     show_eye.style.display = "block";
     hide_eye.style.display = "none";
   } else {
     x.type = "password";
     show_eye.style.display = "none";
     hide_eye.style.display = "block";
   }
 }
 function cshp() {
   var a = document.getElementById("cpassword");
   var show_eye = document.getElementById("rshow_eye");
   var hide_eye = document.getElementById("rhide_eye");
   hide_eye.classList.remove("none");
   if (a.type === "password") {
     a.type = "text";
     show_eye.style.display = "block";
     hide_eye.style.display = "none";
   } else {
     a.type = "password";
     show_eye.style.display = "none";
     hide_eye.style.display = "block";
   }
 }