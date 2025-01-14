@extends('layouts.main_dashboard')

@section('container')
<div class="breadcrumbs-dark pb-0 pt-4" id="breadcrumbs-wrapper">
    <div class="container">
        <div class="row">
            <div class="col s10 m6 l6">
                <h5 class="breadcrumbs-title mt-0 mb-0"><span>Input Nilai Ujian</span></h5>
                <ol class="breadcrumbs mb-0">
                    <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
                    <li class="breadcrumb-item"><a href="/catatan-ujian">Riwayat Ujian</a></li>
                    <li class="breadcrumb-item active">Edit Nilai</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="col s12">
    <div class="container">
        <div class="section users-edit">
            <div class="card">
                <div class="card-content">
                    <div class="row">
                        <div class="col s12" id="account">
                            <form method="post" action="/catatan-ujian/{{ $riwayat->id }}" enctype="multipart/form-data">
                                @method('put')
                                @csrf
                                <div class="row">
                                    <!-- Nama Siswa -->
                                    <div class="col s12 input-field">
                                        <input id="name_student" name="name_student" type="text" class="validate" 
                                            value="{{ old('name_student', $riwayat->name_student) }}" disabled>
                                        <label for="name_student">Nama Siswa</label>
                                    </div>
                                    <!-- Nama Kelas -->
                                    <div class="col s12 input-field">
                                        <input id="name_class" name="name_class" type="text" class="validate" 
                                            value="{{ old('name_class', $riwayat->name_class) }}" disabled>
                                        <label for="name_class">Nama Kelas</label>
                                    </div>
                                    <!-- Kelas -->
                                    <div class="col s12 input-field">
                                        <input id="class" name="class" type="text" class="validate" 
                                            value="{{ old('class', $riwayat->class) }}" disabled>
                                        <label for="class">Kelas</label>
                                    </div>
                                    <!-- Kelas -->
                                <div class="col s12 input-field">
                                    <input id="qty_juz" name="qty_juz" type="text" qty_juz="validate" 
                                        value="{{ old('qty_juz', $riwayat->qty_juz) }} juz" disabled>
                                    <label for="qty_juz">Jumlah Hafalan</label>
                                    </div>
                                    <!-- Status -->
                                    <div class="col s12 input-field">
                                        <select name="status" id="status" required>
                                            <option value="Sudah Daftar" {{ old('status', $riwayat->status) == 'Sudah Daftar' ? 'selected' : '' }}>Sudah Daftar</option>
                                            <option value="Selesai" {{ old('status', $riwayat->status) == 'Selesai' ? 'selected' : '' }}>Selesai</option>
                                        </select>
                                        <label>Status</label>
                                    </div>
                                    <!-- Nilai -->
                                    <div class="col s12 input-field">
                                        <input id="score" name="score" type="number" class="validate" 
                                            value="{{ old('score', $riwayat->score) }}" required>
                                        <label for="score">Nilai</label>
                                    </div>
                                    <!-- Tombol Submit -->
                                    <div class="col s12 display-flex justify-content-end mt-3">
                                        <button type="submit" class="btn indigo">Simpan</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="content-overlay"></div>
</div>
@endsection
