@extends('dashboard.master')
@section('content')
    <div class="container">
        <h4 style="margin-top: 0.5em" class="centrar">Publicación {{ $post->id }}</h4>
        <div class="row">
            <br>
            <div class="form-group col-lg-8">
                <label for="title">Titulo</label>
                <input readonly class="form-control" type="text" name="name" id="name" value="{{ $post->name }}">
            </div>
            <div class="col-lg-4">
                <label for="category">Categoria</label>
                <br>
                <input readonly class="form-control" type="text" name="category" id="category"
                    value="{{ $post->category->name }}">
            </div>
            <div style="margin-top: 0.5em" class="form-group col-lg-12">
                <p style="text-align: justify";>
                    {!! nl2br($post->description) !!}
                </p>
            </div>
        </div>
        <div style="margin-left: 0.2em" class="container">
            <h6 style="font-style: italic;">Comentarios</h6>
            @foreach ($post->reply as $reply)
                <div style="font-style: italic; margin: 0.5em;" class="row border rounded">
                    <div class="col-lg-12">
                        <form id="{{ 'form' . $reply->id }}" action="{{ route('reply.update', $reply) }}" method="post">
                            @csrf
                            @method('PUT')
                            <textarea onmouseover="setSizeText({{ $reply->id }})" name="description" id="{{ 'area' . $reply->id }}" style="font-style: italic; margin:0.2em;" class="form-control" readonly>{{ $reply->text }}</textarea>
                        </form>
                    </div>
                    <div class="col-lg-1">
                        <button onclick="ActivarInput({{ $reply->id }})" id="{{ 'btn' . $reply->id }}" type="button"
                            style="cursor: pointer; margin: 0.5em;" class="btn btn-warning btn-sm">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-pencil" viewBox="0 0 16 16">
                                <path
                                    d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z" />
                            </svg>
                        </button>
                    </div>
                    <div class="col-lg-1">
                        <form action="{{ route('reply.destroy', $reply) }}" method="post">
                            @method('DELETE')
                            @csrf
                            <button type="submit" style="cursor: pointer; margin: 0.5em;" class="btn btn-danger btn-sm">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-trash3" viewBox="0 0 16 16">
                                    <path
                                        d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z" />
                                </svg>
                            </button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="row">
            <div class="col s6">
                <form action="{{ route('reply.store') }}" method="post">
                    @include('dashboard.partials.validation-error')
                    @include('dashboard.reply._form')
                    <input type="hidden" value="{{ $post->id }}" name="post_id" />
                    <button type="submit" style="font-style: italic;" class="btn btn-success btn-sm">Comentar</button>
                </form>
            </div>
        </div>
        <br>
        <div class="row center">
            <a class="btn btn-primary btn-sm" href="{{ route('post.index') }}">Regresar</a>
            <br />
        </div>
    </div>
    <br />
@endsection
<script>
    let editar = false
    function setSizeText(id){
        const text=document.getElementById('area'+id)
        const letras = text.value
        const size=Math.round(letras.length/130)
        text.rows=size+1
    }

    function ActivarInput(id) {
        if (editar == false) {
            editar = true
            document.getElementById('area' + id).removeAttribute('readonly');
            document.getElementById('btn' + id).setAttribute("class", "btn btn-success btn-sm");
        } else {
            enviarForm(id)
        }
    }

    function enviarForm(id) {
        document.getElementById('form' + id).submit()
    }
</script>
