@csrf
<div class="row mb-3">
    <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>
    <div class="col-md-6">
        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
        @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>
<label for="permission" >Permisos del rol</label>
<div class="row ">
    @foreach ($permisos as $id=>$permiso)
    <br> <br>
    <div style="margin: 0.1em" class="col-lg-3 col-md-6 col-sm-12 col-3">
        <div class="form-check">
            <input class="form-check-input" type="checkbox" name="permission[]" value="{{ $id+1 }}" >
            <label class="form-check-label" >
                {{ $permiso->name }} 
            </label>
          </div>   
    </div>
    @endforeach
</div>                           