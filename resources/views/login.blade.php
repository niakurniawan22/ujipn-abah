<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="/vendor/fontawesome/css/all.css">
    <link rel="stylesheet" href="/css/login.css">
</head>

<body>
    <div class="container">
        <div class="login-box">
            <div class="login-top">
                <div class="title">
                    <i class="fas fa-signal"></i>
                    <span>Pengaduan Sarana Prasarana Sekolah</span>
                </div>
                <div class="icon">
                    <img src="/img/admin.png" alt="">
                    <i class="fa-solid fa-angle-down"></i>
                </div>
            </div>
            @if (session('info'))
                <div class="info">
                    <p>{{ session('info') }}</p>
                    <i class="fas fa-close close-info"></i>
                </div>
            @endif
            <div class="login-body">
                <div class="card">
                    <h2>Selamat Datang!</h2>
                    <p>Silahkan login untuk melanjutkan.</p>
                    <form action="{{ route('login.process') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <i class="fas fa-envelope"></i>
                            <input type="email" name="email" placeholder="Masukkan email" required>
                        </div>
                        <div class="form-group">
                            <i class="fas fa-lock"></i>
                            <input type="password" name="password" placeholder="Masukkan password" required>
                        </div>
                        <button class="btn">Login</button>
                        <p>Lupa Password?</p>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const closeBtn = document.querySelector('.close-info');
            const infoBox = document.querySelector('.info');

            closeBtn.addEventListener('click', function() {
                infoBox.classList.add('hidden');
            });
        });
    </script>

</body>

</html>
