@extends('layouts.main_dashboard')

@section('container')
      <div class="breadcrumbs-dark pb-0 pt-4" id="breadcrumbs-wrapper">
        <!-- Search for small screen-->
        <div class="container">
          <div class="row">
            <div class="col s10 m6 l6">
              <h5 class="breadcrumbs-title mt-0 mb-0"><span>Tambah Tagihan</span></h5>
              <ol class="breadcrumbs mb-0">
                <li class="breadcrumb-item"><a href="/dashboard">Home</a>
                </li>
                <li class="breadcrumb-item"><a href="/tagihan">Tagihan SPP</a>
                </li>
                <li class="breadcrumb-item active">Tambah Tagihan
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
                                <form method="post" action="/tagihan" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col s12 ">
                                            <div class="input-field">
                                                <select name="class">
                                                    <option>--Pilih Kelas--</option>
                                                    <option value="Kelas Anak-anak">Kelas Anak-anak</option>
                                                    <option value="Kelas Remaja">Kelas Remaja</option>
                                                    <option value="Kelas Pekerja">Kelas Pekerja</option>
                                                    <option value="Kelas Reguler">Kelas Reguler</option>
                                                </select>
                                                <label>Kelas</label>
                                            </div>
                                        </div>
                                        <div class="col s12 ">
                                            <div class="input-field">
                                                <select name="month">
                                                    <option>--Pilih Bulan--</option>
                                                    <option value="Januari">Januari</option>
                                                    <option value="Februari">Februari</option>
                                                    <option value="Maret">Maret</option>
                                                    <option value="April">April</option>
                                                    <option value="Mei">Mei</option>
                                                    <option value="Juni">Juni</option>
                                                    <option value="Juli">Juli</option>
                                                    <option value="Agustus">Agustus</option>
                                                    <option value="September">September</option>
                                                    <option value="Oktober">Oktober</option>
                                                    <option value="November">November</option>
                                                    <option value="Desember">Desember</option>
                                                </select>
                                                <label>Kelas</label>
                                            </div>
                                        </div>
                                        <div class="col s12 ">
                                            <div class="input-field">
                                                <input id="year" name="year" type="text" class="validate" data-error=".errorTxt2" required>
                                                <label>Tahun</label>
                                                <small class="errorTxt2"></small>
                                            </div>
                                        </div>
                                        <div class="col s12 ">
                                            <div class="input-field">
                                                <input id="amount" name="amount" type="text" class="validate" data-error=".errorTxt3" required>
                                                <label>Jumlah</label>
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
