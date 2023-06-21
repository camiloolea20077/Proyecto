@csrf
<div class="row">
    <br>
    <div class="form-group col-lg-8">
        <label for="title">Titulo</label>
        <input class="form-control" type="text" name="name" id="name" value="{{ $post->name }}">
    </div>
    <div class="col-lg-4">
        <label for="category">Categoria</label>
        <br>
        <select class="form-select" id="category_id" name="category_id" required  aria-label="Default select example">
            <option selected>Elija una opcion</option>
            @foreach ($categories as $item)
                <option 
                @if ($ifCategorySelected>=1)
                    @if ($post->category->id==$item->id)
                        selected="selected"
                    @endif
                @endif
                value="{{ $item->id }}">{{ $item->name }}</option>
            @endforeach
        </select>
    </div>
    <div style="margin-top: 0.5em" class="form-group col-lg-12">
        <label for="description">Descripción</label>
        <textarea class="form-control" id="description" name="description" rows="3">{{ $post->description }}</textarea>
    </div>
</div>
<br> 