@extends('layouts.main_dashboard')

@section('container')
      <div class="breadcrumbs-dark pb-0 pt-4" id="breadcrumbs-wrapper">
        <!-- Search for small screen-->
        <div class="container">
          <div class="row">
            <div class="col s10 m6 l6">
              <h5 class="breadcrumbs-title mt-0 mb-0"><span>Edit Donasi</span></h5>
              <ol class="breadcrumbs mb-0">
                <li class="breadcrumb-item"><a href="/dashboard">Home</a>
                </li>
                <li class="breadcrumb-item"><a href="/donasi">Donasi</a>
                </li>
                <li class="breadcrumb-item active">Edit Donasi
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
                                <form method="post" action="/donasi/{{ $donasi->id }}" enctype="multipart/form-data">
                                    @method('put')
                                    @csrf
                                    <div class="row">
                                        <div class="col s12 ">
                                            <div class="input-field">
                                                <input id="date" name="date" type="date" class="validate" data-error=".errorTxt1" value="{{ old('class', $donasi->date) }}" required>
                                                <label>Tanggal Donasi</label>
                                                <small class="errorTxt1"></small>
                                            </div>
                                        </div>
                                        <div class="col s12 ">
                                            <div class="input-field">
                                                <input id="name_donor" name="name_donor" type="text" class="validate" data-error=".errorTxt4" value="{{ old('class', $donasi->name_donor) }}" required>
                                                <label>Nama Donatur</label>
                                                <small class="errorTxt4"></small>
                                            </div>
                                        </div>
                                        <div class="col s12 ">
                                            <div class="input-field">
                                                <input id="amount" name="amount" type="text" class="validate" data-error=".errorTxt2" value="{{ old('class', $donasi->amount) }}" required>
                                                <label>Jumlah</label>
                                                <small class="errorTxt2"></small>
                                            </div>
                                        </div>
                                        <div class="col s12 ">
                                            <div class="input-field">
                                                <input id="information" name="information" type="text" class="validate" data-error=".errorTxt3" value="{{ old('class', $donasi->information) }}" required>
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
