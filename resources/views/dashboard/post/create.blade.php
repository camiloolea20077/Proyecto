@extends('dashboard.master')
@section('content')
    @include('dashboard.partials.validation-error')
    <div class="container">
        <h4 style="margin-top: 0.5em" class="centrar">Crear publicación</h4>
        <form action="{{ route('post.store')}}" method="post">
           @include('dashboard.post._form')
           <div class="row center">
            <div class="col s6">
                <a class="btn btn-danger btn-sm" href="{{ route('post.index') }}">Cancelar</a>
                <button class="btn btn-success btn-sm">Crear</button>
            </div>
        </div>    
        </form>
    </div>
@endsection