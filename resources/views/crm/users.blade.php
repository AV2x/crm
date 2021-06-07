@extends('crm.layouts.app')

@section('content')

    <h2 class="mb-4">Пользователи</h2>
    <table class="table">
        <thead>
        <th>id</th>
        <th>Имя</th>
        <th>Email</th>
        <th></th>
        </thead>
        <tbody>
        @foreach($users as $user)
            <tr>
                <td>{{$user->id}}</td>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#user{{$user->id}}">
                        Обновить пользователя
                    </button>
                    <form action="{{route('user.destroy', $user)}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-secondary">Удалить</button>
                    </form>

                </td>
            </tr>


            <!-- Modal -->
            <div class="modal fade" id="user{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">{{$user->name}}</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="{{route('user.update', $user)}}" method="post" enctype="multipart/form-data">
                            @method('PUT')
                            @csrf
                            <div class="modal-body">


                                <div class="form-group row">
                                    <label for="name" class="col-sm-2 col-form-label">Имя:</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="name" class="form-data" value="{{$user->name}}" placeholder="Имя пользователя">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="email" class="col-sm-2 col-form-label">Email:</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="email" value="{{$user->email}}" class="form-data" placeholder="email">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="password" class="col-sm-2 col-form-label">Пароль:</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="password" class="form-data" placeholder="password">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="password" class="col-sm-2 col-form-label">Пароль:</label>
                                    <div class="col-sm-10">
                                        <input type="file" name="file" class="form-data">
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
                                <button type="submit" class="btn btn-primary">Обновить</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
        </tbody>
    </table>

@endsection
