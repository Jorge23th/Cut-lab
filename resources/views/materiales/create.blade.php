
@extends('layouts.app')
@section('content')
<div class="container">






<form action="{{ url('/materiales') }}" method="post" enctype="multipart/form-data">
 @csrf   
 @include('materiales.formulario',['modo'=>'Crear'])
   

 
</form>
</div>
@endsection
