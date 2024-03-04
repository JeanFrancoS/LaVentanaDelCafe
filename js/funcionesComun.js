const nav = document.querySelector("#navHeader");
const abrir = document.querySelector("#btnHamburguesa");
const cerrar = document.querySelector("#btnCerrarHamburguesa");

abrir.addEventListener("click", () => {
  nav.classList.add("visible");
});
cerrar.addEventListener("click", () => {
  nav.classList.remove("visible");
});

$(document).ready(function () {
  var altura = $("#navMenu").offset();
  if (altura != null) {
    $(window).on("scroll", function () {
      const navMenu = document.querySelector("#navMenu");
      if ($(window).scrollTop() > altura) {
        $(navMenu.classList.add("menu-fixed"));
      } else {
        $(navMenu.classList.remove("menu-fixed"));
      }
    });
  }
});
