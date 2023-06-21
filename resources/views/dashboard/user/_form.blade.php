@csrf
<div style="margin-top: 1em" class="row">
    <div class="form-group">
        <label for="name">Nombre</label>
        <input class="form-control" type="text" name="name" id="name" value="{{ old('name', $user->name) }}">
    </div>
</div>

<div class="row">
    <div class="form-group">
        <label for="surname">Apellidos</label>
        <input class="form-control" name="surname" id="surname" value="{{ old('surname', $user->surname) }}"/>
    </div>
</div>
<div class="row">
    <div class="form-group">
        <label for="email">Email</label>
        <input class="form-control" name="email" id="email" value="{{ old('email', $user->email) }}"/>
    </div>
</div>

<div class="row">
    <div class="form-group">
        <label for="password">Contraseña</label>
        <input class="form-control" name="password" id="password" />
    </div>
</div> 
<div class="row">
    <div class="form-group">
        <label for="password">Repetir contraseña</label>
        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
    </div>
</div>

<div class="row">
    <div class="form-group">
        <label for="rol">Asignar Rol</label>
        <br>
        <select name="role" class="form-select" >
            @foreach ($roles as $role)
                <option {{$role->name == $user->getRoleNames()->first() ? 'selected' : '' }} value={{ $role->id }}>{{ $role->name }}</option>
            @endforeach
        </select>
    </div>
</div>

<div class="col s6">
    <a class="btn btn-danger btn-sm"  href="{{ route('user.index')}}">Regresar</a>
    <input type="submit" value="Enviar" class="btn btn-success btn-sm">
</div>

<br> 