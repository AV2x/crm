@extends('crm.layouts.app')

@section('content')

<h2 class="mb-4">Создание Категории </h2>
<form action="{{route('category.store')}}" method="post" style="max-width: 600px;" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
        <label for="formFile" class="form-label">Название</label>
        <input class="form-control" type="text" name="name">
    </div>
    <div class="mb-3">
        <label for="formFile" class="form-label">Картинка</label>
        <input class="form-control" type="file" id="formFile" name="file">
    </div>
    <div class="mb-3">
        <button type="submit" class="btn btn-primary">Создать</button>
    </div>
</form>

@endsection
