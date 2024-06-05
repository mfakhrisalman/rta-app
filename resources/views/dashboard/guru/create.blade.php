@extends('layouts.main_dashboard')

@section('container')
      <div class="breadcrumbs-dark pb-0 pt-4" id="breadcrumbs-wrapper">
        <!-- Search for small screen-->
        <div class="container">
          <div class="row">
            <div class="col s10 m6 l6">
              <h5 class="breadcrumbs-title mt-0 mb-0"><span>Tambah Guru</span></h5>
              <ol class="breadcrumbs mb-0">
                <li class="breadcrumb-item"><a href="/dashboard">Home</a>
                </li>
                <li class="breadcrumb-item"><a href="/guru">Kelola Data</a>
                </li>
                <li class="breadcrumb-item active">Tambah Guru
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
                                <form method="post" action="/guru" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col s12 m6">
                                            <div class="row">
                                                <div class="col s12 input-field">
                                                    <input id="email" name="email" type="email" class="validate" data-error=".errorTxt3" required>
                                                    <label for="email">E-mail</label>
                                                    <small class="errorTxt3"></small>
                                                </div>
                                                <div class="col s12 input-field">
                                                    <input id="name" name="name" type="text" class="validate" data-error=".errorTxt2" required>
                                                    <label for="name">Nama</label>
                                                    <small class="errorTxt2"></small>
                                                </div>
                                                <div class="col s12 input-field">
                                                    <input id="nohp" name="nohp" type="number" class="validate" data-error=".errorTxt5" required>
                                                    <label for="nohp">Nomor Telepon</label>
                                                    <small class="errorTxt5"></small>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col s12 m6">
                                            <div class="row">
                                                <div class="col s12 input-field">
                                                    <input id="class" name="class" type="text" class="validate" data-error=".errorTxt1" required>
                                                    <label>Jabatan</label>
                                                    <small class="errorTxt1"></small>
                                                </div>
                                                <div class="col s12 input-field">
                                                    <select name="status">
                                                        <option value="Aktif">Aktif</option>
                                                        <option value="Tidak Aktif">Tidak Aktif</option>
                                                    </select>
                                                    <label>Status</label>
                                                </div>
                                                <div class="col s12 input-field">
                                                    <input id="birth_date" name="birth_date" type="text" class="birthdate-picker datepicker"
                                                    placeholder="Pilih tanggal lahir" data-error=".errorTxt4" required>
                                                    <label for="birth_date">Tanggal Lahir</label>
                                                    <small class="errorTxt4"></small>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col s12 ">
                                            <div class="input-field">
                                                <input id="address" name="address" type="text" class="validate" required>
                                                <label for="address">Alamat</label>
                                            </div>
                                        </div>
                                        <input id="is_guru" name="is_guru" type="hidden"  value="1">
                                        <input id="password" name="password" type="hidden"  value="rta">
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
