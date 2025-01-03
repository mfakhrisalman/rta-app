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
                                <h6 class="form-header-text"><i class="material-icons">chrome_reader_mode</i> Edit Data Diri</h6>
                            </div>
                        </div>
                    </div>
                <!-- Contact Sidenav -->
                <div id="sidebar-list" class="row contact-sidenav ml-0 mr-0">
                    <div class="col s12 m12  contact-form margin-top-contact">
                        <div class="row">
                            <form method="post" action="/edit-data-diri" enctype="multipart/form-data">
                                @csrf
                                @foreach($datas as $data)
                                <div class="row">
                                    <div class="input-field col m6 s12">
                                        <input type="text" value="{{ $data->name }}" name="name" require>
                                        <label>Nama</label>
                                    </div>
                                    <div class="input-field col m6 s12">
                                        <input id="email" name="email" type="email" class="validate" value="{{ $data->email }}" require>
                                        <label for="class">Email</label>
                                    </div>
                                </div>
                                <input type="hidden" id="id" name="id" value="{{ $data->id }}"/>
                                <div class="row">
                                    <!-- Kelas Musyrifah -->
                                        <div class="input-field col s12 m6">
                                            <input type="date" id="birth_date" name="birth_date" class="validate" value="{{ $data->birth_date }}" require>
                                            <label for="birth_date">Tanggal Lahir</label>
                                        </div>
                                        <!-- Nama Musyrifah -->
                                        <div class="input-field col s12 m6">
                                            <input type="text" id="nohp" name="nohp" class="validate" value="{{ $data->nohp }}" require>
                                            <label for="nohp">Nomor Handphone</label>
                                        </div>   
                                
                                    <!-- Jumlah Juz -->
                                    <div class="input-field col s12 m12">
                                        <textarea id="address" name="address" class="materialize-textarea" required>{{ $data->address }}</textarea>
                                        <label for="address">Alamat</label>
                                    </div>
                                    @endforeach
                                
                                    <!-- Daftar Button -->
                                    <div class="col s12">
                                        <button type="submit" class="waves-effect waves-light btn indigo">Simpan</button>
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
