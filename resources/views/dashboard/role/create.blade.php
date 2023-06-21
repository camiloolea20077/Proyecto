@extends('dashboard.master')
@section('content')
    @include('dashboard.partials.validation-error')
    <div class="container">
        <br>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Crear nuevo rol') }}</div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('role.store') }}">
                            @include('dashboard.role._form')
                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Crear Rol') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection    