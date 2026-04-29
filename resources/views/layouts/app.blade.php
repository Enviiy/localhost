<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>YUKI</title>

    <!-- Scripts -->
    <script src="{{ asset('public/assets/js/bootstrap.bundle.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('public/assets/css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('public/assets/css/style.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    YUKI
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>
                    <!-- Side Of Navbar -->

                    <ul class="navbar-nav m-auto">

                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('about') }}">О нас</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('menu') }}">Меню</a>
                        </li>
                    </ul>
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Вход') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Регистрация') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">

                                    <a class="nav-link" href="{{ route('profile') }}">Личный кабинет</a>

                                    <a class="nav-link" href="{{ route('admin') }}">
                                        @if (Auth::user()->role_id==2)
                                            <span>Админ панель</span>
                                        @endif
                                    </a>

                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            <div class="container">
                <div class="row">
                    @yield('content')
                </div>
            </div>
        </main>
        <footer class="bg-dark text-white pt-5 pb-4" style='margin-top: 242px'>
            <div class="container">
                <div class="row g-4">
                    <div class="col-lg-4 col-md-6">
                        <h3 class="h2 fw-bold mb-3">YUKI</h3>
                        <p class="text-white-50">Ресторан японской кухни. Свежие суши, роллы и сеты с доставкой или в уютном зале.</p>
                        <div class="mt-3">
                            <a href="#" class="text-white-50 me-3"><i class="bi bi-instagram"></i></a>
                            <a href="#" class="text-white-50 me-3"><i class="bi bi-telegram"></i></a>
                            <a href="#" class="text-white-50 me-3"><i class="bi bi-whatsapp"></i></a>
                            <a href="#" class="text-white-50"><i class="bi bi-vk"></i></a>
                        </div>
                    </div>

                    <!-- Контакты -->
                    <div class="col-lg-3 col-md-6">
                        <h5 class="fw-bold mb-3">Контакты</h5>
                        <ul class="list-unstyled">
                            <li class="mb-2">
                                <i class="bi bi-geo-alt-fill me-2"></i>
                                <span class="text-white-50">г. Ижевск, ул. Молодежная, д. 92</span>
                            </li>
                            <li class="mb-2">
                                <i class="bi bi-telephone-fill me-2"></i>
                                <a href="tel:+79991234567" class="text-white-50 text-decoration-none">+7 (999) 123-45-67</a>
                            </li>
                            <li class="mb-2">
                                <i class="bi bi-envelope-fill me-2"></i>
                                <a href="mailto:info@yuki.ru" class="text-white-50 text-decoration-none">info@yuki.ru</a>
                            </li>
                            <li class="mb-2">
                                <i class="bi bi-clock-fill me-2"></i>
                                <span class="text-white-50">Ежедневно: 11:00 - 23:00</span>
                            </li>
                        </ul>
                    </div>

                    <!-- Быстрые ссылки -->
                    <div class="col-lg-2 col-md-6">
                        <h5 class="fw-bold mb-3">Меню</h5>
                        <ul class="list-unstyled">
                            <li class="mb-2"><a href="#" class="text-white-50 text-decoration-none">Сеты</a></li>
                            <li class="mb-2"><a href="#" class="text-white-50 text-decoration-none">Роллы</a></li>
                            <li class="mb-2"><a href="#" class="text-white-50 text-decoration-none">Суши</a></li>
                            <li class="mb-2"><a href="#" class="text-white-50 text-decoration-none">О нас</a></li>
                        </ul>
                    </div>

                    <!-- Художники -->
                    <div class="col-lg-3 col-md-6">
                        <h5 class="fw-bold mb-3">Художники</h5>
                        <ul class="list-unstyled">
                            <li class="mb-2">
                                <a href="#" class="text-white-50 text-decoration-none">
                                    <i class="bi bi-palette-fill me-1"></i> Максим Пономарев
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- Копирайт -->
                <hr class="mt-4 mb-3 bg-secondary">
                <div class="text-center">
                    <p class="text-white-50 small mb-0">© 2026 YUKI. Все права защищены.</p>
                </div>
            </div>
        </footer>
    </div>
</body>
</html>
