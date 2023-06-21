@extends('dashboard.master')
@section('content')
    <div class="row justify-content.center">
        <div class="container table-responsive">
        <h4 class="centrar" style="margin-top: 0.5em">Roles</h4>
        @can('crear-roles')
          <a href="{{ route('role.create')}}" class="btn btn-success">Agregar rol</a>
          <br> <br>
        @endcan
        <table class="table table-hover">
            <thead class="thead-dark">
              <tr>
                <th scope="col">Id</th>
                <th scope="col">Rol</th>
                <th scope="col">Permisos</th>
                @can('editar-roles')
                  <th scope="col">Editar</th>
                @endcan
                @can('eliminar-roles')
                  <th scope="col">Eliminar</th>
                @endcan
              </tr>
            </thead>
            <tbody>
                @forelse ($roles as $item)
                  <tr>
                    <th scope="row">{{ $item->id }}</th>
                    <td>{{ $item->name }}</td>
                    <td>
                      @forelse ($item->permissions as $permiso)
                        <span class="badge text-bg-info border">
                            {{ $permiso->name }}
                        </span>
                      @empty
                        No tiene permisos.
                      @endforelse
                    </td>
                     @can('editar-roles')
                        <td> 
                            <a href="{{ route('role.edit', $item->id)}}" class="btn btn-primary">Editar</a>
                        </td>
                      @endcan
                      @can('eliminar-roles')
                        <td> 
                          <button data-toggle="modal" data-target="#deleteModalRol"  data-id="{{ $item->id }}" class="btn btn-outline-danger">
                              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                  <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
                              </svg>
                          </button>
                        </td>
                      @endcan
                  </tr>  
                @empty
                  No hay registros.
                @endforelse
            </tbody>
          </table>

          <div class="modal fade" id="deleteModalRol" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                  
                  <form id="formDeleteRol" method="POST" action="{{ route('role.destroy', 0) }}" data-action="{{ route('role.destroy', 0) }}">
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
                $('#deleteModalRol').on('show.bs.modal', function(event){
                var button = $(event.relatedTarget)
                var id = button.data('id')
                action= $('#formDeleteRol').attr('data-action').slice(0, -1)
                action +=id
                $('#formDeleteRol').attr('action', action)
                var title= $('#modalTitle').text('Vas a borrar el rol con id '+id)
                });
              }) 
            </script>
          @endpush
    </div>  
@endsection