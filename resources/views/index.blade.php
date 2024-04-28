<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="{{ asset('css/estilosIndex.css') }}">      
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">   
    <link rel="icon" href="./imagenes/logo.png" type="image/png">
    
    <title>Home</title>
</head>
<body>
    <header>              
        <img src="{{ url('imagenes/logo.png') }}" alt="imagen logo">    
        <div>
          <h2>Razon</h2>
          <h2>Social</h2>
        </div>    
        <button class="abrir-menu" id="abrirMenu"><i class="bi bi-list"></i></button>
        <nav class="nav" id="nav">
          <button class="cerrar-menu" id="cerrarMenu"><i class="bi bi-x-lg"></i></button>
          <ul class="listNav">
            <li><a href="">Menu</a></li>
            <li><a href="">Actualizar</a></li>
            <li><a href="{{route('vistaCrear')}}">Agregar Producto</a></li>
                         
            <a class="iconoQuienesSomos" id="iconoQuienesSomos" href="">
              <img src="{{ url('imagenes/usuario.png') }}" alt="imagen-acerca de mi"><h5>Acerca de mi</h5>          
            </a>
          </ul>           
         </nav>            
       </header> <!------------------------FIN HEADER------------------------------>
      
      <div class="contenedorPrincipal">
        <div class="containerCuadricula">          
            <ul>              
                <!----------------------------------------------------------------->
                @foreach ($producto as $item)
               
                @if ($item-> checkbox !== '' && $item-> checkbox !== null)
                <li>                  
                    <div class="tarjeta" id="tarjeta">
                        <div class="contImagenProducto">
                          <form action="POST" ></form>
                          <a href="{{ route('editar', ['producto' => $item-> id,])}}"><img src="{{asset('imagenes/'.$item-> imagen)}}" alt="Imagen producto"></a>
                        </div> 
                                                                
                        <div class="contSubtitulos"> 
                          <h5 style="display: none">No: {{$item-> orden}} </h5>            
                          <h5>{{$item -> nombrePlato}}</h5>
                         <h3>$ {{ number_format($item->precio, 0, ',', '.') }}</h3>
                         <input type="text" id="inputCheckbox" @if($item-> checkbox == 'on') value="Habilitado" 
                         @else value="Deshabilitado"  @endif>
                        </div>      
                      </div>                    
                </li>               
                @endif
                @endforeach   
                <!----------------------------------------------------------------->
                <li>
                  <div class="tarjeta" id="tarjeta">
                    <div class="contImagenProducto">
                      <a href="{{ route('vistaCrear')}}"><img src="{{asset('imagenes/add.svg')}}" alt="Imagen producto"></a>
                    </div> 
                                                            
                    <div class="contSubtitulos2">                             
                      <h5></h5>
                     <h3>Agregar un Producto</h3>                     
                    </div>      
                  </div>     
                </li>  
            </ul>         
        </div> <!--------------------FIN CONTAINER CUADRICULA---------------------->
        
       

        <div class="mapa">
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d995.619943610051!2d-76.49813543045074!3d3.4756230384195566!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8e30a7d3d02cbde7%3A0xfdc8bc32893db357!2sCra%201B3%20%2358a-29%2C%20Comuna%205%2C%20Cali%2C%20Valle%20del%20Cauca!5e0!3m2!1ses-419!2sco!4v1713501816640!5m2!1ses-419!2sco" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>               
                 
      </div> <!---------------------------FIN CONTENEDOR PRINCIPAL------------------------>     
      
       <footer>      
        <a href="https://www.instagram.com/" target="_blank">¡Siguenos!<img  src="{{ url('imagenes/IconoInstagram.png') }}" alt="iconoInstagram"></a>      
      </footer>
  <!-------------Aqui va todo el codigo javascript de la navBar-------------->  
 

  <script src="{{ asset('js/scripts.js') }}">     
    </script>
 
 
</body>
</html>
