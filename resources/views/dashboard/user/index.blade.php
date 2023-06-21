@extends('dashboard.master')
@section('content')
    <div class="row justify-content.center">
        <div class="container table-responsive">
        <h4 class="centrar" style="margin-top: 0.5em">Lista de usuarios</h4>
        <br>
        @can('crear-usuarios')
            <a href="{{ route('user.create')}}" class="btn btn-success">Registrar usuario</a>
            <br>
        @endcan
        <br> 
        <table class="table table-hover">
            <thead class="thead-dark">
              <tr>
                <th scope="col">Id</th>
                <th scope="col">Nombre</th>
                <th scope="col">Apellido</th>
                <th scope="col">Correo</th>
                <th scope="col">Rol</th>
                <th scope="col">Creación</th>
                <th scope="col">Actualización</th>
                <th scope="col">Acciones</th>
              </tr>
            </thead>
              
            <tbody>
                @foreach ($users as $item)
                  <tr>
                    <th scope="row">{{ $item->id }}</th>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->surname }}</td>
                    <td>{{ $item->email }}</td>
                    
                    <td>
                      @if (!@empty($item->getRoleNames()))
                          @foreach ($item->getRoleNames() as $rolName)
                             <span>{{ $rolName }}</span>
                          @endforeach 
                    @endif
                    </td>
                    <td>{{ $item->created_at->format('d-m-Y') }}</td>
                    <td>{{ $item->updated_at->format('d-m-Y') }}</td>
                    <td> 
                       @can('editar-usuarios')
                        <a href="{{ route('user.edit', $item->id)}}" class="btn btn-primary">Editar</a>
                       @endcan
                       @can('eliminar-usuarios')
                        <button data-toggle="modal" data-target="#deleteModal"  data-id="{{ $item->id }}" class="btn btn-outline-danger">
                          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                              <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
                          </svg>
                        </button>
                       @endcan 
                    </td>
                  </tr>  
                @endforeach
            </tbody>
          </table>

          <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="modalLabel"></h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <p id="modalTitle">¿Seguro que desea borrar el usuario seleccionado?</p>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  
                  <form id="formDelete" method="POST" action="{{ route('user.destroy', 0) }}" data-action="{{ route('user.destroy', 0) }}">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="btn btn-danger">Borrar</button>
                  </form>
                </div>
              </div>
            </div>
          </div>

          @push('script')
            <script>
              $(document).ready(function(){    
                $('#deleteModal').on('show.bs.modal', function(event){
                var button = $(event.relatedTarget)
                var id = button.data('id')
                action= $('#formDelete').attr('data-action').slice(0, -1)
                action +=id
                $('#formDelete').attr('action', action)
                var title= $('#modalTitle').text('Vas a borrar el usuario con id '+id)
                });
              }) 

            
            </script>
          @endpush
    </div>  
@endsection