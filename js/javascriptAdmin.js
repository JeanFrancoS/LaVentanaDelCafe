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
(function (document) {
  "filter";

  var FilterTable = (function (Arr) {
    var _input;
    function _onInputEvent(e) {
      _input = e.target;
      var tables = document.getElementsByClassName(
        _input.getAttribute("data-table")
      );
      Arr.forEach.call(tables, function (table) {
        Arr.forEach.call(table.tBodies, function (tbody) {
          Arr.forEach.call(tbody.rows, _filter);
        });
      });
    }
    function _filter(row) {
      var text = row.textContent.toLowerCase(),
        val = _input.value.toLowerCase();
      row.style.display = text.indexOf(val) === -1 ? "none" : "table-row";
    }
    return {
      init: function () {
        var inputs = document.getElementsByClassName("table");
        Arr.forEach.call(inputs, function (input) {
          input.oninput = _onInputEvent;
        });
      },
    };
  })(Array.prototype);

  document.addEventListener("readystatechange", function () {
    if (document.readyState == "complete") {
      FilterTable.init();
    }
  });
})(document);
