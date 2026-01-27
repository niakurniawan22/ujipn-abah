<!DOCTYPE html>
<html>

<head>
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="/css/dashboard.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>

<body>

    <div class="container">
        <aside class="sidebar">
            <h2><i class="fa-solid fa-bars"></i> Admin Dashboard</h2>
            <ul>
                <li><a href="{{ route('admin.dashboard') }}"><i class="fa-solid fa-house"></i> Dashboard</a></li>
                <li><a href=""><i class="fa-solid fa-users"></i> Kelola Siswa</a></li>
                <li><a href=""><i class="fa-solid fa-tags"></i> Kelola Kategori</a></li>
                <li><a href=""><i class="fa-solid fa-inbox"></i> Data Aspirasi</a></li>
                <li><a href=""><i class="fa-solid fa-file-lines"></i> Laporan</a></li>
            </ul>
        </aside>

        <main class="main">
            <div class="header">
                <div class="logo" style="display: flex; align-items: center;">
                    <i class="fas fa-tachometer" style="margin-right: 10px; font-size: 20px;"></i>
                    <h1>Dashboard Admin</h1>
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
                            <!-- Laravel -->
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <button type="submit">
                                <i class="fa-solid fa-right-from-bracket"></i> Logout
                            </button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="cards">
                <div class="card blue" data-icon="&#xf15c;">
                    <h3>Total Aspirasi</h3>
                    <p>120</p>
                </div>

                <div class="card orange" data-icon="&#xf017;">
                    <h3>Menunggu</h3>
                    <p>30</p>
                </div>

                <div class="card green" data-icon="&#xf110;">
                    <h3>Diproses</h3>
                    <p>45</p>
                </div>

                <div class="card teal" data-icon="&#xf058;">
                    <h3>Selesai</h3>
                    <p>45</p>
                </div>

            </div>

            <div class="table-box">
                <h3>Aspirasi Terbaru</h3>
                <table>
                    <tr>
                        <th>Nama Siswa</th>
                        <th>Judul</th>
                        <th>Kategori</th>
                        <th>Status</th>
                    </tr>
                    <tr>
                        <td>Budi</td>
                        <td>Lampu Kelas Rusak</td>
                        <td>Ruang Kelas</td>
                        <td><span class="status menunggu">Menunggu</span></td>
                    </tr>
                    <tr>
                        <td>Mira</td>
                        <td>Toilet Kotor</td>
                        <td>Toilet</td>
                        <td><span class="status diproses">Diproses</span></td>
                    </tr>
                </table>
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
