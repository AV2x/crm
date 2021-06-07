<nav id="sidebar">
    <div class="p-4 pt-5">
        <a href="#" class="img logo rounded-circle mb-5" style="background-image: url({{asset('storage/'.Auth::user()->avatar)}});"></a>
        <ul class="list-unstyled components mb-5">
            @include('crm.layouts.link', ['route' => '/crm', 'linkname' => 'Dashboard', 'name' => 'dashboard'])
            @include('crm.layouts.link', ['route' => '#', 'linkname' => 'Заказы', 'name' => 'orders'])
            @include('crm.layouts.link', ['route' => '#', 'linkname' => 'Планирование', 'name' => 'planing'])
            @include('crm.layouts.link', ['route' =>  route('category.index'), 'linkname' => 'Категории', 'name' => 'categories'])
            @include('crm.layouts.link', ['route' =>  route('product.index'), 'linkname' => 'Товары', 'name' => 'products'])
            @include('crm.layouts.link', ['route' => route('user.index'), 'linkname' => 'Пользователи', 'name' => 'users'])
        </ul>


    </div>
</nav>
