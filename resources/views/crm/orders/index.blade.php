@extends('crm.layouts.app')

@section('content')

    <h2 class="mb-4">Заказы</h2>
    <a href="{{route('order.create')}}" type="button" class="btn btn-primary mb-4">Создать</a>
    <table class="table">
        <thead class="thead-dark">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Товары</th>
            <th scope="col">ФИО Заказчика</th>
            <th scope="col">Email</th>
            <th scope="col">Телефон</th>
            <th scope="col">Адрес</th>
            <th scope="col">Сумма</th>
            <th scope="col">Статус</th>
        </tr>
        </thead>
        <tbody>
        @foreach($orders as $order)
        <tr>
            <th scope="row">{{$order->id}}</th>
            <td>
                <table class="table">
                    <tbody>
                    @foreach($order->products as $key => $product)
                    <tr>
                        <th scope="row">{{$key +1}}</th>
                        <td>{{$product->name}}</td>
                        <td>{{$product->order_count}} шт.</td>
                    </tr>
                    @endforeach

                    </tbody>
                </table>
            </td>
            <td>{{$order->customer}}</td>
            <td><a href="#">{{$order->email}}</a></td>
            <td>{{$order->telephone}}</td>
            <td>{{$order->address}}</td>
            <td>1540 руб.</td>
            <td>
                <select class="form-select form-control" aria-label="Default select example">
                    <option selected>Новый заказ</option>
                    <option >В обработке</option>
                    <option >Заказ отправлен</option>
                </select>
            </td>
        </tr>
        @endforeach






        </tbody>
    </table>

@endsection
