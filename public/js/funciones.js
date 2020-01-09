// Toma el nombre del archivo que queremos subir y lo pone dentro del elemento con la clase info para que podamos verlo.

function change(){
  var pdrs = document.getElementById('file-upload').files[0].name;
  document.getElementById('info').innerHTML = pdrs;
}










// Stock por categoría

window.addEventListener('load',function(){
  function stockPorCategoria(){
  var categoryId = document.getElementById('categoryId');
  var tallesPorLetra = document.querySelectorAll('.tallesPorLetra');      //>>>>>>>getElementsByClassName<<<<<<<
  var tallesPorNumero = document.querySelectorAll('.tallesPorNumero');

     categoryId.addEventListener('change',function(){
      if (categoryId.value==1||categoryId.value==2||categoryId.value==4||categoryId.value==5||categoryId.value==6) {
        // por cada talle de top le quitamos a cada uno la classe hidden
        for (talle of tallesPorLetra) {
          talle.classList.remove("hidden");
          // y le agregamos la clase hidden al de pantalones, zapatillas etc
          for (talle of tallesPorNumero) {
            if (talle==tallesPorNumero[0]||talle==tallesPorNumero[5]) {
              talle.setAttribute('class', 'hidden col-4 col-md-2 offset-md-1 form-group')
            }
            else {
            talle.setAttribute('class', 'hidden tallesPorNumero col-4 col-md-2 form-group')
            }
          }
        }
      }
      // Viceversa a lo hecho arriba
      else{
        for (talle of tallesPorNumero) {
          talle.classList.remove("hidden");
          for (talle of tallesPorLetra) {
            if (talle==tallesPorLetra[0]) {
              talle.setAttribute('class', 'hidden col-4 col-md-2 offset-md-1 form-group')
            }
            else {
            talle.setAttribute('class', 'hidden tallesPorLetra col-4 col-md-2 form-group')
            }
          }
        }
      }
      // Si volvemos a seleccionar sin categoria, desaparece todo
      if (categoryId.value==0) {
        for (talle of tallesPorNumero) {
          talle.setAttribute('class', 'hidden tallesPorNumero col-4 col-md-2 form-group')
        }
        for (talle of tallesPorLetra) {
          talle.setAttribute('class', 'hidden tallesPorLetra col-4 col-md-2 form-group')
        }
      }

    }) // cierre del change de categoria
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
