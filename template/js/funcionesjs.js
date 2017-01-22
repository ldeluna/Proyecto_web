 function validarEmail(email){
    
    var formato = /^[a-zA-Z]+([\.]?[a-zA-Z0-9_-]+)*@[a-z0-9]+([\.-]+[a-z0-9]+)*\.[a-z]{2,4}$/;
    email = email.replace(/\+/g, '\+');
    
    mostrarValidacion('#email',formato.test(email));
}
 
function validarNombreUsuario(nombreUsuario){
 
    var formato = /^[a-zA-Z0-9_-]{4,15}$/;
    nombreUsuario = nombreUsuario.replace(/\+/g, '\+');
    
    mostrarValidacion('#usuario',formato.test(nombreUsuario));
}
 
function validarNombre(nombre){
 
    var formato = /^[a-zA-Z áéíóúüÁÉÍÓÜÚ]{3,15}$/;
    nombre = nombre.replace(/\+/g, '\+');
    
    mostrarValidacion('#nombre',formato.test(nombre)|| nombre=='');
}
 
function validarApellidos(apellidos){
 
    var formato = /^[a-zA-Z áéíóúüÁÉÍÓÜÚ]{4,15}$/;
    apellidos = apellidos.replace(/\+/g, '\+');
    
    mostrarValidacion('#apellidos',formato.test(apellidos) || apellidos=='');
}
function validarDireccion(address){
 
    var formato = /^[a-zA-Z áéíóúüÁÉÍÓÜÚ]{4,15}$/;
    address = address.replace(/\+/g, '\+');
    
    mostrarValidacion('#address',formato.test(address) || address=='');
}
 function validarAdcional(addresss){
 
    var formato = /^[a-zA-Z áéíóúüÁÉÍÓÜÚ]{4,15}$/;
    addresss = addresss.replace(/\+/g, '\+');
    
    mostrarValidacion('#addresss',formato.test(addresss) || addresss=='');
}
function validarEdad(edad){
 
    var formato = /^[0-9]{1,3}$/;
    edad = edad.replace(/\+/g, '\+');
    
    mostrarValidacion('#edad',formato.test(edad)&& edad<=150 && edad>=5);
}
 
function validarTelefono(phone){
 
    var formato = /^[0-9]{9}$/;
    phone = phone.replace(/\+/g, '\+');
    
    mostrarValidacion('#phone',formato.test(phone) || phone=='');
}
 function validarPhoneMovil(phonemovil){
   
     var formato = /^[0-9]{9}$/;
    phonemovil = phonemovil.replace(/\+/g, '\+');
    
    mostrarValidacion('#phonemovil',formato.test(phonemovil)|| phonemovil=='');
}
function validarPassword(pass){
    pass = pass.replace(/\+/g, '\+');
    
    mostrarValidacion('#password',pass.length>=4);
}
 
function validarPasswordIguales(password,passwordRepetida){
    password = password.replace(/\+/g, '\+');
    passwordRepetida = passwordRepetida.replace(/\+/g, '\+');
    
    mostrarValidacion('#password2',password.length>=4 && password==passwordRepetida);
}
function validarCp(cp){
 
    var formato = /^[0-9]{1,3}$/;
    cp = cp.replace(/\+/g, '\+');
    
    mostrarValidacion('#cp',formato.test(cp)&& cp<=5 && cp>=1 || cp=='');
}
function mostrarValidacion(nombreCampo,valido){
    if (valido){
        $(document).ready(function(){
            $(nombreCampo).css('border','1px solid #7ca22c');
            $(nombreCampo).css('box-shadow','0 0 2px 1px #7ca22c');
        });
    }
    else{
        $(document).ready(function(){
            $(nombreCampo).css('border','1px solid red');
            $(nombreCampo).css('box-shadow','0 0 2px 1px red');
        }); 
    }
}
function validarNif(nif) {
  var numero;
  var let;
  var letra;
  var expresion_regular_dni;
 
  expresion_regular_nif = /^\d{8}[a-zA-Z]$/;
 
  if(expresion_regular_nif.test (nif) == true){
     numero = nif.substr(0,nif.length-1);
     let = nif.substr(nif.length-1,1);
     numero = numero % 23;
     letra='TRWAGMYFPDXBNJZSQVHLCKET';
     letra=letra.substring(numero,numero+1);
    if (letra!=let.toUpperCase()) {
       alert('Dni erroneo, la letra del NIF no se corresponde');
     mostrarValidacion('#nif','');
        }else{
       alert('Dni correcto');
     mostrarValidacion('#nif',letra=let.toUpperCase())}
  }else{
     alert('Dni erroneo, formato no válido');
     mostrarValidacion('#nif','')
   }
}
function validarProvincia(provincia){
 
    var formato = /^[a-zA-Z áéíóúüÁÉÍÓÜÚ]{3,15}$/;
    provincia = provincia.replace(/\+/g, '\+');
    
    mostrarValidacion('#provincia',formato.test(provincia)|| provincia=='');
}
function validarCiudad(ciudad){
 
    var formato = /^[a-zA-Z áéíóúüÁÉÍÓÜÚ]{3,15}$/;
    ciudad = ciudad.replace(/\+/g, '\+');
    
    mostrarValidacion('#ciudad',formato.test(ciudad)|| ciudad=='');
}
function validarPais(pais){
 
    var formato = /^[a-zA-Z áéíóúüÁÉÍÓÜÚ]{3,15}$/;
    pais= pais.replace(/\+/g, '\+');
    
    mostrarValidacion('#pais',formato.test(pais)|| pais=='');
}

