  //ASIGNACION DE VALORES A VARIABLE
var slideIndex = 1;
showSlides(slideIndex);

//PRIMERA FUNCION DE EVENTO

function plusSlides(n) {
  showSlides(slideIndex += n);
}
//EVENTO 2
function currentSlide(n) {
  showSlides(slideIndex = n);
}
//EVENTO 3
function showSlides(n) {
  var i;
  //PRIMER VARIABLE
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("dot");
  if (n > slides.length) {slideIndex = 1}   
  //CONDICIONES IF 
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";  
  }
  for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" active", "");
  }
  //ASIGNACION DE CONDICIONES SI SE CUMPLEN O NO
  slides[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " active";
}