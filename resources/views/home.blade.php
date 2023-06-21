@extends('layouts.app')
<div class="content">
</div>
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @auth
                
            @endauth
            <br><br>
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>
                <!-- {{ auth()->user() }} -->
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <br>
                    Bienvenido al sistema {{ auth()->user()->name }}
                    <br>
                    Rol {{ auth()->user()->getRoleNames()->first() }}
                    <br><br>
                    {{ __('You are logged in!') }}
                    <br><br>
                    <div style="text-align: center">
                        <a href="{{ route('post.index') }}" class="btn btn-success btn-lg">Ir a módulos</a>
                    </div>
                   
                    <br><br>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
