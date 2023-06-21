@extends('dashboard.master')

@section('content')
<h4 class="centrar">Usuario</h4>
<div class="row">
    <div class="form-group">
        <label for="name">Nombre</label>
        <input readonly class="form-control" type="text" name="name" id="name" value="{{  $user->name }}">
    </div>
</div>  
<div class="row">   
    <div class="form-group">
        <label for="apellido">Apellido</label>
        <input readonly class="form-control" type="text" name="apellido" id="apellido" value="{{  $user->surname }}">
    </div>
</div>
<div class="row">   
    <div class="form-group">
        <label >Email</label>
        <input readonly class="form-control" type="text" name="apellido" id="apellido" value="{{  $user->email }}">
    </div>
</div>   
@endsection