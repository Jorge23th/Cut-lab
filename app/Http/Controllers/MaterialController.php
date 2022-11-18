<?php

namespace App\Http\Controllers;



use App\Models\Material;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MaterialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response;
     */
    public function index()
    {
        //
        $datos['materiales']=Material::paginate(4);
        return view('materiales.index',$datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response;
     */
    public function create()
    {
        //
        return view('materiales.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //hace la validacion
        $campos=['Nombre_Material'=>'required|string|max:100',
                  'Cantidad'=>'required|string|max:100',
                  'Descripcion' =>'required|string|max:100',
                  'Marca'=>'required|string|max:100',
                  'Etiqueta'=>'required|string|max:100',
                   'Imagen'=>'required|max:1000|mimes:jpeg,png,jpg',

        ];
        $mensaje=[
                   'required'=>'El :attribute es requerido',
                   'Imagen.required'=>'La imagen es Requerida'

                ];
        $this->validate($request,$campos,$mensaje);
       //  $datosMateriales = request()->all();
       $datosMateriales = request()->except('_token');
       if($request->hasFile('Imagen')){
        $datosMateriales['Imagen']=$request->file('Imagen')->store('uploads','public');


       }

       
       
       Material::insert($datosMateriales);
     
       
      // return response()->json($datosMateriales);
      return redirect('materiales')->with('mensaje','Material Registrado con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Material;  $material
     * @return \Illuminate\Http\Response;
     */
    public function show(Material $material)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Material; $material
     * @return \Illuminate\Http\Response;
     */
    public function edit($id)
    {
        
        //
        $material = Material::findOrfail($id);
        return view('materiales.edit', compact('material'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Material  $material
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $campos=['Nombre_Material'=>'required|string|max:100',
        'Cantidad'=>'required|string|max:100',
        'Descripcion' =>'required|string|max:100',
        'Marca'=>'required|string|max:100',
        'Etiqueta'=>'required|string|max:100',
       

];
$mensaje=[
         'required'=>'El :attribute es requerido',
        

      ];
      if($request->hasFile('Imagen')){

      $campos=[  'Imagen'=>'required|max:1000|mimes:jpeg,png,jpg',];
      $mensaje =[ 'Imagen.required'=>'La imagen es Requerida'];
      }
$this->validate($request,$campos,$mensaje);
      



        //
        $datosMateriales = request()->except(['_token','_method']);
      
        if($request->hasFile('Imagen')){
            $material = Material::findOrfail($id);
            Storage::delete('public/'.$material->Imagen);

            $datosMateriales['Imagen']=$request->file('Imagen')->store('uploads','public');
        }
    
        Material::where('id','=',$id)->update($datosMateriales);
       
        $material = Material::findOrfail($id);
       // return view('materiales.edit' , compact('material'));
        
        return redirect('materiales')->with('mensaje','Material Actualizado' );

    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Material  $material
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $material = Material::findOrfail($id);

        if(Storage::delete('public/'.$material->Imagen)){

            Material::destroy($id);
        }
        
        return redirect('materiales')->with('mensaje','Material Eliminado' );
    }
}
