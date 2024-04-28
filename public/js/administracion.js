const btnInputFile = document.getElementById('btnInputFile');
const imagen1 = document.getElementById('imagen1');


//-----------------------vista previa de la imagen seleccionada por el input------------------
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
//--------------------Desaparecer boton cambiar imagen aparecer guardar------------------------

const btnImgCancelar = document.getElementById('btnImgCancelar');
const btnCambiarImagen = document.getElementById('btnCambiarImagen');
const contSubirImagen = document.getElementById('contSubirImagen');

   btnCambiarImagen.addEventListener('click', ()=>{      
   btnCambiarImagen.style.display = "none";
   contSubirImagen.style.display = "flex";
});
//---------------------MOSTRAR MENSAJE DE ALERTA PARA ELIMINAR REGISTROS--------------------------------------------------------------------------
 
// Obtener el formulario
const formEliminar = document.getElementById('formEliminar');

// Agregar un event listener para el envío del formulario
formEliminar.addEventListener('submit', (event) => {
// Prevenir el envío del formulario por defecto
    event.preventDefault();
 // Mostrar el cuadro de confirmación
    Swal.fire({
    title: "Esta segur@ de eliminar?",
    text: "si acepta No podra revertirlo!",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Si, Borrarlo!",
    cancelButtonText: "Cancelar"
  }).then((result) => {
     // Verificar si el usuario confirmó la eliminación
    if (result.isConfirmed) {
        Swal.fire({
        title: "Producto Eliminado!",
        text: "Su producto ha sido eliminado del sitio.",
        icon: "success" ,  
        allowOutsideClick: false,
        allowEscapeKey: false,
        allowEnterKey: false     
      }).then(() => {
        // Una vez que el usuario presiona el botón de "Ok", enviar el formulario
        formEliminar.submit();
    });        
    }   
  });  
});
//------------------MENSAJE DE ALERTA AL ACTUALIZAR EL PRODUCTO EN LA VISTA ADMINJISTRACION------------------------------------------------------------------

    function actualizado(mensaje){   
    Swal.fire({
    title: '¡Ok!',
    text: mensaje,
    icon: 'success',
    confirmButtonText: 'Aceptar'
});
    }
    function noActualizado(mensaje){  
       Swal.fire({
           title: '¡Oops!',
           text: mensaje,
           icon: 'error',
           confirmButtonText: 'Aceptar'
       });
}
//---------------------------------------------------------------------------------------------------

  