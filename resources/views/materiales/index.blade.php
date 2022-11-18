@extends('layouts.app')
@section('content')
<div class="container">

@if(Session::has('mensaje'))
<div class="alert alert-dismissible" role="alert">
{{Session::get('mensaje')}}
@endif 
<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
</button> 
</div>





@if(Session::has('mensaje'))
{{Session::get('mensaje')}}
@endif 


<a href="{{url('materiales/create')}}" class="btn btn-success">Registrar Nuevo Material</a>
 <br>
 <br>


<div class="col-md-8">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Imagen</th>
                                <th>Nombre Material</th>
                                <th >Cantidad </th>
                                <th >Descripcion</th>
                                <th >Marca</th>
                                <th >Etiqueta</th>
                                <th >Fecha/Entrada</th>
                                <th >Fecha/salida</th>
                                <th >Acciones</th>
                            </tr>
                        </thead>
                        <tbody id="mt">
                         @foreach ($materiales as $material)
                        <tr>
                        
                         <td>{{ $material->id}}</td>
                         <td> 
                            <img class="img-thumbnail img-fluid "src="{{asset('storage').'/'.$material->Imagen}}" class="img-fluid rounded-top" alt="">
                         
                         </td>
                         <td>{{ $material->Nombre_Material}}</td>
                         <td>{{$material->Cantidad}}</td>
                         <td>{{$material->Descripcion}}</td>
                         <td>{{$material->Marca}}</td>
                         <td>{{$material->Etiqueta}}</td>
                         <td>{{$material->create_at}}</td>
                         <td>{{$material->updated_at}}</td>
                         <td>
                            
                         <a href="{{url('/materiales/'.$material->id.'/edit')}}" class="btn btn-warning">
                               Editar 
                           </a>  
                            
                         
                         
                         
                         
                         <form action="{{url('/materiales/'.$material->id)}}"  method="post" class="d-inline" >
                         @csrf
                         {{method_field('DELETE')}}
                       
                        <input class="btn btn-danger" type='submit' onclick="return confirm ('¡Deseas Eliminar Material?')" value="Borrar">
                        
                        </form>
                        
                        </td>


                        </tr>

                         @endforeach


                            </tbody>
                    </table>
                    {!! $materiales->links()!!}
                </div>
                

            </div>

        </div>

    </div>
</div>
@endsection