@extends('layouts.main')

@section('container')
<div class="col-md-9 text-center mx-auto p-5 ">
  <b><h1 style="color:#013A67;">Pendidikan Tahfizh Al-Quran Berkualitas untuk Muslimah Pekanbaru</h1></b>
</div>
<div id="carouselExampleDark" class="carousel carousel-dark slide col-9 mx-auto">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active" data-bs-interval="10000">
      <img src="img/slide1.png" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        {{-- <h5>First slide label</h5> --}}
        {{-- <p>Some representative placeholder content for the first slide.</p> --}}
      </div>
    </div>
    <div class="carousel-item" data-bs-interval="2000">
      <img src="img/slide3.png" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        {{-- <h5>Second slide label</h5>
        <p>Some representative placeholder content for the second slide.</p> --}}
      </div>
    </div>
    <div class="carousel-item">
      <img src="img/slide2.png" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        {{-- <h5>Third slide label</h5>
        <p>Some representative placeholder content for the third slide.</p> --}}
      </div>
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
<div class="col-md-10 mx-auto text-center">
  <p class="mt-5">
    RTA memiliki izin resmi untuk berdiri dibawah Kementrian Agama Republik Indonesia pada tahun 2021 dan kami berkomitmen membantu Muslimah yang berdomisili di kota Pekanbaru untuk mendapat pendidikan tahfizh Al-Qur’an yang berkualitas. Tidak hanya menyejahterakan secara akademis, kami juga bertekad untuk menyejahterakan anggota kami dari aspek sosial.
  </p>
  <h1 class="mt-5" style="color:#013A67;">
    Mengapa Memilih RTA?
  </h1>
  <p class="mt-5">
    RTA menawarkan berbagai program kelas yang dapat menyesuaikan dengan kebutuhan anda, dilengkapi dengan fasilitas-fasilitas untuk mendukung suasana kegiatan belajar-mengajar yang nyaman.
  </p>
</div>
@endsection
