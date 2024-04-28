<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <link rel="stylesheet" href="{{ asset('css/estilosAdministracion.css') }}">  
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">   
    <title>Agregar Producto</title>
</head>
<body>
               
    <header class="headerAdmon">
        <h1>Agregar Producto</h1>
        <img id="imagenUsuario" src="{{ url('imagenes/cart.png') }}"> 
    </header>
    <div class="mainContainer">
        <div class="contenedorImagen">
            <div class="imagen1">
                <img id="imagen1" src="" alt="imagen producto"> 
            </div>                                  
        </div> 
        <br>
    <!-------------------------------------------------------------------------------------->     
    <button class="btnCambiarImagen" id="btnCambiarImagen">Agregar una Imagen <img src="{{url('imagenes/image.svg')}}" alt=""></button> 
     <!-- este boton no debe ir dentro del formulario POST porque al oprimirlo recarga la pagina-->
    <!-------------------------------------------------------------------------------------->
        <form method="POST" action="{{route('crearProducto')}}" enctype="multipart/form-data">
            @method ('put')
            @csrf   
            <div class="contSubirImagen" id="contSubirImagen"> 
               <input class="btnInputFile" id="btnInputFile" type="file" name="imagen"> 
                <br>                          
                <a class="btnImgCancelar" id="btnImgCancelar" href="">Cancelar</a>                      
            </div> 
            
            <label for="inputImagenLabel">Imagen:</label>            
            <input readonly disabled type="text" aria-describedby="imagenHelp" id="imagen" name="imagen" value="">                    
            <label for="No">No:</label>                
            <input type="number" required aria-describedby="ordenHelp" id="orden" name="orden" value="">  
            <label for="nombre">Nombre:</label>
            <input type="text" required aria-describedby="nombrePlatoHelp" id="nombrePlato" name="nombrePlato" value="" >
            <label for="precio">Precio:</label>
            <input type="number" required aria-describedby="precioHelp" id="precio" name="precio" value="">
            
               <div>
                    <input type="checkbox" id="checkbox" name="checkbox" @checked(true) > 
                    <label for="checkbox">Habilitado</label>                    
                </div>
                
            <button class="botonGuardarTodo" type="submit">Guardar <img src="{{url('imagenes/save.svg')}}" alt=""> </button>   
            <a class="enlaceVolver" href="{{route('index')}}"><button class="btnVolver" type="button">Volver <div class="iconoVolver"><img class="" src="{{url('imagenes/previous2.svg')}}" alt=""></div>  </button></a>       
                          
        </form>
    </div>  
    
   


<script src="{{ asset('js/addNew.js') }}"> 
</script>    
   
@if (session('alerta'))  
<script>    
  creado('{{ session('alerta') }}'); 
</script>
@elseif (session('error'))
<script>    
  noCreado('{{ session('error') }}');
</script>
@endif

</body>
</html>