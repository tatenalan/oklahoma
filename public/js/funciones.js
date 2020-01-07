// Toma el nombre del archivo que queremos subir y lo pone dentro del elemento con la clase info para que podamos verlo.

function change(){
  var pdrs = document.getElementById('file-upload').files[0].name;
  document.getElementById('info').innerHTML = pdrs;
}










// Stock por categoría

// window.addEventListener('load',function(){
//
//   var categoryId = document.getElementById('categoryId');
//   var tallesPorLetra = document.getElementById('tallesPorLetra');      >>>>>>>getElementsByClassName<<<<<<<
//   var tallesPorNumero = document.getElementById('tallesPorNumero');
//   console.log(tallesPorLetra);
//
//      categoryId.addEventListener('change',function(){
//       if (categoryId.value==1||categoryId.value==2||categoryId.value==4||categoryId.value==5) {
//         tallesPorLetra.classList.remove("hidden");
//       }else{
//         tallesPorNumero.classList.remove("hidden");
//       }
//
//       console.log(categoryId.value);
//     })
//
// })
