@extends('layouts.main_dashboard')

@section('container')
      <div class="breadcrumbs-dark pb-0 pt-4" id="breadcrumbs-wrapper">
        <!-- Search for small screen-->
        <div class="container">
          <div class="row">
            <div class="col s10 m6 l6">
              <h5 class="breadcrumbs-title mt-0 mb-0"><span>Tambah Kelas</span></h5>
              <ol class="breadcrumbs mb-0">
                <li class="breadcrumb-item"><a href="/dashboard">Home</a>
                </li>
                <li class="breadcrumb-item"><a href="/kelas">Kelola Data</a>
                </li>
                <li class="breadcrumb-item active">Tambah Kelas
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
                                <form method="post" action="/kelas" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col s12 ">
                                            <div class="input-field">
                                                <input id="name" name="name" type="text" class="validate" data-error=".errorTxt1" required>
                                                <label>Nama Kelas</label>
                                                <small class="errorTxt1"></small>
                                            </div>
                                        </div>
                                        <div class="col s12 ">
                                            <div class="input-field">
                                                <select name="name_class">
                                                    <option>--Pilih Kelas--</option>
                                                    <option value="Kelas Anak-anak">Kelas Anak-anak</option>
                                                    <option value="Kelas Remaja">Kelas Remaja</option>
                                                    <option value="Kelas Dewasa Reguler">Kelas Dewasa Reguler</option>
                                                    <option value="Kelas Pekerja">Kelas Pekerja</option>
                                                </select>
                                                <label>Kelas</label>
                                            </div>
                                        </div>
                                        <div class="col s12 ">
                                            <div class="input-field">
                                                <select name="name_teacher">
                                                <option>--Pilih Musyifah--</option>
                                                @foreach ($gurus as $guru)
                                                    <option value="{{ $guru->name }}">{{ $guru->name }}</option>
                                                @endforeach
                                                </select>
                                                <label>Musyrifah</label>
                                            </div>
                                        </div>
                                        <div class="col s12 ">
                                            <div class="input-field">
                                                <input id="room" name="room" type="text" class="validate" data-error=".errorTxt2" required>
                                                <label>Ruangan</label>
                                                <small class="errorTxt2"></small>
                                            </div>
                                        </div>
                                        <div class="col s12 ">
                                            <div class="input-field">
                                                <input id="information" name="information" type="text" class="validate" data-error=".errorTxt3" required>
                                                <label>Keterangan</label>
                                                <small class="errorTxt3"></small>
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
