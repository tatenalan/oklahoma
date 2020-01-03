window.addEventListener('load',function(){
  // Traigo los valores del formulario con los que voy a trabajar
  var formulario = document.querySelector('.form-signup')
  var estaEnOferta = formulario[4]
  var descuento = document.getElementById('descuento1')
  var categoria = document.getElementById('categoria')
  // Si hay un cambio en el campo de oferta
  estaEnOferta.addEventListener('change', function(){
    // Si se cambia el campo de oferta a verdadero, removemos el atributo hidden del div de descuento
    if (estaEnOferta.value==1) {
      descuento.removeAttribute("hidden",'false')
    }
    // Si se cambia el campo de oferta a falso, le agregamos el atributo hidden al div de descuento
    else {
      descuento.setAttribute("hidden",'true')
    }
  })

  // Si hay un cambio en la categoria
  categoria.addEventListener('change',function(){
    test = document.getElementById('test1');
    if (test) {
      var divTalles = document.getElementById('talles')
      divTalles.innerHTML= '';
    }
    var cantidad = document.querySelectorAll('.cantidad')
    console.log(cantidad.value);
    if (categoria.value==1||categoria.value==2||categoria.value==4||categoria.value==5) {
      // listado de talles
      var talles1 = ['xs','s','m','l','xl']
      // div padre
      var divTalles = document.getElementById('talles')
      console.log(talle1 , divTalles);
      for (var i = 0; i < talles1.length; i++) {
      // cada div hijo
      var cadaValor = document.createElement('div')
      var label = document.createElement('label')
      label.innerHTML = talles1[i].toUpperCase() + ': '
      if (i==0) {
        cadaValor.setAttribute('class','col-4 col-md-2 offset-md-1 form-group')
      }
      else {
        cadaValor.setAttribute('class','col-4 col-md-2 form-group')
      }
      var input = document.createElement('input')

      // armamos el input
      input.setAttribute('class','cantidad form-control')
      input.setAttribute('type','number')
      input.setAttribute('name',talles1[i])
      input.setAttribute('min','0')
      input.setAttribute('id','test'+i)
      input.setAttribute('max','100')
      input.setAttribute('step','1')
      input.setAttribute('value','0')

      // armamos el div
      cadaValor.appendChild(label)
      cadaValor.appendChild(input)
      divTalles.appendChild(cadaValor)
    }
    }
    if (categoria.value==3) {         // deberiamos hacer que los talles de pantalones y remeras esten creados con atributo hidden en value 0 ya que al crear producto es necesario enviarle un valor a cada columna (salvo que pongamos que pueda ser null en las migraciones de stock)
      test = document.getElementById('test1')
      if (test) {
        var divTalles = document.getElementById('talles')
        divTalles.innerHTML= '';
      }
      // div padre
      var divTalles = document.getElementById('talles')

      var talles2 = [30,32,34,36,38,40,42,44,46,48]

      for (var i = 0; i < talles2.length; i++) {
      // cada div hijo
      var cadaValor = document.createElement('div')
      var label = document.createElement('label')
      label.innerHTML = talles2[i] + ': '
      if (i==0||i==5) {
        cadaValor.setAttribute('class','col-4 col-md-2 offset-md-1 form-group')
      }
      else {
        cadaValor.setAttribute('class','col-4 col-md-2 form-group')
      }
      var input = document.createElement('input')

      // armamos el input
      input.setAttribute('class','cantidad form-control')
      input.setAttribute('type','number')
      input.setAttribute('name',talles2[i])
      input.setAttribute('min','0')
      input.setAttribute('max','100')
      input.setAttribute('id','test'+i)
      input.setAttribute('step','1')
      input.setAttribute('value','0')

      // armamos el div
      cadaValor.appendChild(label)
      cadaValor.appendChild(input)
      divTalles.appendChild(cadaValor)
    }
    }
  })
})
