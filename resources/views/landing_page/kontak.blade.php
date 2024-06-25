@extends('layouts.main')

@section('container')
<style>
  #myInputContainer {
    display: flex;
    align-items: center;
    width: 70%;
    margin-bottom: 10px;
  }

  #myInput {
    flex: 1;
    padding: 10px;
    margin-right: 10px;
  }

  #copyButton {
    padding: 10px;
    cursor: pointer;
    background-color: #013A67;
    color: white;
    border: none;
  }
  
  .nav-pills .nav-link.active {
      background-color: #12B76A;
      color: white;
    }
    .nav-pills .nav-link {
      color: #000;
    }
</style>
<div class="row">
  <div class="col-sm-6">
    <h1 class="mb-3">Hubungi Kami</h1>
    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
      <li class="nav-item" role="presentation">
        <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">Email</button>
      </li>
      <li class="nav-item" role="presentation">
        <button class="nav-link " id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Donasi</button>
      </li>
    </ul>
    <div class="tab-content" id="pills-tabContent">
      <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
        <main class="form-callme ">
          <form action="/kirim-kritiksaran" method="post">
            @csrf
            @if(session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
              {{ session('success') }}
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
            <div class="form-floating">
              <input type="text" class="form-control form-callme-1" name="name" id="name" placeholder="Nama Lengkap" required>
              <label for="name">Nama Lengkap</label>
            </div>
            <div class="form-floating">
              <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com" required>
              <label for="email">Email address</label>
            </div>
            <div class="form-floating">
              <input type="text" class="form-control form-callme-2" id="message" name="message" placeholder="Pesan" required>
              <label for="message">Pesan</label>
            </div>
            <div class="form-floating mb-lg-3">
            <button class="w-80 btn btn-lg" style="background-color: #013A67; color: white; width: 80%;" type="submit">Kirim</button>
            </div>
          </form>
        </main>
      </div>
      <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
        <div class="card">
          <div class="card-body ">
              <h4><i class="bi bi-bank"></i></h4>
              <h3>Donasi</h3>
    
              <p>Bank BSI (451)</p>
              <p>
                722 8877 667 a/n YYS NI
              </p>
              <p>Rumah Tahfidzh</p>
              <!-- The text field -->
              {{-- <div id="myInputContainer">
                <input type="text" value="722 8877 667" id="myInput">
                <button onclick="myFunction()" id="copyButton">
                  <img src="img/copy-content.png" alt="Copy to Clipboard" width="20" height="20">

                </button>
              </div> --}}
              
          </div>
        </div>
      </div>

    </div>
  </div>

  <div class="col-sm-6 d-none d-lg-block" style="margin-right: -14.5px">
    <img src="img/sidekontak.png" alt="Login image" class="img-fluid" style="width: 623px; height: 733px; margin-top: -48px; margin-bottom: -48px; ">
  </div>

</div>
<script>
function myFunction() {
  // Get the text field
  var copyText = document.getElementById("myInput");

  // Select the text field
  copyText.select();
  copyText.setSelectionRange(0, 99999); // For mobile devices

   // Copy the text inside the text field
  navigator.clipboard.writeText(copyText.value);

}
  </script>
@endsection
