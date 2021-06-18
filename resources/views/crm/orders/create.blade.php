
@extends('crm.layouts.app')

@section('content')
<h2 class="mb-4">Создание заказа </h2>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form action="{{route('order.store')}}" method="POST" style="max-width: 600px;">
    @csrf
    <div id="products">
        <div class="form-row">
            <div class="form-group col-md-6">
                <label class="form-label">Товар</label>
                <select name="product[1][product_id]" class="form-control">
                    @foreach($products as $product)
                    <option value="{{$product->id}}">{{$product->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group col-md-6">
                <label  class="form-label">Количество</label>
                <input class="form-control" name="product[1][count]" type="text">
            </div>
        </div>

    </div>
    <p onclick="addProduct()" style="cursor: pointer">Добавить товар</p>
    <div class="mb-3">
        <label  class="form-label">Фио клиента</label>
        <input class="form-control" type="text" name="customer">
    </div>
    <div class="mb-3">
        <label  class="form-label">Email</label>
        <input class="form-control" type="text" name="email">
    </div>
    <div class="mb-3">
        <label  class="form-label">Телефон</label>
        <input class="form-control" type="text" name="telephone">
    </div>
    <div class="mb-3">
        <label  class="form-label">Адрес</label>
        <input class="form-control" type="text" name="address">
    </div>

    <div class="mb-3">
        <button type="submit" class="btn btn-primary">Создать</button>
    </div>
</form>

</div>
</div>
<script>

    var i = 2;
    function addProduct() {
        var str = '<div class="form-row">\n' +
            '                        <div class="form-group col-md-6">\n' +
            '                                <label class="form-label">Товар</label>\n' +
            '                                <select name="product['+i+'][product_id]" class="form-control">\n' +
            '                                        @foreach($products as $product)<option value="{{$product->id}}">{{$product->name}}</option> @endforeach' +
            '                                    </select>\n' +
            '                            </div>\n' +
            '                        <div class="form-group col-md-6">\n' +
            '                                <label  class="form-label">Количество</label>\n' +
            '                                <input class="form-control" name="product['+i+'][count]" type="text">\n' +
            '                            </div>\n' +
            '                    </div>';
        document.getElementById("products").insertAdjacentHTML("beforeend", str);
        i++;
    }
</script>


@endsection
