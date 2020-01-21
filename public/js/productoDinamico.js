window.addEventListener('load',function(){
  // traemos al conjunto de imagenes
  imagenesPeque = document.querySelectorAll('.imagen-producto-peque')
  // Accedemos a cada imagen en particular mediante un forof
  for (imagen of imagenesPeque) {
    // a cada imagen le agregamos un evento on click


    // Reseteamos los cambios en las imagenes
    imagen.addEventListener('click', function(){
      for (imagen of imagenesPeque) {
        imagen.style.border = 'none';
        imagen.style.opacity = 1;
      }

      //Traemos la imagen princial
      imagenGrande = document.getElementById('imagenGran')
      //modificamos su src con el de la imagen seleccionada
      imagenGrande.src = this.src;

      // le aplicamos los cambios a la imagen seleccionada
      this.style.border = '3px #18BC9C solid';
      this.style.opacity = 0.8;
    })
  }
  // talle = document.querySelector('.talles');
  // cantidad = document.querySelector('.cantidad')
  // ordenar = document.querySelector('.botonOrdenar')
  // talle.addEventListener('change', function(){
  //   ordenar.type = 'button';
  //   ordenar.style.backgroundColor = 'grey'
  // })
  cantidad.addEventListener('change', function(){
    console.log(cantidad.value);
    console.log(talle.value);
    console.log(ordenar);
  })
})
