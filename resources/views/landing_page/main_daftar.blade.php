<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>RTA | {{ $title }}</title>
     {{-- Bootstrap --}}
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    
     {{-- FontAwesome --}}
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
 
     
     {{-- Custom CSS --}}
     <link rel="stylesheet" href="style.css">
     
     {{-- Bootstrap JavaScript --}}
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
 
</head>
<body>
        <div class="container-fluid">
          <div class="row">
            <div class="col-sm-5 px-0 d-none d-sm-block">
                  <div class="card mw-100 mb-3 mh-100" style="background-color: #013A67; border-radius: 16px; height:725px; width: 607px; margin: 10px 5px 15px 20px;">
                    <a class="p-3 text-white text-decoration-none" href="/program-tahfidz">Kembali </a>
                    <div class="card-body text-white p-5">
                      <h1 class="card-title text-white mb-5">Jadi bagian dari kami sekarang . . .</h1>
                      <h5>Program :</h5>
                      <p class="text-white-50">{{ $program }}</p>
                      <h5>Deskripsi :</h5>
                      <p class="text-white-50">{{ $deskripsi }}</p>
                      <h5>Waktu :</h5>
                      <p class="text-white-50">{{ $waktu }}</p>
                    </div>
                    <div class="card mw-100 mb-3 mh-100" style="background-color:white; border-radius: 16px; height:134px; width:90% ; margin: auto ">
                        <img src="img/logo_daftar.png" alt="Al-Quran" width="20%" class="m-3" style="float: right">
                        <h3> خَيْرُكُمْ مَنْ تَعَلَّمَ الْقُرْآنَ وَعَلَّمَهُ </h3>
                        <p class="text-black-50"><br>Sebaik-baik kalian adalah orang yang mempelajari Al-Qur’an dan mengajarkannya”. (HR. Bukhori).</p>
                    </div>
                  </div>
              </div>
              <div class="col-sm-6 text-black p-5">
                <main class="form-daftar">
                  <h1>Pendaftaraan Tahfidz</h1>
                    <form action="/daftar" method="post"> 
                      @csrf
                      <div class="form-floating">
                        <input type="text" name="name" id="name" class="form-control" placeholder="Nama Lengkap">
                        <label for="nama">Nama Lengkap</label>
                      </div>
                      <div class="form-floating">
                        <input type="date" name="birth_date" id="birth_date" class="form-control" placeholder="DD/MM/YY">
                        <label for="birth_date">Tanggal Lahir</label>
                      </div>
                      <div class="form-floating">
                        <input type="email" name="email" id="email" class="form-control" placeholder="name@example.com">
                        <label for="email">Email address</label>
                      </div>
                      <div class="form-floating">
                          <input type="text" name="nohp" id="nohp" class="form-control"  placeholder="Nomor WhatsApp">
                          <label for="nohp">Nomor WhatsApp Aktif</label>
                      </div>                       
                      <div class="form-floating">
                        <input type="text" name="address" id="address" class="form-control" placeholder="Alamat">
                        <label for="address">Alamat</label>
                      </div>
                      <input type="hidden" name="class" value="{{ $program }}">
                      <button class="w-100 btn btn-lg" style="background-color: #013A67; color: white" type="submit">KIRIM</button>
                    </form>
                </main>
          </div>
          </div>
        </div>
      </section>
</body>
</html>