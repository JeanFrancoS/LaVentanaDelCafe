// const menu = document.getElementById("navMenu");
// // const indicador = document.getElementById("asdMenu");
// const secciones = document.querySelectorAll(".seccionMenu");
// let indexSeccionActiva;

// const observer = new IntersectionObserver(
//   (entradas, observer) => {
//     entradas.forEach((entrada) => {
//       secciones.forEach((seccion) => observer.observe(seccion));
//       if (entrada.isIntersecting) {
//         // indexSeccionActiva = secciones.indexOf(entrada.target);
//         console.log(indexSeccionActiva);
//       }
//     });
//   },
//   {
//     rootMargin: "0px 0px 0px 0px",
//     threshold: 0.2,
//   }
// );
// secciones.forEach((seccion) => observer.observe(seccion));

const btnLeft = document.querySelector(".btn-left");
const btnRight = document.querySelector(".btn-right");
const sliderSection = document.querySelectorAll(".slider-section");
const slider = document.querySelector("#slider");

btnLeft.addEventListener("click", (e) => moveToLeft());
btnRight.addEventListener("click", (e) => moveToRight());

setInterval(() => {
  moveToRight();
}, 3000);

let operacion = 0;
let widthImg = 100 / sliderSection.length;
let counter = 0;

function moveToRight() {
  if (counter >= sliderSection.length - 1) {
    operacion = 0;
    counter = 0;
    slider.style.transform = `translate(-${operacion}%)`;
    slider.style.transition = "none";
  } else {
    counter++;
    operacion = operacion + widthImg;
    slider.style.transform = `translate(-${operacion}%)`;
    slider.style.transition = "all ease .6s";
  }
}
function moveToLeft() {
  counter--;
  if (counter < 0) {
    operacion = widthImg * (sliderSection.length - 1);
    counter = sliderSection.length - 1;
    slider.style.transform = `translate(-${operacion}%)`;
    slider.style.transition = "none";
  } else {
    operacion = operacion - widthImg;
    slider.style.transform = `translate(-${operacion}%)`;
    slider.style.transition = "all ease .6s";
  }
}
