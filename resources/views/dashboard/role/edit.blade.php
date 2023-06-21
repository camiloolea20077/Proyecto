@extends('dashboard.master')
@section('content')
    @include('dashboard.partials.validation-error')
    <div class="container">
        <br>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Editar rol') }}</div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('role.update', $role) }}">
                            @method('put')
                            @csrf
                            <div class="row mb-3">
                                <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>
                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name', $role->name) }}" required autocomplete="name" autofocus>
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <label for="permission" >Permisos del rol</label>
                            <div class="row ">
                                @foreach ($permisos as $permiso)
                                <br> <br>
                                <div style="margin: 0.1em" class="col-lg-3 col-md-6 col-sm-12 col-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="permissions[]" value="{{ $permiso->id }}" {{ $role->permissions->contains($permiso->id) ? 'checked' : '' }}>
                                        <label class="form-check-label" >
                                            {{ $permiso->name }} 
                                        </label>
                                      </div>   
                                </div>
                                @endforeach
                            </div> 

                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Editar Rol') }}
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