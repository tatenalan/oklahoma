window.addEventListener('load',function(){
  var formulario = document.querySelectorAll('form')[1]
  var nombre = formulario[1]
  var apellido = formulario[2]
  var fechaDeNacimiento = formulario[3]
  var email = formulario[4]
  var password = formulario[5]
  var confirmarPassword = formulario[6]
  var terminosYCondiciones = formulario[9]
  var submitButton = formulario[11]
  // Validaciones de nombre
  console.log(formulario);
  nombre.addEventListener('blur',function(){
  if (this.value == ''){
    var mensaje = document.getElementById('nameText');
    mensaje.innerHTML = 'Por favor ingrese su nombre'
    mensaje.setAttribute('class','errorForm');
  } else {
    var mensaje = document.getElementById('nameText')
    mensaje.setAttribute('hidden', '')
  }
  if (this.value.length<3 && this.value != ''){
    var mensaje = document.getElementById('nameText')
    mensaje.innerHTML = 'El nombre debe tener al menos 3 letras'
    mensaje.setAttribute('class','errorForm');
    mensaje.removeAttribute('hidden')
  }
})

// Validaciones de apellido
apellido.addEventListener('blur',function(){
if (this.value == ''){
  var mensaje = document.getElementById('surnameText')
  mensaje.innerHTML = 'Por favor ingrese su apellido'
  mensaje.setAttribute('class','errorForm');
  mensaje.removeAttribute('hidden')
} else {
  var mensaje = document.getElementById('surnameText')
  mensaje.setAttribute('hidden', '')
}
if (this.value.length<2 && this.value != ''){
  var mensaje = document.getElementById('surnameText')
  mensaje.innerHTML = 'El apellido debe tener al menos 2 letras'
  mensaje.setAttribute('class','errorForm');
  mensaje.removeAttribute('hidden')
}
})


// Validaciones de email
email.addEventListener('blur',function(){
  var expresionRegular = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/;
  if (this.value == ''){
    var mensaje = document.getElementById('emailText')
    mensaje.innerHTML = 'Por favor ingrese su email'
    mensaje.setAttribute('class','errorForm');
    mensaje.removeAttribute('hidden')
  }
  else if (expresionRegular.test(this.value)==false&&this.value.length>0 && this.value != '') {
    var mensaje = document.getElementById('emailText')
    mensaje.innerHTML = 'Tu email debe tener un formato valido'
    mensaje.setAttribute('class','errorForm');
    mensaje.removeAttribute('hidden')
  }
  else {
    var mensaje = document.getElementById('emailText')
    mensaje.setAttribute('hidden', '')
  }
})
 // Validaciones password
password.addEventListener('blur',function(){
if (this.value == ''){
  var mensaje = document.getElementById('passwordText')
  mensaje.innerHTML = 'Por favor ingrese su password'
  mensaje.setAttribute('class','errorForm');
  mensaje.removeAttribute('hidden')
} else {
  var mensaje = document.getElementById('passwordText')
  mensaje.setAttribute('hidden', '')
}
if (this.value.length<6 && this.value != ''){
  var mensaje = document.getElementById('passwordText')
  mensaje.innerHTML = 'La contraseña debe tener al menos 6 caracteres'
  mensaje.setAttribute('class','errorForm');
  mensaje.removeAttribute('hidden')
}
})

// validaciones confirmar password
confirmarPassword.addEventListener('blur',function(){
  var mensaje = document.getElementById('confirmPasswordText')
if (this.value == ''){
  mensaje.innerHTML = 'Por favor ingrese su confirmacion de password'
  mensaje.setAttribute('class','errorForm');
  mensaje.removeAttribute('hidden')
} else {
  var mensaje = document.getElementById('confirmPasswordText')
  mensaje.setAttribute('hidden', '')
}
if (password.value == ''){
  var mensaje = document.getElementById('confirmPasswordText')
  mensaje.innerHTML = 'Por favor complete ambos campos'
  mensaje.setAttribute('class','errorForm');
  mensaje.removeAttribute('hidden')
}
var mensaje = document.getElementById('confirmPasswordText')
if (password.value!=this.value && this.value != ''){
  mensaje.innerHTML = 'Las contraseñas no coinciden'
  mensaje.setAttribute('class','errorForm');
  mensaje.removeAttribute('hidden')
}
})

formulario.addEventListener('submit', function(event){
  if (!terminosYCondiciones.checked) {
    var mensaje = document.getElementById('terminosYCondiciones')
    mensaje.setAttribute('class','errorForm');
    mensaje.removeAttribute('hidden');
    event.preventDefault();
  }
  else {
    mensaje.setAttribute('hidden');
  }
})

// Intento de validar edad
// fechaDeNacimiento.addEventListener('blur',function(){
//   if (fechaDeNacimiento.value) {
//     function calcularEdad(fechaDeNacimiento) {
//       var hoy = new Date();
//       var cumpleanos = new Date(fechaDeNacimiento);
//       var edad = hoy.getFullYear() - cumpleanos.getFullYear();
//       var m = hoy.getMonth() - cumpleanos.getMonth();
//
//       if (m < 0 || (m === 0 && hoy.getDate() < cumpleanos.getDate())) {
//         edad--;
//       }
//       return edad;
//     }
//     calcularEdad()
//   }
// })
})
