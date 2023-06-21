@extends('dashboard.master')
@section('content')
    @include('dashboard.partials.validation-error')

    <div class="container">
        <h4 style="margin-top: 0.5em" class="centrar">Editar categoria</h4>
        <form action="{{ route("category.update", $category) }}" method="post">
            @method('put')
            @include('dashboard.category._form')
            <div class="row center">
                <div class="col s6">
                    <a class="btn btn-danger btn-sm" href="{{ route('category.index') }}">Cancelar</a>
                    <button class="btn btn-success btn-sm">Editar</button>
                </div>
            </div> 
        </form>
        
    </div>
@endsection