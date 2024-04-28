<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <link rel="stylesheet" href="{{ url('css/estilosAdministracion.css') }}">  
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">   
    
    <title>Actualizar</title>
</head>
<body>
               
    <header class="headerAdmon">
        <h1>Actulizar</h1>
        <img id="imagenUsuario" src="{{ url('imagenes/settings.png') }}"> 
    </header>
    <div class="mainContainer">
        <div class="contenedorImagen">
            <div class="imagen1">
                <img id="imagen1" src="{{ url('imagenes/'.$producto-> imagen) }}" alt="imagen producto"> 
            </div>                                  
        </div> 
        <br>
    <!-------------------------------------------------------------------------------------->     
    <button class="btnCambiarImagen" id="btnCambiarImagen">Cambiar Imagen <img src="{{url('imagenes/image.png')}}" alt=""></button> 
     <!-- este boton no debe ir dentro del formulario POST porque al oprimirlo recarga la pagina-->
    <!-------------------------------------------------------------------------------------->
        <form method="POST" action="{{route('actualizar',['producto'=>$producto-> id])}}" enctype="multipart/form-data">
            @method ('put')
            @csrf   
            <div class="contSubirImagen" id="contSubirImagen"> 
               <input class="btnInputFile" id="btnInputFile" type="file" name="imagen"> 
                <br>                          
                <a class="btnImgCancelar" id="btnImgCancelar" href="">Cancelar</a>                      
            </div> 
            
            <label for="inputImagenLabel">Imagen:</label>            
            <input readonly disabled type="text" aria-describedby="imagenHelp" id="imagen" name="imagen" value="{{$producto-> imagen}}">                    
            <label for="No">No:</label>                
            <input type="number" required aria-describedby="ordenHelp" id="orden" name="orden" value="{{$producto-> orden}}">  
            <label for="nombre">Nombre:</label>
            <input type="text" required aria-describedby="nombrePlatoHelp" id="nombrePlato" name="nombrePlato" value="{{$producto-> nombrePlato}}" >
            <label for="precio">Precio:</label>
            <input type="number" required aria-describedby="precioHelp" id="precio" name="precio" value="{{$producto-> precio}}">
            <div>
                <input type="checkbox" id="checkbox" name="checkbox" @if($producto-> checkbox == 'on') checked @endif> 
                <label for="checkbox">Habilitado</label>                    
            </div>  
            <button class="botonGuardarTodo" type="submit">Guardar <img src="{{url('imagenes/save.png')}}" alt=""> </button>   
            <a class="enlaceVolver" href="{{route('index')}}"><button class="btnVolver" type="button">Volver <div class="iconoVolver"><img class="" src="{{url('imagenes/back.png')}}" alt=""></div></button></a>       
               
        </form>
        <form id="formEliminar" action="{{route('eliminarRegistro',['producto'=>$producto-> id])}}"
            method="POST">
            @method('delete')
            @csrf

            <button class="btnEliminar" id="btnEliminar" type="submit">Eliminar <img src="{{url('imagenes/remove.png')}}" alt=""> </button>        
        </form>       
    </div>  
       
<script src="{{ url('js/administracion.js') }}">
</script>  

<!-- estos scripts van despues de cargar el javascript no pueden ir antes porque no se ejecutan -->
@if (session('alerta'))  
   <script> actualizado('{{ session('alerta') }}');</script>
   @elseif (session('error'))
   <script>noActualizado('{{ session('error') }}');</script>
   @endif 
   @if(session('mensaje'))
   <script>  
    alertCreacionRegistro('{{ session('mensaje') }}');
  </script>
  @endif
</body>
</html>