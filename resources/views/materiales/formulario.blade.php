<h1>{{$modo}} Material</h1>
@if(count($errors)>0)
 
 <div class="alert alert-danger" role="alert">

    <ul>
        @foreach($errors->all() as $error)
         <li> {{$error}} </li>
         @endforeach 
    </ul>
 </div>

 

@endif


<div class="mb-3">
      <label for="Nombre_Material" class="form-label" >Nombre Material</label>
      
      <input type="text"
        class="form-control" name="Nombre_Material" id="nombre_material" aria-describedby="helpId" placeholder="" 
        value="{{isset ($material->Nombre_Material)?$material->Nombre_Material:old('Nombre_Material')}}">
    
    </div>
    <div class="mb-3">
      <label for="Cantidad" class="form-label">Cantidad</label>
      <input type="text"
        class="form-control" name="Cantidad" id="cantidad" aria-describedby="helpId" placeholder=""
        
        value="{{isset($material->Cantidad)?$material->Cantidad:old('Cantidad')}}">
     
    </div>
     <div class="mb-3">
       <label for="Descripcion" class="form-label">Descripcion</label>
       <input type="textarea"
         class="form-control" name="Descripcion" id="descripcion" aria-describedby="helpId" placeholder=""
         value="{{isset($material->Descripcion)?$material->Descripcion:old('Descripcion')}}">
       
     </div>
     <div class="mb-3">
       <label for="Etiqueta" class="form-label">N.O Etiqueta</label>
       <input type="text"
         class="form-control" name="Etiqueta" id="etiqueta" aria-describedby="helpId" placeholder=""
         value="{{isset ($material->Etiqueta)?$material->Etiqueta:old('Etiqueta')}}">
      
     </div>
     <div class="mb-3">
       <label for="Marca" class="form-label">Marca</label>
       <input type="text"
         class="form-control" name="Marca" id="Marca" aria-describedby="helpId" placeholder=""
         value="{{isset($material->Marca)?$material->Marca:old('Marca')}}">
      
     </div>
     <div class="mb-3">
       <label for="Imagen" class="form-label">Imagen</label>
       @if(isset($material->Imagen))
      
       <img class="img-thumbnail img-fluid"src="{{asset('storage').'/'.$material->Imagen}}" class="img-fluid rounded-top" alt="" width="300">
       @endif       
       <input type="file"
         class="form-control" name="Imagen" id="imagen" aria-describedby="helpId" placeholder=""
         >
       
     </div>
     <div class="mb-3">
       <label for="Enviar" class="form-label"></label>
       <input class="btn btn-success "type="submit" value="{{$modo}} Datos" >


       <a class="btn btn-primary" href="{{url('materiales/')}}">Regresar</a>
     
     </div>