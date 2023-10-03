const file = document.getElementById("imagen");
const img = document.getElementById("imgSinCargar");

const defaultFile = "../assets/img/GetImagenProyecto.jpg";

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
