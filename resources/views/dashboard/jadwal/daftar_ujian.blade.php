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
                                    <!-- Kelas Musyrifah -->
                                    @foreach($datas as $data)
                                        <div class="input-field col s12 m6">
                                            <input type="text" id="type_class" class="validate" value="{{ $data->type_class }}" readonly>
                                            <label for="type_class">Kelas Musyrifah</label>
                                        </div>
                                        <!-- Nama Musyrifah -->
                                        <div class="input-field col s12 m6">
                                            <input type="text" id="name_teacher" class="validate" value="{{ $data->name_teacher }}" readonly>
                                            <label for="name_teacher">Nama Musyrifah</label>
                                        </div>   
                                    @endforeach
                                
                                    <!-- Jumlah Juz -->
                                    <div class="input-field col s12 m6">
                                        <input type="text" id="qty_juz" name="qty_juz" class="validate" required>
                                        <label for="qty_juz">Jumlah Juz</label>
                                    </div>
                                
                                    <!-- Tabi' -->
                                    <div class="input-field col s12 m6">
                                        <select name="tabi" id="tabi" required>
                                            <option value="" disabled selected>Pilih Tabi'</option>
                                            <option value="Tabi' Dalam">Tabi' Dalam</option>
                                            <option value="Tabi' Luar">Tabi' Luar</option>
                                        </select>
                                        <label for="tabi">Tabi'</label>
                                    </div>
                                
                                    <!-- Hidden Status -->
                                    <input type="hidden" id="status" name="status" value="Sudah Daftar"/>
                                
                                    <!-- Daftar Button -->
                                    <div class="col s12">
                                        <button type="submit" class="waves-effect waves-light btn indigo">Daftar</button>
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
