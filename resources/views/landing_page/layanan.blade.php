@extends('layouts.main')
@section('container')
<div class="row">
  <!-- Kolom untuk card -->
  <div class="col-lg-6 d-none d-lg-block" style="margin-left: -100px; margin-top: -30px; margin-bottom: -20px;">
    <div class="card mw-100 mb-3 mh-100" style="background-color: #013A67; border-radius: 16px; height: 670px; width: 85%; ">
      <div class="card-body">
        <h1 class="card-title p-4 text-white">Selamat Datang di Portal Rumah Tahfizh Akhwat Raudhatul Jannah</h1>
        <p class="card-text p-4 text-justify text-white-50">Pastikan kamu sudah terdaftar sebagai siswa RTA untuk dapat mengakses halaman selanjutnya.</p>
      </div>
    </div>
  </div>

  <!-- Kolom untuk formulir -->
    <div class="col-lg-4">
      @if(session()->has('success'))
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
      @endif
      <main class="form-signin">
        <a href="#" style="margin-left: 26%;"><img src="img/logo.png" alt="Logo RTA"></a>
          <form action="/layanan" method="post">
            @csrf
            <div class="form-floating">
              <input type="email" name="email" id="email" class="form-control" placeholder="name@example.com">
              <label for="email">Email address</label>
            </div>
            <div class="form-floating">
              <input type="password" name="password" id="password" class="form-control" placeholder="Password">
              <label for="password">Password</label>
            </div>
            <button class="w-100 btn btn-lg" style="background-color: #013A67; color: white" type="submit">Login</button>
          </form>
        </main>
    </div>
</div>

@endsection