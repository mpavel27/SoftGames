<!DOCTYPE html>
<html>
    <head>
        <title>SoftGames</title>
        <link rel="stylesheet" href="{{ asset('/assets/css/style.css') }}">
        <link rel="stylesheet" href="{{ asset('/assets/vendors/bootstrap/css/bootstrap.min.css') }}">
        <script src="{{ asset('/assets/vendors/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://kit-pro.fontawesome.com/releases/latest/css/pro-v4-shims.min.css" media="all">
        <link rel="stylesheet" href="https://kit-pro.fontawesome.com/releases/latest/css/pro-v4-font-face.min.css" media="all">
        <link rel="stylesheet" href="https://kit-pro.fontawesome.com/releases/latest/css/pro.min.css" media="all">
        <script src="//unpkg.com/alpinejs" defer></script>
        <script src="{{ asset('js/app.js') }}" defer></script>
        @toastr_css
        <style>
            .toast {
                width: 350px;
                max-width: 100%;
                font-size: 14px !important;
                pointer-events: auto;
                background-clip: padding-box;
                border: unset !important;
                box-shadow: 0 0 20px 0px #0000001f !important;
                border-radius: 6px !important;
            }
        </style>
        @livewireStyles
    </head>
    <body>
        @yield('main-container')
        <script src="{{ asset('/assets/vendors/jquery/jquery-3.2.1.js') }}"></script>
        <script src="{{ asset('/assets/vendors/jquery/jquery.plate.js') }}"></script>
        @toastr_js
        @livewireScripts
        <script src="{{ asset('/assets/js/index.js') }}"></script>
        <script src="https://cdn.jsdelivr.net/gh/livewire/sortable@v0.x.x/dist/livewire-sortable.js"></script>
        <livewire:language-selector/>
        <script>
            window.addEventListener('alert', event => {
                         toastr[event.detail.type](event.detail.message,
                         event.detail.title ?? '')
                        });
        </script>
        @toastr_render
    </body>
</html>
