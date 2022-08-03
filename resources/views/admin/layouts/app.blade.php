<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>

    @include('admin.layouts.links')

    @livewireStyles
</head>

<body>
    @include('admin.includes.toast')
    <div id="app">
        @include('admin.layouts.sidebar')
        <div id="main">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>

            <div class="page-heading">
                <h3> @yield('page-title') </h3>
            </div>
            <div class="page-content">
                <section class="row">
                    @section('content')
                        
                    @show
                </section>
            </div>

            <footer>
                <div class="footer clearfix mb-0 text-muted">
                    <div class="float-start">
                        <p>2022 &copy; Mazer</p>
                    </div>
                    <div class="float-end">
                        <p>Crafted with <span class="text-danger"><i class="bi bi-heart"></i></span> by <a
                                href="http://ahmadsaugi.com">Cevin</a></p>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    @include('admin.layouts.scripts')
    @if (\Session::has('success'))
        <script>
            var option = {
                animation: true,
                delay: 3000
            };
            
            function Toasty(info) {        
                var toastHTMLElement = document.getElementById('EpicToast');
                var toastBody = document.getElementById('toastBody');
                var toastElement = new bootstrap.Toast(toastHTMLElement, option);
                toastBody.innerHTML = info;
                toastElement.show();
            }
            Toasty("{!! \Session::get('success') !!}")
        </script>
    @endif

    @livewireScripts
</body>

</html>
