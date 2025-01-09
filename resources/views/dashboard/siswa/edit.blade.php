@extends('layouts.main_dashboard')

@section('container')
      <div class="breadcrumbs-dark pb-0 pt-4" id="breadcrumbs-wrapper">
        <!-- Search for small screen-->
        <div class="container">
          <div class="row">
            <div class="col s10 m6 l6">
              <h5 class="breadcrumbs-title mt-0 mb-0"><span>Edit Siswa</span></h5>
              <ol class="breadcrumbs mb-0">
                <li class="breadcrumb-item"><a href="/dashboard">Home</a>
                </li>
                <li class="breadcrumb-item"><a href="/siswa">Kelola Data</a>
                </li>
                <li class="breadcrumb-item active">Edit Siswa
                </li>
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
                                <form method="post" action="/siswa/{{ $siswa->id }}" enctype="multipart/form-data">
                                    @method('put')
                                    @csrf
                                    <div class="row">
                                        <div class="col s12 m6">
                                            <div class="row">
                                                <div class="col s12 input-field">
                                                    <input id="email" name="email" type="email" class="validate" data-error=".errorTxt3" value="{{ old('email', $siswa->email) }}" required>
                                                    <label for="email">E-mail</label>
                                                    <small class="errorTxt3"></small>
                                                </div>
                                                <div class="col s12 input-field">
                                                    <input id="name" name="name" type="text" class="validate" data-error=".errorTxt2" value="{{ old('name', $siswa->name) }}" required>
                                                    <label for="name">Nama</label>
                                                    <small class="errorTxt2"></small>
                                                </div>
                                                <div class="col s12 input-field">
                                                    <input id="nohp" name="nohp" type="text" class="validate" data-error=".errorTxt5" value="{{ old('nohp', $siswa->nohp) }}" required>
                                                    <label for="nohp">Nomor Telepon</label>
                                                    <small class="errorTxt5"></small>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col s12 m6">
                                            <div class="row">
                                                <div class="col s12 input-field">
                                                    <select name="class" required>
                                                        <option>--Pilih Kelas--</option>
                                                        <option value="Kelas Anak-anak" {{ old('class', $siswa->class) == 'Kelas Anak-anak' ? 'selected' : '' }}>Kelas Anak-anak</option>
                                                        <option value="Kelas Remaja" {{ old('class', $siswa->class) == 'Kelas Remaja' ? 'selected' : '' }}>Kelas Remaja</option>
                                                        <option value="Kelas Dewasa Reguler" {{ old('class', $siswa->class) == 'Kelas Dewasa Reguler' ? 'selected' : '' }}>Kelas Dewasa Reguler</option>
                                                        <option value="Kelas Pekerja" {{ old('class', $siswa->class) == 'Kelas Pekerja' ? 'selected' : '' }}>Kelas Pekerja</option>
                                                    </select>
                                                    <label>Kelas</label>
                                                </div>
                                                <div class="col s12 input-field">
                                                    <select name="status" id="status">
                                                        <option value="Aktif" {{ old('status', $siswa->status) == 'Aktif' ? 'selected' : '' }}>Aktif</option>
                                                        <option value="Tidak Aktif" {{ old('status', $siswa->status) == 'Tidak Aktif' ? 'selected' : '' }}>Tidak Aktif</option>
                                                    </select>
                                                    <label>Status</label>
                                                </div>
                                                <div class="col s12 input-field">
                                                    <input id="birth_date" name="birth_date" type="text" class="birthdate-picker datepicker"
                                                    placeholder="Pilih tanggal lahir" data-error=".errorTxt4" value="{{ old('birth_date', $siswa->birth_date) }}" required>
                                                    <label for="birth_date">Tangal Lahir</label>
                                                    <small class="errorTxt4"></small>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col s12 ">
                                            <div class="input-field">
                                                <input id="address" name="address" type="text" class="validate" value="{{ old('address', $siswa->address) }}" required>
                                                <label for="address">Alamat</label>
                                            </div>
                                        </div>
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
