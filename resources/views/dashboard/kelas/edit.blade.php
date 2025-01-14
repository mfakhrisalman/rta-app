@extends('layouts.main_dashboard')

@section('container')
      <div class="breadcrumbs-dark pb-0 pt-4" id="breadcrumbs-wrapper">
        <!-- Search for small screen-->
        <div class="container">
          <div class="row">
            <div class="col s10 m6 l6">
              <h5 class="breadcrumbs-title mt-0 mb-0"><span>Edit Kelas</span></h5>
              <ol class="breadcrumbs mb-0">
                <li class="breadcrumb-item"><a href="/dashboard">Home</a>
                </li>
                <li class="breadcrumb-item"><a href="/kelas">Kelola Data</a>
                </li>
                <li class="breadcrumb-item active">Edit Kelas
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
                                <form method="post" action="/kelas/{{ $kelas->id }}" enctype="multipart/form-data">
                                    @method('put')
                                    @csrf
                                    <div class="row">
                                        <div class="col s12 ">
                                            <div class="input-field">
                                                <input id="name" name="name" type="text" class="validate" data-error=".errorTxt1" value="{{ old('name', $kelas->name) }}" required>
                                                <label>Nama Kelas</label>
                                                <small class="errorTxt1"></small>
                                            </div>
                                        </div>
                                        <div class="col s12 ">
                                            <div class="input-field">
                                                <select name="name_class">
                                                    <option>--Pilih Kelas--</option>
                                                    <option value="Kelas Anak-anak" {{ old('name_class', $kelas->name_class) == 'Kelas Anak-anak' ? 'selected' : '' }}>Kelas Anak-anak</option>
                                                    <option value="Kelas Remaja" {{ old('name_class', $kelas->name_class) == 'Kelas Remaja' ? 'selected' : '' }}>Kelas Remaja</option>
                                                    <option value="Kelas Dewasa Reguler" {{ old('name_class', $kelas->name_class) == 'Kelas Dewasa Reguler' ? 'selected' : '' }}>Kelas Dewasa Reguler</option>
                                                    <option value="Kelas Pekerja" {{ old('name_class', $kelas->name_class) == 'Kelas Pekerja' ? 'selected' : '' }}>Kelas Pekerja</option>
                                                </select>
                                                <label>Kelas</label>
                                            </div>
                                        </div>
                                        <div class="col s12 ">
                                            <div class="input-field">
                                                <select name="name_teacher">
                                                    <option>--Pilih Mu'allimat--</option>
                                                    @foreach ($gurus as $guru)
                                                        <option value="{{ $guru->name }}" {{  old('name_teacher', $kelas->name_teacher) == $guru->name ? 'selected' : '' }}>{{ $guru->name }}</option>
                                                    @endforeach
                                                </select>
                                                <label>Mu'allimat</label>
                                            </div>
                                        </div>
                                        <div class="col s12 ">
                                            <div class="input-field">
                                                <input id="room" name="room" type="text" class="validate" data-error=".errorTxt2" value="{{ old('room', $kelas->room) }}" required>
                                                <label>Ruangan</label>
                                                <small class="errorTxt2"></small>
                                            </div>
                                        </div>
                                        <div class="col s12 ">
                                            <div class="input-field">
                                                <input id="information" name="information" type="text" class="validate" data-error=".errorTxt3" value="{{ old('information', $kelas->information) }}" required>
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
