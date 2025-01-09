@extends('layouts.main_dashboard')

@section('container')
      <div class="breadcrumbs-dark pb-0 pt-4" id="breadcrumbs-wrapper">
        <!-- Search for small screen-->
        <div class="container">
          <div class="row">
            <div class="col s10 m6 l6">
              <h5 class="breadcrumbs-title mt-0 mb-0"><span>Edit Pendaftar</span></h5>
              <ol class="breadcrumbs mb-0">
                <li class="breadcrumb-item"><a href="/dashboard">Home</a>
                </li>
                <li class="breadcrumb-item"><a href="/pendaftar">Kelola Data</a>
                </li>
                <li class="breadcrumb-item active">Edit Pendaftar
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
                                <form method="post" action="/pendaftar/{{ $pendaftar->id }}" enctype="multipart/form-data">
                                    @method('put')
                                    @csrf
                                    <div class="row">
                                        <div class="col s12 m6">
                                            <div class="row">
                                                <div class="col s12 input-field">
                                                    <input id="email" name="email" type="email" class="validate" data-error=".errorTxt3" value="{{ old('email', $pendaftar->email) }}" disabled>
                                                    <label for="email">E-mail</label>
                                                    <small class="errorTxt3"></small>
                                                </div>
                                                <div class="col s12 input-field">
                                                    <input id="name" name="name" type="text" class="validate" data-error=".errorTxt2" value="{{ old('name', $pendaftar->name) }}" disabled>
                                                    <label for="name">Nama</label>
                                                    <small class="errorTxt2"></small>
                                                </div>
                                                <div class="col s12 input-field">
                                                    <input id="nohp" name="nohp" type="text" class="validate" data-error=".errorTxt5" value="{{ old('nohp', $pendaftar->nohp) }}" disabled>
                                                    <label for="nohp">Nomor Telepon</label>
                                                    <small class="errorTxt5"></small>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col s12 m6">
                                            <div class="row">
                                                <div class="col s12 input-field">
                                                    <select name="class" disabled>
                                                        <option>--Pilih Kelas--</option>
                                                        <option value="Kelas Anak-anak" {{ old('class', $pendaftar->class) == 'Kelas Anak-anak' ? 'selected' : '' }}>Kelas Anak-anak</option>
                                                        <option value="Kelas Remaja" {{ old('class', $pendaftar->class) == 'Kelas Remaja' ? 'selected' : '' }}>Kelas Remaja</option>
                                                        <option value="Kelas Dewasa Reguler" {{ old('class', $pendaftar->class) == 'Kelas Dewasa Reguler' ? 'selected' : '' }}>Kelas Dewasa Reguler</option>
                                                        <option value="Kelas Pekerja" {{ old('class', $pendaftar->class) == 'Kelas Pekerja' ? 'selected' : '' }}>Kelas Pekerja</option>
                                                    </select>
                                                    <label>Kelas</label>
                                                </div>
                                                <div class="col s12 input-field">
                                                    <select name="status" id="status">
                                                        <option value="Diproses" {{ old('status', $pendaftar->status) == 'Diproses' ? 'selected' : '' }}>Diproses</option>
                                                        <option value="Wawancara" {{ old('status', $pendaftar->status) == 'Wawancara' ? 'selected' : '' }}>Wawancara</option>
                                                        <option value="Aktif" {{ old('status', $pendaftar->status) == 'Aktif' ? 'selected' : '' }}>Aktif</option>
                                                    </select>
                                                    <label>Status</label>
                                                </div>
                                                <input id="password" name="password" type="hidden"  value="{{ old('password', $pendaftar->password) }}">
                                                <input id="is_siswa" name="is_siswa" type="hidden"  value="{{ old('is_siswa', $pendaftar->is_siswa) }}">
                                                <div class="col s12 input-field">
                                                    <input id="birth_date" name="birth_date" type="text" class="birthdate-picker datepicker"
                                                    placeholder="Pilih tanggal lahir" data-error=".errorTxt4" value="{{ old('birth_date', $pendaftar->birth_date) }}" disabled>
                                                    <label for="birth_date">Tanggal Lahir</label>
                                                    <small class="errorTxt4"></small>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col s12 ">
                                            <div class="input-field">
                                                <input id="address" name="address" type="text" class="validate" value="{{ old('address', $pendaftar->address) }}" disabled>
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
      <script>
        document.addEventListener('DOMContentLoaded', function() {
            var statusSelect = document.getElementById('status');
            var passwordInput = document.getElementById('password');
            var isSiswaInput = document.getElementById('is_siswa');

            statusSelect.addEventListener('change', function() {
                if (statusSelect.value === 'Aktif') {
                    passwordInput.value = 'rta';
                    isSiswaInput.value = '1';
                } else {
                    passwordInput.value = 'JGm9742HLCr2';
                    isSiswaInput.value = '0';
                }
            });
        });
      </script>
@endsection
