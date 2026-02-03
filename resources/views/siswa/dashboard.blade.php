@extends('siswa.layouts.templates')

@section('content')
    <div class="main-content">
        <div class="photo" style="display: flex; justify-content: center; margin-bottom: 20px;">
            <img src="/img/photo.jfif" alt=""
                style="width: 100px; height: 100px; border-radius: 50%; object-fit: cover;box-shadow: 0 10px 20px rgba(34, 197, 94, 0.4);">
        </div>
        <h2 style="text-align: center; color: #333E5D; margin-bottom: 20px;">Selamat datang
            <span>{{ auth()->user()->nama }} ({{ auth()->user()->siswa->kelas }})</span>
        </h2>
        <div class="cards">
            <div class="card blue" data-icon="&#xf15c;">
                <h3>Total Aspirasi</h3>
                <p>{{ $total_aspirasi }}</p>
            </div>

            <div class="card orange" data-icon="&#xf017;">
                <h3>Menunggu</h3>
                <p>{{ $aspirasi_menunggu }}</p>
            </div>

            <div class="card green" data-icon="&#xf110;">
                <h3>Diproses</h3>
                <p>{{ $aspirasi_diproses }}</p>
            </div>

            <div class="card teal" data-icon="&#xf058;">
                <h3>Selesai</h3>
                <p>{{ $aspirasi_selesai }}</p>
            </div>
        </div>

        <div class="d-flex justify-content-center">
            <a href="{{ route('siswa.tambah-aspirasi') }}" class="btn btn-success px-5 mx-auto"><i
                    class="fa-solid fa-plus"></i> Ajukan
                Aspirasi</a>
        </div>

        <div class="table-box">
            <h3>Riwayat Aspirasi</h3>
            <table>
                <thead>
                    <tr>
                        <th>Judul</th>
                        <th>Kategori</th>
                        <th>Detail Aduan</th>
                        <th>Tanggal</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($aspirasi as $item)
                        <tr>
                            <td>{{ $item->judul }}</td>
                            <td>{{ $item->kategori->nama_kategori }}</td>
                            <td>{{ $item->isi }}</td>
                            <td>{{ $item->created_at->format('d-M-Y') }}</td>
                            <td><span class="status {{ $item->status }}"
                                    style="text-transform: capitalize;">{{ $item->status }}</span></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
