<div class="custom-file">
    <input name="image" type="file" class="custom-file-input" id="customFile">
    <label class="custom-file-label"  for="customFile">Choose file</label>
</div>

<div class="form-group">
    <label for="category_id">Categoria del producto</label>
    <select
      name="category_id"
      id="category_id"
      class="form-control border-0 bg-light shadow-sm"
    >
       <option value="">Seleccione</option>
       @foreach($categories as $id => $name)
          <option value="{{ $id }}"
          @if($id== old('category_id',$products->category_id)) selected @endif
          >{{ $name }}</option>
       @endforeach
    </select>

</div>


<div class="form-group">
    <label for="title">Titulo del producto </label>
    <input class="form-control border-0 bg-light shadow-sm"
        type="text"
        name="title"
        value="{{ old('title',$products->title)}}"
    >
</div>

<div class="form-group">
    <label for="url">URL del producto</label>
    <input class="form-control border-0 bg-light shadow-sm"
    type="text"
    name="url"
    value="{{ old('title',$products->url)}}"
    >

</div>

<div class="form-group">
    <label for="url">Precio</label>
    <input class="form-control border-0 bg-light shadow-sm"
    type="number"
    name="cost"
    value="{{ old('title',$products->cost)}}"
    >

</div>

<div class="form-group">
    <label for="description">Descripcion del producto</label>
        <textarea class="form-control border-0 bg-light shadow-sm"
        name="description"
        >{{ old('description',$products->description)}}</textarea>

</div>

<button class="btn btn-primary btn-lg btn-block">{{ $btnText }}</button>
<a class="btn btn-link btn-block" href="{{ route('products.index') }}">Cancelar</a>





