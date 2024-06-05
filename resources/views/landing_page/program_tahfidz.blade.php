@extends('layouts.main')

@section('container')
<div class="col-md-9 text-center mx-auto">
  <h1>Ingin mengikuti kelas tahfizh tapi terhalang banyak kesibukan? Kami punya solusinya.</h1>
  <p class=" mb-5 mt-3">Kami mengerti akan kebutuhan siswa dan calon siswa kami dengan demografi yang sangat luas. Kami menawarkan beberapa program yang dapat menyesuaikan dengan jadwal siswa.</p>
  <h4>Program Tahfizh</h4>
</div>
  <div class="row row-cols-1 row-cols-md-2 mt-5">
  
  <div class="col mb-3">
    <div class="card">
      <img src="img/reguler.png" class="card-img-top" alt="Kelas Reguler">
      <div class="card-body">
        <h5 class="card-title">Kelas Reguler </h5>
        <p class="card-text">Kelas yang dikhususkan untuk Ibu Rumah Tangga</p>
        <small>Senin - Jumat</small>
      </div>
      <a href="/daftar-reguler" class="btn btn-primary position-absolute bottom-0 end-0 mb-5 me-4" style="background-color:#013A67; ">Daftar</a>
    </div>
  </div>

  <div class="col mb-3">
    <div class="card">
      <img src="img/pekerja.png" class="card-img-top" alt="Kelas Pekerja">
      <div class="card-body">
        <h5 class="card-title">Kelas Ibu ibu Pekerja </h5>
        <p class="card-text">Dikhususkan untuk para pekerja</p>
        <small>Sabtu</small>
      </div>
      <a href="/daftar-pekerja" class="btn btn-primary position-absolute bottom-0 end-0 mb-5 me-4" style="background-color:#013A67; ">Daftar</a>
    </div>
  </div>
  
  
  <div class="col mb-3">
    <div class="card position-relative">
      <img src="img/remaja.png" class="card-img-top" alt="Kelas Remaja">
      <div class="card-body">
        <h5 class="card-title">Kelas Remaja</h5>
        <p class="card-text">Untuk umur 17 - 25 tahun sampai dengan kuliah</p>
        <small>Senin-kamis (2x Seminggu)</small>
      </div>
      <a href="/daftar-remaja" class="btn btn-primary position-absolute bottom-0 end-0 mb-5 me-4" style="background-color:#013A67; ">Daftar</a>
    </div>
  </div>
  

  <div class="col mb-3">
    <div class="card">
      <img src="img/anak.png" class="card-img-top" alt="Kelas Anak">
      <div class="card-body">
        <h5 class="card-title">Kelas Anak-anak</h5>
        <p class="card-text">Khusus anak SD</p>
        <small>Senin - Sabtu (3x Seminggu)</small>
      </div>
      <a href="/daftar-anak" class="btn btn-primary position-absolute bottom-0 end-0 mb-5 me-4" style="background-color:#013A67; ">Daftar</a>
    </div>
  </div>

</div>
@endsection