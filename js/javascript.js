/* HEADER */
const header = document.querySelector(".menu");
const headerHeight = header.offsetHeight;

window.addEventListener("scroll", () => {
  if (window.pageYOffset > headerHeight) {
    header.classList.add("sticky");
  } else {
    header.classList.remove("sticky");
  }
});

const btnLeft = document.querySelector(".btn-left");
if (btnLeft != null) {
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
}

/* MENU */
document.addEventListener("DOMContentLoaded", () => {
  const seccionMenu = document.querySelectorAll(".seccionMenu");
  const linkTipoAlimento = document.querySelectorAll(".navMenu .ul li a");
  if (seccionMenu.length > 0 && linkTipoAlimento.length > 0) {
    // console.log(linkTipoAlimento);
    window.onscroll = () => {
      seccionMenu.forEach((sec) => {
        let top = window.scrollY;
        let offset = sec.offsetTop - 150;
        let height = sec.offsetHeight;
        let id = sec.getAttribute("id");

        if (top >= offset && top < offset + height) {
          linkTipoAlimento.forEach((links) => {
            links.classList.remove("active");
            if (links.getAttribute("href") === `#${id}`) {
              links.classList.add("active");
            }
          });
        }
      });
    };
  }
});

// const funcionObserver = (entries) => {
//   entries.forEach((entry) => {
//     if (entry.isIntersecting) {
//       console.log("pasa");
//       const itemActual = Array.from(linkTipoAlimento).find(
//         (item) => item.dataset.url === entry.target.id
//       );
//       itemActual.classList.add("active");
//       console.log("pasa");
//       console.log(itemActual);
//       for (const item of linkTipoAlimento) {
//         if (item != itemActual) {
//           item.classList.remove("active");
//         }
//       }
//     }
//   });
// };

// const observer = new IntersectionObserver(funcionObserver, {
//   root: null,
//   rootMargin: "0px",
//   threshold: 0.8,
// });

// seccionMenu.forEach((seccion) => observer.observe(seccion));
