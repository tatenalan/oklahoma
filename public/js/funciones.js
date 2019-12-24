// Toma el nombre del archivo que queremos subir y lo pone dentro del elemento con la clase info para que podamos verlo.

function change(){
  var pdrs = document.getElementById('file-upload').files[0].name;
  document.getElementById('info').innerHTML = pdrs;
} 
