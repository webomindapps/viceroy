<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="{{ asset('favicon.ico') }}" sizes="64x64" />
    <title>{{ config('app.name') }} Admin Panel</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        crossorigin="anonymous">
    <link defer rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
    <link href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="{{ asset('admin/css/style.css') }}">
    <link href="{{ asset('admin/css/jquery.signaturepad.css') }}" rel="stylesheet">

</head>

<body>
    <div class="sidebar active">
        <div class="logo_content">
            <div class="logo">
                <div href="">
                    <img src="{{ asset('admin/logo.png') }}" class="admin-logo" width="60px" height="60px">
                </div>
            </div>
            <i class='bx bx-menu-alt-right' id="btn" style="font-size: 25px; cursor: pointer;"></i>
        </div>
        <ul class="nav_list">
            <x-admin.side-bar />
        </ul>

    </div>
    <!-- top bar  -->


    <div class="home_content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row top_bar bg-white shadow-sm">
                        @include('admin.layout.top-bar')
                    </div>
                </div>
            </div>
        </div>

        <div class="main">
            <div class="row px-2">
                @if (session('success'))
                    <div class="col-lg-12 mt-2 session-success" id="session-success">
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    </div>
                @endif
            </div>
            {{ $slot }}
        </div>

    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" crossorigin="anonymous"
        referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>

    <script src="{{ asset('admin/js/jquery.signaturepad.js') }}"></script>
    <script src="{{ asset('admin/js/json2.min.js') }}"></script>
    <script src="{{ asset('admin/js/main.js') }}"></script>


    <script>
        $(document).ready(function() {
            $(".profile-icon").click(function() {
                $(".profile-drop").toggle();
            });
        });
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            let btn = document.querySelector("#btn");
            let sidebar = document.querySelector(".sidebar");
            let dropdownLinks = document.querySelectorAll(".dropdown");

            btn.onclick = function() {
                sidebar.classList.toggle("active");
            }

            dropdownLinks.forEach(link => {
                link.addEventListener("click", function(e) {

                    let dropdownMenu = this.querySelector(".dropdown_menu");
                    dropdownMenu.classList.toggle("open");
                });
            });
        });
    </script>
    @stack('scripts')

</body>

</html>
