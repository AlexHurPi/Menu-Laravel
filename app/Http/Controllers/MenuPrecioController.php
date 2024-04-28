<?php

namespace App\Http\Controllers;

use App\Models\MenuPrecio;
use Illuminate\Http\Request;
use App\Models\Producto;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\ValidationException;

class MenuPrecioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       // $producto = MenuPrecio::all()  
       $producto = DB::table('menuprecios') 
        ->orderBy('orden')
        ->get();
       return view('index', ['producto'=> $producto]);      
    }
   
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $MenuPrecio = new MenuPrecio();
        try {
            // Verificar si se cargó una nueva imagen
            if ($request->hasFile('imagen')) {
                // Validar y guardar la nueva imagen
                $request->validate([
                    'imagen' => 'image|mimes:jpeg,png,jpg,gif,svg,ico|max:2048',
                ]);
    
                $imagenNombre = $request->imagen->getClientOriginalName();
                $request->imagen->move(public_path('imagenes'), $imagenNombre);
                // Asignar el nombre de la nueva imagen
                $MenuPrecio->imagen = $imagenNombre;
            } else {
                // Si no se cargó una nueva imagen, mantener la imagen existente
                $imagenNombre = $MenuPrecio->imagen;
            }                
                
                $MenuPrecio->orden = $request->orden;
                $MenuPrecio->nombrePlato = $request->nombrePlato;
                $MenuPrecio->precio = $request->precio;       
                $MenuPrecio->checkbox = $request->checkbox;
                $MenuPrecio-> save();

                return Redirect::back()->with('alerta', '¡Registro creado con éxito!');
            } catch (ValidationException $e) {
                // Manejar la excepción de validación personalizada
                return Redirect::back()->with('error', 'No se creo el producto, Verifique la informacion ¡hay algun error!');
            }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {  
           
        $producto = MenuPrecio::find($id); 
          
       return view('administracion', ['producto'=> $producto]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {         
        $producto = MenuPrecio::find($id);

        $request->validate([
            'orden' => 'required',
            'nombrePlato' => 'required',
            'precio' => 'required|numeric',
        ]);    

        try {
            // Verificar si se cargó una nueva imagen
            if ($request->hasFile('imagen')) {
                // Validar y guardar la nueva imagen
                $request->validate([
                    'imagen' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
                ]);
    
                $imagenNombre = $request->imagen->getClientOriginalName();
                $request->imagen->move(public_path('imagenes'), $imagenNombre);
                // Asignar el nombre de la nueva imagen
                $producto->imagen = $imagenNombre;
            } else {
                // Si no se cargó una nueva imagen, mantener la imagen existente
                $imagenNombre = $producto->imagen;
            }
    
            // Actualizar los campos del producto
            $producto->orden = $request->orden;
            $producto->nombrePlato = $request->nombrePlato;
            $producto->precio = $request->precio;           
            $producto->checkbox = $request->checkbox;
            $producto->save();
    
            // Redirigir de vuelta con un mensaje de éxito
            return Redirect::back()->with('alerta', '¡Producto actualizado con éxito!');
        } catch (ValidationException $e) {
            // Manejar la excepción de validación personalizada
            return Redirect::back()->with('error', 'Algo salio mal, ¡tal vez no seleccionaste una imagen valida o hay algun error!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $producto = MenuPrecio::find($id);
        $producto-> delete();       
        
       return redirect()->route('index');      
    }   

    public function vistaCrear()
    {
        return view('addNew');
    }
    public function indexMensajeEliminar() {
        $producto = MenuPrecio::all();  
                
        return view('index', ['producto'=> $producto, 'mensaje' => 'Producto eliminado']);
    }
    

}
