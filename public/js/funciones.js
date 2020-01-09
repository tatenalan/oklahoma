// Toma el nombre del archivo que queremos subir y lo pone dentro del elemento con la clase info para que podamos verlo.

function change(){
  var pdrs = document.getElementById('file-upload').files[0].name;
  document.getElementById('info').innerHTML = pdrs;
}






// Stock por categoría en vista add product

window.addEventListener('load',function(){
  function stockPorCategoria(){
    // Selecciono los talles de pantalon, los de tops y el input de categoria
  var categoryId = document.getElementById('categoryId');
  var tallesPorLetra = document.querySelectorAll('.tallesPorLetra');      //>>>>>>>getElementsByClassName<<<<<<<
  var tallesPorNumero = document.querySelectorAll('.tallesPorNumero');


  // Creo un evento que actue cuando cambia el value del input categoria
     categoryId.addEventListener('change',function(){
      if (categoryId.value==1||categoryId.value==2||categoryId.value==4||categoryId.value==5||categoryId.value==6) {


        // por cada talle de letra (xs, s, m.. etc) le quitamos a cada elemento la clase hidden
        for (talle of tallesPorLetra) {
          talle.classList.remove("hidden");
        }

        // y le agregamos la clase hidden a los talles numericos etc
        for (talle of tallesPorNumero) {
          talle.classList.add("hidden")
        }


      // por cada talle numerico (40, 42, 44, etc) le quitamos a cada elemento la clase hidden
      }else{

        for (talle of tallesPorNumero) {
          talle.classList.remove("hidden");
        }

        // y le agregamos la clase hidden a los tallespor letra etc
        for (talle of tallesPorLetra) {
          talle.classList.add("hidden")
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




  // Funcion de onSale
  function onSale(){
    var formulario = document.querySelector('.form-signup');
    var oferta = formulario[3];
    oferta.addEventListener('change', function(){
      divHijo = document.getElementById('descuento')
      if (document.getElementById('descuento')) {
        if (oferta.value == 1) {
          var divPadre = document.getElementById('ofertaDescuento');
          divHijo = document.getElementById('descuento')
          divHijo.setAttribute('class', 'col-6 col-lg-4 col-md-6 form-group')
          divHijo.setAttribute('id','descuento')
          var label = document.createElement('label');
          label.innerHTML = "Descuento: "
          var theInput = document.createElement('input');
          theInput.setAttribute('class','cantidad form-control')
          theInput.setAttribute('type','number')
          theInput.setAttribute('name','discount')
          theInput.setAttribute('max','80')
          theInput.setAttribute('min','10')
          theInput.setAttribute('step','5')
          theInput.setAttribute('value','0')
          divHijo.appendChild(label)
          divHijo.appendChild(theInput)
          divPadre.appendChild(divHijo)
          console.log(divPadre);
        }
        else {
          var divHijo = document.getElementById('descuento');
          divHijo.innerHTML = '';
        }
      }
      else {
      if (oferta.value == 1) {
        var divPadre = document.getElementById('ofertaDescuento');
        var divHijo = document.createElement('div');
        divHijo.setAttribute('class', 'col-6 col-lg-4 col-md-6 form-group')
        divHijo.setAttribute('id','descuento')
        var label = document.createElement('label');
        label.innerHTML = "Descuento: "
        var theInput = document.createElement('input');
        theInput.setAttribute('class','cantidad form-control')
        theInput.setAttribute('type','number')
        theInput.setAttribute('name','discount')
        theInput.setAttribute('max','80')
        theInput.setAttribute('min','10')
        theInput.setAttribute('step','5')
        theInput.setAttribute('value','0')
        divHijo.appendChild(label)
        divHijo.appendChild(theInput)
        divPadre.appendChild(divHijo)
        console.log(divPadre);
      }
      else {
        var divHijo = document.getElementById('descuento');
        divHijo.innerHTML = '';
      }
    }
    })
  }
  onSale();
}) //cierre windows.addEventListener('load')
