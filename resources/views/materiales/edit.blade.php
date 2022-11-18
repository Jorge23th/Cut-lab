@extends('layouts.app')
@section('content')
<div class="container">



<form action="{{url('/materiales/'.$material->id)}}" method="post" enctype="multipart/form-data">
@csrf
{{method_field('PATCH')}}
   

@include('materiales.formulario',['modo'=>'Editar'])
</form>
</div>
@endsection