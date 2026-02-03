@extends('admin.layouts.templates')

@section('content')
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
    <div class="table-box">
        <h3>Aspirasi Terbaru</h3>
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>Nama Siswa</th>
                    <th>Judul</th>
                    <th>Kategori</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($aspirasi as $item)
                    <tr>
                        <td>{{ $item->siswa->user->nama }}</td>
                        <td>{{ $item->judul }}</td>
                        <td>{{ $item->kategori->nama_kategori }}</td>
                        <td><span class="status {{ $item->status }} text-capitalize">{{ $item->status }}</span></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
