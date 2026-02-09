@extends('admin.layouts.templates')

@section('content')
    <div class="shadow p-3">
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Sukses!</strong> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        @if (session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Gagal!</strong> {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <a href="{{ route('admin.form-siswa') }}" class="btn btn-success mb-4 px-4">
            <i class="fas fa-plus"></i> Tambah Data Siswa
        </a>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th class="bg-dark text-center text-light">No</th>
                    <th class="bg-dark text-center text-light">NIS</th>
                    <th class="bg-dark text-center text-light">Nama Siswa</th>
                    <th class="bg-dark text-center text-light">Email</th>
                    <th class="bg-dark text-center text-light">Kelas</th>
                    <th class="bg-dark text-center text-light">Jurusan</th>
                    <th class="bg-dark text-center text-light">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($siswa as $index => $sis)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $sis->nis }}</td>
                        <td>{{ $sis->user->nama }}</td>
                        <td>{{ $sis->user->email }}</td>
                        <td>{{ $sis->kelas }}</td>
                        <td>{{ $sis->jurusan }}</td>
                        <td class="text-center">
                            <a href="/admin/siswa/edit/{{ $sis->id }}" class="btn btn-sm btn-info m-0 me-2"
                                style="box-shadow: none !Important">
                                <i class="fas fa-edit"></i> Edit
                            </a>
                            <a href="/admin/siswa/delete/{{ $sis->id }}"
                                class="btn btn-sm btn-danger m-0 @if ($sis->aspirasi->count() > 0) disabled @endif"
                                style="box-shadow: none !Important"
                                onclick="return confirm('Yakin data siswa ini akan dihapus?')">
                                <i class="fas fa-trash"></i> Hapus
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
