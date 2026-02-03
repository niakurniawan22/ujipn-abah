<!DOCTYPE html>
<html>

<head>
    <title>SarPras PN | {{ $title }}</title>
    <link rel="stylesheet" href="/css/dashboard.css">
    <link rel="stylesheet" href="/vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="/vendor/fontawesome/css/all.css">
</head>

<body>

    <div class="container-main">

        @include('admin.layouts.sidebar')

        <main class="main">
            <div class="header">
                <div class="logo" style="display: flex; align-items: center;">
                    <i class="fas fa-tachometer" style="margin-right: 10px; font-size: 20px;"></i>
                    <h1 class="m-0">{{ $title }}</h1>
                </div>

                <div class="user-menu">
                    <div class="user-trigger" onclick="toggleDropdown()">
                        <i class="fa-solid fa-user-circle"></i>
                        <span>Admin</span>
                        <i class="fa-solid fa-caret-down"></i>
                    </div>

                    <div class="dropdown" id="userDropdown">
                        <a href="">
                            <i class="fa-solid fa-user"></i> Profile
                        </a>

                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <!-- Laravel -->
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <button type="submit">
                                <i class="fa-solid fa-right-from-bracket"></i> Logout
                            </button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="main-content">
                @yield('content')
            </div>
        </main>
    </div>

    <script>
        function toggleDropdown() {
            const dropdown = document.getElementById('userDropdown');
            dropdown.style.display = dropdown.style.display === 'block' ?
                'none' :
                'block';
        }

        // Tutup dropdown jika klik di luar
        document.addEventListener('click', function(e) {
            const menu = document.querySelector('.user-menu');
            if (!menu.contains(e.target)) {
                document.getElementById('userDropdown').style.display = 'none';
            }
        });
    </script>

</body>

</html>
