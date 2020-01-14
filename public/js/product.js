// Al clickear una miniatura cambia la imagen principal por la de la miniatura
function changeImage(){
  var imagenGrande = document.querySelector('.imagen-producto');
  var fotosChicas = document.querySelectorAll(".imagen-producto-peque");
  for (img of fotosChicas) {
    addEventListener('click', function(event){
        if(event.target.src != undefined)
          imagenGrande.src = event.target.src
    });
  }
  // Junto con unos cambios esteticos para indicar la seleccion

  // Reset de los cambios esteticos
  for (fotos of fotosChicas) {
    fotos.style.border = 'none';
    fotos.style.opacity = 1;
  }
  console.log(imagenGrande.src);
  var imgs = fotosChicas;
}
function confirmar(){
  var acepta = confirm('Esta seguro?');
  if (acepta==true){
    //ejecuto el boton
  }else{
    //no ejecuto nada
}
