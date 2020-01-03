window.addEventListener('load',function(){
  var formulario = document.querySelector('.form-signup')
  var categoria = formulario[5]

categoria.addEventListener('change',function(){
  test = document.getElementById('test1');
  if (test) {
    var divTalles = document.getElementById('talles')
    divTalles.innerHTML= '';
  }
  if (categoria.value==1||categoria.value==2||categoria.value==4||categoria.value==5) {
    // listado de talles
    var talles1 = ['xs','s','m','l','xl']
    // div padre
    var divTalles = document.getElementById('talles')

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
var oferta = formulario[3]
oferta.addEventListener('change', function(){
  divHijo = document.getElementById('descuento')
  if (document.getElementById('descuento')) {
    if (oferta.value == 1) {
      var divPadre = document.getElementById('ofertaDescuento')
      divHijo = document.getElementById('descuento')
      divHijo.setAttribute('class', 'col-6 col-lg-4 col-md-6 form-group')
      divHijo.setAttribute('id','descuento')
      var label = document.createElement('label')
      label.innerHTML = "Descuento: "
      var theInput = document.createElement('input')
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
      var divHijo = document.getElementById('descuento')
      divHijo.innerHTML = '';
    }
  }
  else {
  if (oferta.value == 1) {
    var divPadre = document.getElementById('ofertaDescuento')
    var divHijo = document.createElement('div')
    divHijo.setAttribute('class', 'col-6 col-lg-4 col-md-6 form-group')
    divHijo.setAttribute('id','descuento')
    var label = document.createElement('label')
    label.innerHTML = "Descuento: "
    var theInput = document.createElement('input')
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
    var divHijo = document.getElementById('descuento')
    divHijo.innerHTML = '';
  }
}
})
})

// <div class="col-4 col-md-2 offset-md-1 form-group">
//   <label for="">XS: </label>
//   <input class="cantidad form-control" type="number" name="xs" min="0" max="100" step="1" value="0" >
// </div>
