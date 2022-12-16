document.getElementById("formulario").addEventListener("submit", function (e) {
  e.preventDefault();

  let formulario = new FormData(document.getElementById("formulario"));

  fetch("registro.php", {
    method: "POST",
    body: formulario,
  })
    .then((res) => res.json())
    .then((data) => {
      if (data == "true") {
        document.getElementById("txt_nombre").value = "";
        document.getElementById("txt_apellido").value = "";
        document.getElementById("txt_dni").value = "";
        document.getElementById("txt_autoritzo").value = "";
        document.getElementById("txt_noAutoritzo").value = "";
        // alert("El usuario se insertó correctamente.");

        Swal.fire({
          position: "top-center",
          icon: "success",
          title: "Les dades s'han desat amb èxit.",
          showConfirmButton: false,
          timer: 5000,
        });
      } else {
        console.log(data);
      }
    });
});
