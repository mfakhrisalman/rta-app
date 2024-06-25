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
                                <h6 class="form-header-text"><i class="material-icons">chrome_reader_mode</i> Pendaftaraan Ujian</h6>
                            </div>
                        </div>
                    </div>
                <!-- Contact Sidenav -->
                <div id="sidebar-list" class="row contact-sidenav ml-0 mr-0">
                    <div class="col s12 m12  contact-form margin-top-contact">
                        <div class="row">
                            <form method="post" action="/daftar-ujian" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="input-field col m6 s12">
                                        <input type="text" value="{{auth()->user()->name}}" readonly>
                                        <label>Nama</label>
                                    </div>
                                    <div class="input-field col m6 s12">
                                        <input id="class" name="class" type="text" class="validate" value="{{auth()->user()->class}}" readonly>
                                        <label for="class">Kelas</label>
                                    </div>
                                </div>
                                <input type="hidden" id="id" name="id" value="{{auth()->user()->id}}"/>
                                <div class="row">
                                    <div class="input-field col m6 s12">
                                        @foreach($datas as $data)
                                        <input type="text" class="validate" value="{{ $data->type_class }}" readonly>
                                        <label for="year">Kelas Musyrifah</label>
                                    </div>
                                    <div class="input-field col m6 s12">
                                        <input type="text" class="validate" value="{{ $data->type_class }}" readonly>
                                        <label for="amount">Nama Musyrifah</label>
                                    </div>                                
                                    @endforeach
                                    <div class="input-field col m6 s12">
                                        <label for="amount">Jumlah Juz</label>
                                        <input type="text" name="qty_juz" class="validate" required>
                                    </div>
                                    <div class="input-field col m6 s12">
                                        <label for="amount">Tabi'</label>
                                        <select name="tabi" id="tabi">
                                            <option value="">Pilih Tabi'</option>
                                            <option value="Tabi' Dalam">Tabi' Dalam</option>
                                            <option value="Tabi' Luar">Tabi' Luar</option>
                                        </select>
                                    </div>
                                        <input type="hidden" id="status" name="status" value="Sudah Daftar"/>
                                    <button type="submit" class="waves-effect waves-light btn indigo">Daftar</button>
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
