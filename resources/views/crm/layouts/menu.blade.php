<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">

        <button type="button" id="sidebarCollapse" class="btn btn-primary">
            <i class="fa fa-bars"></i>
            <span class="sr-only">Toggle Menu</span>
        </button>
        <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fa fa-bars"></i>
        </button>


        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="nav navbar-nav ml-auto">
                <li class="nav-item">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                        Создать пользователя
                    </button>
                    {{--                            <a href="create-category.html" type="button" class="btn btn-primary mb-4">Создать пользоватлея</a>--}}
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="#">{{Auth::user()->name}}</a>
                </li>
                <li>
                    <a class="nav-link" href="/logout">Выйти</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{route('user.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">


                    <div class="form-group row">
                        <label for="name" class="col-sm-2 col-form-label">Имя:</label>
                        <div class="col-sm-10">
                            <input type="text" name="name" class="form-data" placeholder="Имя пользователя">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="email" class="col-sm-2 col-form-label">Email:</label>
                        <div class="col-sm-10">
                            <input type="text" name="email" class="form-data" placeholder="email">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="password" class="col-sm-2 col-form-label">Пароль:</label>
                        <div class="col-sm-10">
                            <input type="text" name="password" class="form-data" placeholder="password">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="password" class="col-sm-2 col-form-label">Аватар:</label>
                        <div class="col-sm-10">
                            <input type="file" name="file" class="form-data">
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
                    <button type="submit" class="btn btn-primary">Создать</button>
                </div>
            </form>
        </div>
    </div>
</div>
