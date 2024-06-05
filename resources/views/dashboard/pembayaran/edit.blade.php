@extends('layouts.main_dashboard')

@section('container')
      <div class="breadcrumbs-dark pb-0 pt-4" id="breadcrumbs-wrapper">
        <!-- Search for small screen-->
        <div class="container">
          <div class="row">
            <div class="col s10 m6 l6">
              <h5 class="breadcrumbs-title mt-0 mb-0"><span>Edit Data Pembayaran SPP</span></h5>
              <ol class="breadcrumbs mb-0">
                <li class="breadcrumb-item"><a href="/dashboard">Home</a>
                </li>
                <li class="breadcrumb-item"><a href="/pembayaran">Pembayaran</a>
                </li>
                <li class="breadcrumb-item active">Edit Data Pembayaran SPP
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
                                {{-- @dd($data_pembayaran->name) --}}
                                <form method="post" action="/pembayaran/{{ $tagihan->id }}" enctype="multipart/form-data">
                                    @method('put')
                                    @csrf
                                    <div class="row">
                                        <div class="col s12 m6">
                                            <div class="row">
                                                <div class="col s12 input-field">
                                                    <input id="name" name="name" type="text" class="validate" data-error=".errorTxt3" value="{{ old('name', $data_pembayaran->name) }}" required>
                                                    <label for="name">Nama</label>
                                                    <small class="errorTxt3"></small>
                                                </div>
                                                <div class="col s12 input-field">
                                                    <input id="month" name="month" type="text" class="validate" data-error=".errorTxt5" value="{{ old('month', $tagihan->month) }}" required>
                                                    <label for="month">Bulan</label>
                                                    <small class="errorTxt5"></small>
                                                </div>
                                                <div class="col s12 input-field">
                                                    <input id="amount" name="amount" type="text" class="validate" data-error=".errorTxt2" value="{{ old('amount', $tagihan->amount) }}" required>
                                                    <label for="amount">Jumlah</label>
                                                    <small class="errorTxt2"></small>
                                                </div>
                                                <div class="col s12 input-field">
                                                    <label for="amount">Bukti Pembayaran</label>
                                                    @if ($tagihan->receipt)
                                                        <div style="float: left; margin-top: 40px;">
                                                            <a href="{{ asset('storage/' . $tagihan->receipt) }}" data-gallery="gallery-2">
                                                                <img src="{{ asset('storage/' . $tagihan->receipt) }}" alt="" style="max-width: 150px; max-height: 150px;">
                                                            </a>
                                                        </div>
                                                    @else
                                                        <p style="margin-top: 50px">Bukti Pembayaran Tidak Ada</p>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col s12 m6">
                                            <div class="row">
                                                <div class="col s12 input-field">
                                                    <input id="class" name="class" type="text" class="validate" data-error=".errorTxt2" value="{{ old('class', $data_pembayaran->class) }}" required>
                                                    <label for="class">Kelas</label>
                                                    <small class="errorTxt2"></small>
                                                </div>
                                                <div class="col s12 input-field">
                                                    <input id="year" name="year" type="text" class="validate" data-error=".errorTxt1" value="{{ old('year', $tagihan->year) }}" required>
                                                    <label for="year">Tahun</label>
                                                    <small class="errorTxt1"></small>
                                                </div> 
                                                <div class="col s12 input-field">
                                                    <select name="status" id="status">
                                                        <option value="Belum Lunas" {{ old('status', $tagihan->status) == 'Belum Lunas' ? 'selected' : '' }}>Belum Lunas</option>
                                                        <option value="Menunggu Konfirmasi" {{ old('status', $tagihan->status) == 'Menunggu Konfirmasi' ? 'selected' : '' }}>Menunggu Konfirmasi</option>
                                                        <option value="Lunas" {{ old('status', $tagihan->status) == 'Lunas' ? 'selected' : '' }}>Lunas</option>
                                                    </select>
                                                    <label for="status">Status</label>
                                                    <small class="errorTxt1"></small>
                                                </div>   
                                            </div>
                                        </div>

                                        <input type="hidden" name="id" value="{{ $tagihan->id }}">

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
