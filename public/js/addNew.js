
//--------------------DESAPARECER BOTON CAMBIAR IMAGEN APARECER BOTON CANCELAR------------------------
const btnImgCancelar = document.getElementById('btnImgCancelar');
const btnCambiarImagen = document.getElementById('btnCambiarImagen');
const contSubirImagen = document.getElementById('contSubirImagen');

   btnCambiarImagen.addEventListener('click', ()=>{      
   btnCambiarImagen.style.display = "none";
   contSubirImagen.style.display = "flex";
});

//---------------------VISTA PREVIA PRODUCTO--------------------------------------
const btnInputFile = document.getElementById('btnInputFile');
const imagen1 = document.getElementById('imagen1');

btnInputFile.addEventListener('change', (event)=>{

    let leer_img = new FileReader();
    let imagen1 = document.getElementById('imagen1');
   
    
    leer_img.onload =() =>{
       if(leer_img.readyState == 2){
          imagen1.src = leer_img.result;
         
       }
    }
 
    imagen.value = leer_img.readAsDataURL(event.target.files[0]);
 });

//----------------------------------MENSAJE CREAR PRODUCTO--------------------------------------

function creado(mensaje){   
    Swal.fire({
    title: '¡Ok!',
    text: mensaje,
    icon: 'success',
    confirmButtonText: 'Aceptar'
  });
    }
    function noCreado(mensaje){  
       Swal.fire({
           title: '¡Oops!',
           text: mensaje,
           icon: 'error',
           confirmButtonText: 'Aceptar'
       });
  }