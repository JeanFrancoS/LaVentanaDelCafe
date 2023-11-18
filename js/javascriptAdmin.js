const file = document.getElementById("imagen");
const img = document.getElementById("imgSinCargar");

const defaultFile = "../assets/img/GetImagenProducto.jpg";

if (file != null) {
  file.addEventListener("change", (e) => {
    if (e.target.files[0]) {
      const reader = new FileReader();
      reader.onload = function (e) {
        img.src = e.target.result; //tambien puede ser reader.result
      };
      reader.readAsDataURL(e.target.files[0]);
    } else {
      img.src = defaultFile;
    }
  });
}
$(document).ready(function () {
  $(".eliminar").click(function () {
    if (window.confirm("¿Desea dar de baja el producto?")) {
      alert("Se dió de baja.");
    } else {
      return false;
    }
  });
});

$(document).ready(function () {
  $(".alta").click(function () {
    if (window.confirm("¿Desea dar de alta el producto?")) {
      alert("Se dió de alta.");
    } else {
      return false;
    }
  });
});
