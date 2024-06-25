@extends('layouts.main_dashboard')

@section('container')
<div class="col s12">
    <div class="container">
      <!-- Contact Us -->
        <div id="contact-us" class="section">
            <div class="app-wrapper">
                    <div class="contact-header">
                        <div class="row contact-us ml-0 mr-0">
                            <div class="col s12 m12  form-header">
                                <h6 class="form-header-text"><i class="material-icons">receipt</i> Pembayaran SPP</h6>
                            </div>
                        </div>
                    </div>

                <!-- Contact Sidenav -->
                <div id="sidebar-list" class="row contact-sidenav ml-0 mr-0">
                    <div class="col s12 m12  contact-form margin-top-contact">
                        <div class="row">
                            <form method="post" action="/bayar-spp/{{ $tagihan->id }}" enctype="multipart/form-data">
                                @method('put')
                                @csrf
                                <div class="row">
                                    <div class="input-field col m6 s12">
                                        <input type="text" value="BANK BSI(451) 722 8877 667 a/n YYS NI" readonly>
                                        <label>Nomor Rekening Tujuan</label>
                                    </div>
                                    <div class="input-field col m6 s12">
                                        <input id="month" name="month" type="text" class="validate" value="{{ old('month', $tagihan->month) }}" readonly>
                                        <label for="month">Bulan</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col m6 s12">
                                        <input id="year" name="year" type="text" class="validate" value="{{ old('month', $tagihan->year) }}" readonly>
                                        <label for="year">Tahun</label>
                                    </div>
                                    <div class="input-field col m6 s12">
                                        <input id="amount" name="amount" type="text" class="validate" value="{{ old('month', $tagihan->amount) }}" readonly>
                                        <label for="amount">Jumlah</label>
                                    </div>
                                    <div class="input-field col s12 width-100">
                                        <input type="file" id="receipt" name="receipt" class="dropify"/>
                                        <label for="amount">Bukti Pembayaran SPP</label>
                                    </div>
                                        <input type="hidden" id="status" name="status" value="Menunggu Konfirmasi"/>
                                        <input type="hidden" id="id" name="id" value="{{ old('id', $tagihan->id) }}"/>
                                    <button type="submit" class="waves-effect waves-light btn indigo">Kirim</button>
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
