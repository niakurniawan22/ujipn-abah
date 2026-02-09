@extends('admin.layouts.templates')

@section('content')
    <div class="table-box">
        <div class="col-10 p-3">
            <h3 class="text-center mb-4">FORM TAMBAH DATA SISWA</h3>
            <p class="lead mb-4">Silahkan isi data dalam form di bawah ini dengan benar :</p>
            <form action="{{ route('admin.tambah-siswa') }}" method="POST">
                @csrf
                <div class="form-group row mb-3 align-items-center">
                    <label for="nama" class="form-label col-3">Nama</label>
                    <div class="col-9">
                        <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror"
                            placeholder="Nama Siswa ...">
                        @error('nama')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="form-group row mb-3 align-items-center">
                    <label for="email" class="form-label col-3">Email</label>
                    <div class="col-9">
                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                            placeholder="Alamat Email ...">
                        @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="form-group row mb-3 align-items-center">
                    <label for="nis" class="form-label col-3">NIS</label>
                    <div class="col-9">
                        <input type="text" name="nis" class="form-control @error('nis') is-invalid @enderror"
                            placeholder="Nomor Induk Siswa ...">
                        @error('nis')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="form-group row mb-3 align-items-center">
                    <label for="kelas" class="form-label col-3">Kelas</label>
                    <div class="col-9">
                        <select name="kelas" class="form-control @error('kelas') is-invalid @enderror">
                            <option value="">Pilih Kelas</option>
                            <option value="12 RPL">12 RPL</option>
                            <option value="11 RPL">11 RPL</option>
                            <option value="10 RPL">10 RPL</option>
                            <option value="12 AKL">12 AKL</option>
                            <option value="11 AKL">11 AKL</option>
                            <option value="10 AKL">10 AKL</option>
                        </select>
                        @error('kelas')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="form-group row mb-3 align-items-center">
                    <label for="jurusan" class="form-label col-3">Jurusan</label>
                    <div class="col-9">
                        <select name="jurusan" class="form-control @error('jurusan') is-invalid @enderror">
                            <option value="">Pilih Jurusan</option>
                            <option value="PPLG">PPLG</option>
                            <option value="AKL">AKL</option>
                            <option value="MPLB">MPLB</option>
                            <option value="PMS">PMS</option>
                        </select>
                        @error('jurusan')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="d-flex justify-content-between">
                    <button class="btn btn-success px-5" type="submit">
                        <i class="fas fa-save"></i> Simpan
                    </button>
                    <a href="{{ route('admin.siswa') }}" class="btn btn-secondary px-4">
                        <i class="fas fa-undo"></i> Kembali
                    </a>
                </div>
            </form>
        </div>
    </div>
@endsection
