// Toma el nombre del archivo que queremos subir y lo pone dentro del elemento con la clase info para que podamos verlo.
// esta funcion la utilizamos para cambiar la fachada del input file y poder seguir viendo los nombres de los archivos subidos.

function change(){
  var pdrs = document.getElementById('file-upload').files[0].name;
  document.getElementById('info').innerHTML = pdrs;
}

// scrollea lentamente hacia la posicion 0 de la ventana
  function scrollToTop() {
    window.scrollTo({top: 0, behavior: 'smooth'});
  }



window.addEventListener('load',function(){


  // Stock por categoría en vista add product
  function stockPorCategoria(){
    // Selecciono el select de los talles de pantalon, el de los de tops y el div de categoria que tiene la clase hidden
    var categoryId = document.getElementById('categoryId');
    var tallesPorLetra = document.querySelectorAll('.tallesPorLetra');      //>>>>>>>getElementsByClassName<<<<<<<
    var tallesPorNumero = document.querySelectorAll('.tallesPorNumero');
    var inputAlfabetico = document.querySelectorAll('.inputAlfabetico');
    var inputNumerico = document.querySelectorAll('.inputNumerico');

      // Creo un evento que actue cuando cambia el value del input categoria
      categoryId.addEventListener('change',function(){
      if (categoryId.value==1||categoryId.value==2||categoryId.value==4||categoryId.value==5||categoryId.value==6) {


        // por cada talle de letra (xs, s, m.. etc) le quitamos a cada elemento la clase hidden
        for (talle of tallesPorLetra) {
          talle.classList.remove("hidden");
        }

        // le agregamos la clase hidden a los talles numericos y le reseteamos su value a 0 etc
        for (talle of tallesPorNumero) {
          talle.classList.add("hidden")
        }
        for (input of inputNumerico) {
          input.value=0;
        }


      // por cada talle numerico (40, 42, 44, etc) le quitamos a cada elemento la clase hidden
      }else{

        for (talle of tallesPorNumero) {
          talle.classList.remove("hidden");
        }

        // le agregamos la clase hidden a los talles por letra y le reseteamos su value a 0 etc
        for (talle of tallesPorLetra) {
          talle.classList.add("hidden")
        }
        for (input of inputAlfabetico) {
          input.value=0;
        }

      } //cierro if



      // Si volvemos a seleccionar sin categoria, desaparece todo
      if (categoryId.value==0) {
        // oculto los talles por numero
        for (talle of tallesPorNumero) {
          talle.classList.add("hidden")
        }
        // oculto los talles por letra
        for (talle of tallesPorLetra) {
          talle.classList.add("hidden")
        }
      }

    }) // cierre del evento change de categoria
  } // cierre de la funcion stockPorCategoria
  stockPorCategoria();



  // Creacion de input descuento en vista add product
  function onSale(){
    // Selecciono el select con id onSale y el div de discount que tiene la clase hidden
    var onSale = document.getElementById('onSale');
    var discount = document.getElementById('discount');
    var inputDiscount = document.getElementById('inputDiscount');

        // Creo un evento que actue cuando cambia el value del input onSale
        onSale.addEventListener('change',function(){
          if (onSale.value==1) {
            discount.classList.remove("hidden");
            console.log(inputDiscount.value);
          } else {
            discount.classList.add("hidden");
            inputDiscount.value=0;
            console.log(inputDiscount.value);
            console.log(discount);
          }
    }) // cierre del evento change de onSale
  }// cierre de la funcion onSale
  onSale();

  // function hideForm(){
  //   var rowennn = document.getElementById("row");
  //   var button = document.getElementById("submit");
  //   console.log(rowennn);
  //
  //     button.addEventListener("click", function(){
  //       rowennn.classList.add("hidden");
  //       document.getElementById("text").innerText = "Gracias por enviarnos tu consulta";
  //
  //     });
  // }
  // hideForm();
  
}) //cierre windows.addEventListener('load')
