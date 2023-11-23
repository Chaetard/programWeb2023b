const registroAbono = document.getElementById("registroAbono");
const IMG = document.getElementById("imgPrincipal");

console.log("Cargando menuDinamico.js");


registroAbono.addEventListener("mouseover", () => {
  console.log("Mouse over registrado en registroAbono");

  // Verificar si los elementos existen
  if (!IMG) {
    console.error("No se pudo encontrar el elemento con id 'imgPrincipal'");
    return;
  }

  // Cambiar la imagen
  IMG.src = "../imagenes/pay.svg";
  console.log("Imagen cambiada a pay.svg");
});
