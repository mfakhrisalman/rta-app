@extends('layouts.main_dashboard')

@section('container')
<div class="breadcrumbs-dark pb-0 pt-4" id="breadcrumbs-wrapper">
    <!-- Search for small screen-->
    <div class="container">
        <div class="row">
            <div class="col s10 m6 l6">
                <h5 class="breadcrumbs-title mt-0 mb-0"><span>Setoran Hafalan</span></h5>
                <ol class="breadcrumbs mb-0">
                    <li class="breadcrumb-item"><a href="/dashboard">Home</a>
                    </li>
                    <li class="breadcrumb-item"><a href="/guru">Setoran Hafalan</a>
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
                            <form method="post" action="/setoran" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col s12 m6">
                                        <div class="row">
                                            <div class="col s12 input-field">
                                                <input id="date" name="date" type="text" class="validate" data-error=".errorTxt1" required readonly>
                                                <label>Tanggal</label>
                                                <small class="errorTxt1"></small>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col s12 m6">
                                        <div class="row">
                                            <div class="col s12 input-field">
                                                <select name="name_student" id="select-student">
                                                    <option value="">Pilih Siswa</option>
                                                    @foreach ($siswas as $siswa)
                                                    @if($siswa->name_teacher == auth()->user()->name)
                                                    <option value="{{ $siswa->name_student }}" data-name-class="{{ $siswa->name_class }}" data-type-class="{{ $siswa->type_class }}">{{ $siswa->name_student }}</option>
                                                    @endif
                                                    @endforeach
                                                </select>
                                                <label>Nama</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col s12 ">
                                        <div class="input-field">
                                            <select name="surah[]" class="select2 browser-default" multiple="multiple" id="large-select-multi">
                                                @foreach ($surahs as $surah)
                                                <option value="{{ $surah->name }}">{{ $surah->name }}</option>
                                                @endforeach
                                            </select>
                                            <label for="surah">Surah</label>
                                        </div>
                                    </div>
                                    <div class="col s12 ">
                                        <div class="input-field">
                                            <input id="information" name="information" type="text">
                                            <label for="information">Keterangan</label>
                                        </div>
                                    </div>
                                    <input type="hidden" id="created_by" name="created_by" value="{{ auth()->user()->name}}">
                                    <input type="hidden" id="name_class" name="name_class">
                                    <input type="hidden" id="type_class" name="type_class">

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

<script>
    // Ambil elemen input tanggal
    var inputTanggal = document.getElementById('date');

    // Buat objek tanggal hari ini
    var today = new Date();

    // Format tanggal menjadi 'YYYY-MM-DD'
    var formattedDate = today.getFullYear() + '-' + (today.getMonth() + 1) + '-' + today.getDate();

    // Set nilai input tanggal
    inputTanggal.value = formattedDate;

    document.getElementById('select-student').addEventListener('change', function() {
        var selectedOption = this.options[this.selectedIndex];
        if (selectedOption.value !== '') {
            // Mengambil nilai name_class dan type_class dari atribut data-name-class dan data-type-class
            var nameClass = selectedOption.getAttribute('data-name-class');
            var typeClass = selectedOption.getAttribute('data-type-class');

            // Menampilkan nilai name_class dan type_class di inputan yang sesuai
            document.getElementById('name_class').value = nameClass;
            document.getElementById('type_class').value = typeClass;
        } else {
            // Mengosongkan nilai jika tidak ada yang dipilih
            document.getElementById('name_class').value = '';
            document.getElementById('type_class').value = '';
        }
    });
</script>
@endsection
