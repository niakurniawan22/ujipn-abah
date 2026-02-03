@extends('siswa.layouts.templates')

@section('content')
    <div class="main-content min-vh-100">
        <div class="box shadow p-5">
            <div class="row justify-content-center">
                <div class="col-10">
                    <h2 class="text-center mb-4">FORM PENGAJUAN ASPIRASI</h2>
                    <p class="lead fst-italic">Isi data di bawah ini dengan benar!</p>
                    <form action="{{ route('siswa.proses-tambah') }}" method="POST">
                        @csrf
                        <input type="hidden" name="siswa_id" value="{{ auth()->user()->siswa->id }}">
                        <div class="form-group row mb-3 d-flex align-items-center">
                            <label for="nama_siswa" class="col-3">Nama Siswa</label>
                            <div class="col-9">
                                <input class="form-control" type="text" name="nama_siswa" id=""
                                    value="{{ auth()->user()->nama }}" disabled>
                            </div>
                        </div>
                        <div class="form-group row mb-3 d-flex align-items-center">
                            <label for="kelas" class="col-3">Kelas</label>
                            <div class="col-9">
                                <input class="form-control" type="text" name="kelas" id=""
                                    value="{{ auth()->user()->siswa->kelas }}" disabled>
                            </div>
                        </div>
                        <div class="form-group row mb-3 d-flex align-items-center">
                            <label for="kategori_id" class="col-3">Kategori</label>
                            <div class="col-9">
                                <select class="form-control @error('kategori_id') is-invalid @enderror" name="kategori_id">
                                    <option value="">Pilih Kategori</option>
                                    @foreach ($kategori as $item)
                                        <option value="{{ $item->id }}">{{ $item->nama_kategori }}</option>
                                    @endforeach
                                </select>
                                @error('kategori_id')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-3 d-flex align-items-center">
                            <label for="judul" class="col-3">Judul</label>
                            <div class="col-9">
                                <input class="form-control @error('judul') is-invalid @enderror" type="text"
                                    name="judul" id="judul">
                            </div>
                            @error('judul')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group row mb-3 d-flex align-items-center">
                            <label for="isi" class="col-3">Isi Pesan</label>
                            <div class="col-9">
                                <textarea name="isi" id="" rows="10" class="form-control @error('isi') is-invalid @enderror"></textarea>
                                @error('isi')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="d-flex justify-content-between">
                            <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Proses Ajuan</button>
                            <a href="{{ route('siswa.dashboard') }}" class="btn btn-secondary"><i class="fas fa-close"></i>
                                Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
