window.addEventListener('load',function(){
  var formulario = document.querySelector('form')
  var nombre = formulario[1]
  var apellido = formulario[2]
  var email = formulario[4]
  var password = formulario[5]
  var confirmarPassword = formulario[6]

  // Validaciones de nombre
  nombre.addEventListener('blur',function(){
  if (this.value == ''){
    var mensaje = document.querySelector('.nameText')
    mensaje.innerHTML = 'Por favor ingrese su nombre'
    console.log(mensaje);
    mensaje.style.color = 'red';
    mensaje.removeAttribute('hidden')
  } else {
    var mensaje = document.querySelector('.nameText')
    mensaje.setAttribute('hidden', '')
  }
  if (this.value.length<3 && this.value != ''){
    var mensaje = document.querySelector('.nameText')
    mensaje.innerHTML = 'El nombre debe tener al menos 3 letras'
    mensaje.style.color = 'red';
    mensaje.removeAttribute('hidden')
  }
})

// Validaciones de apellido
apellido.addEventListener('blur',function(){
if (this.value == ''){
  var mensaje = document.querySelector('.surnameText')
  mensaje.innerHTML = 'Por favor ingrese su apellido'
  mensaje.style.color = 'red';
  mensaje.removeAttribute('hidden')
} else {
  var mensaje = document.querySelector('.surnameText')
  mensaje.setAttribute('hidden', '')
}
if (this.value.length<3 && this.value != ''){
  var mensaje = document.querySelector('.surnameText')
  mensaje.innerHTML = 'El apellido debe tener al menos 3 letras'
  mensaje.style.color = 'red';
  mensaje.removeAttribute('hidden')
}
})


// Validaciones de email
email.addEventListener('blur',function(){
  if (this.value == ''){
    var mensaje = document.querySelector('.emailText')
    mensaje.innerHTML = 'Por favor ingrese su email'
    mensaje.style.color = 'red';
    mensaje.removeAttribute('hidden')
  } else {
    var mensaje = document.querySelector('.emailText')
    mensaje.setAttribute('hidden', '')
  }
  if (this.value.length<3 && this.value != ''){
    var mensaje = document.querySelector('.emailText')
    mensaje.innerHTML = 'El email debe tener al menos 3 letras'
    mensaje.style.color = 'red';
    mensaje.removeAttribute('hidden')
  }
  var expresionRegular = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/;
  if (expresionRegular.test(this.value)==false&&this.value.length>2 && this.value != '') {
    var mensaje = document.querySelector('.emailText')
    mensaje.innerHTML = 'Tu email debe tener un formato valido'
    mensaje.style.color = 'red';
    mensaje.removeAttribute('hidden')
  }
})
 // Validaciones password
password.addEventListener('blur',function(){
if (this.value == ''){
  var mensaje = document.querySelector('.passwordText')
  mensaje.innerHTML = 'Por favor ingrese su password'
  mensaje.style.color = 'red';
  mensaje.removeAttribute('hidden')
} else {
  var mensaje = document.querySelector('.passwordText')
  mensaje.setAttribute('hidden', '')
}
if (this.value.length<3 && this.value != ''){
  var mensaje = document.querySelector('.passwordText')
  mensaje.innerHTML = 'La contraseña debe tener al menos 6 caracteres'
  mensaje.style.color = 'red';
  mensaje.removeAttribute('hidden')
}
})

confirmarPassword.addEventListener('blur',function(){
if (this.value == ''){
  var mensaje = document.querySelector('.confirmPasswordText')
  mensaje.innerHTML = 'Por favor ingrese su confirmacion de password'
  mensaje.style.color = 'red';
  mensaje.removeAttribute('hidden')
} else {
  var mensaje = document.querySelector('.confirmPasswordText')
  mensaje.setAttribute('hidden', '')
}
console.log(password.value);
var mensaje = document.querySelector('.confirmPasswordText')
if (password.value!=this.value && this.value != ''){
  mensaje.innerHTML = 'Las contraseñas no coinciden'
  mensaje.style.color = 'red';
  mensaje.removeAttribute('hidden')
}
})

})
