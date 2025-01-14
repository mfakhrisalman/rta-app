@extends('layouts.main_dashboard')

@section('container')
<div class="breadcrumbs-dark pb-0 pt-1" id="breadcrumbs-wrapper">
   @can('admin')
      @if($data['totalKonfirmasi'] != 0)
      <div class="container">
         <div class="row">
               <div class="col s12 m6 l12">
                  <div class="card-alert card gradient-45deg-purple-deep-orange">
                     <div class="card-content white-text">
                           <p>
                              <i class="material-icons">notifications</i> Notif: Anda Memiliki {{ $data['totalKonfirmasi'] }} Tagihan SPP Yang Menunggu Konfirmasi Pembayaran.
                           </p>
                     </div>
                  </div>
               </div>
         </div>
      </div>
      @endif

      
   @endcan
</div>
<div class="col s12">
   <div class="container">
      <div class="section">
         @can('admin')
         <!--card stats start-->
         <div id="card-stats" class="pt-0">
            <div class="row">
               <div class="col s12 m6 l6 xl3">
                  <div class="card gradient-45deg-light-blue-cyan gradient-shadow min-height-100 white-text animate fadeLeft">
                     <div class="padding-4">
                        <div class="row">
                           <div class="col s7 m7">
                              <i class="material-icons background-round mt-5">perm_identity</i>
                              <p>Pendaftar</p>
                           </div>
                           <div class="col s5 m5 right-align">
                              <h5 class="mb-0 white-text">{{ $data['totalPendaftars'] }}</h5>
                              <p class="no-margin">Orang</p>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="col s12 m6 l6 xl3">
                  <div class="card gradient-45deg-red-pink gradient-shadow min-height-100 white-text animate fadeLeft">
                     <div class="padding-4">
                        <div class="row">
                           <div class="col s7 m7">
                              <i class="material-icons background-round mt-5">perm_identity</i>
                              <p>Siswa</p>
                           </div>
                           <div class="col s5 m5 right-align">
                              <h5 class="mb-0 white-text">{{ $data['totalSiswas']  }}</h5>
                              <p class="no-margin">Akhawat</p>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="col s12 m6 l6 xl3">
                  <div class="card gradient-45deg-amber-amber gradient-shadow min-height-100 white-text animate fadeRight">
                     <div class="padding-4">
                        <div class="row">
                           <div class="col s7 m7">
                              <i class="material-icons background-round mt-5">perm_identity</i>
                              <p>Guru</p>
                           </div>
                           <div class="col s5 m5 right-align">
                              <h5 class="mb-0 white-text">{{ $data['totalGurus']  }}</h5>
                              <p class="no-margin">Mu'allimat</p>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="col s12 m6 l6 xl3">
                  <div class="card gradient-45deg-green-teal gradient-shadow min-height-100 white-text animate fadeRight">
                     <div class="padding-4">
                        <div class="row">
                           <div class="col s7 m7">
                              <i class="material-icons background-round mt-5">comment</i>
                              <p>Kritik Saran</p>
                           </div>
                           <div class="col s5 m5 right-align">
                              <h5 class="mb-0 white-text">{{ $data['totalKritikSarans']  }}</h5>
                              {{-- <p class="no-margin"></p> --}}
                              {{-- <p>$25,000</p> --}}
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <!--card stats end-->
      <div class="row">
         <div class="col m5 card-width">
            <div class="card border-radius-6 user-statistics-card animate fadeLeft">
               <div class="card-content center-align">
                  <div class="p-6 m-20 bg-white rounded shadow">
                     {!! $jumlahSiswaKelas->container() !!}
                  </div>
               </div>
            </div>
         </div>
         <div class="col m7 card-width">
            <div class="card border-radius-6 user-statistics-card animate fadeLeft">
               <div class="card-content center-align">
                  <div class="p-6 m-20 bg-white rounded shadow">
                     {!! $kelasBayarSpp->container() !!}
                  </div>
               </div>
            </div>
         </div>
      </div>
        
         @endcan

         @can('siswa')
         {{-- @php
         $belumLunas = $spp->contains('status', 'Belum Lunas');
         @endphp
         <div class="col s12">
         @if($belumLunas)
               <div class="card-alert card gradient-45deg-purple-deep-orange">
                  <div class="card-content white-text">
                     <p>
                        <i class="material-icons">info_outline</i> INFO : Ada tagihan SPP yang belum Anda bayar.
                     </p>
                  </div>
               </div>
         @else
               <div class="card-alert card gradient-45deg-green-teal">
                  <div class="card-content white-text">
                     <p>
                        <i class="material-icons">check</i> SUKSES : Semua tagihan SPP Anda sudah lunas
                     </p>
                  </div>
               </div>
         @endif
         </div> --}}
         @php
         $belumDaftar = $daftar_ujian->contains('status', 'Belum Daftar');
         $sudahDaftar = $daftar_ujian->contains('status', 'Sudah Daftar');
         @endphp
         <div class="col s12">
            @if($belumDaftar)
                  <div class="card-alert card gradient-45deg-purple-deep-orange">
                     <div class="card-content white-text">
                        <p>
                           <i class="material-icons">info_outline</i> INFO : Anda belum mendaftar untuk ujian. Segera lakukan pendaftaran.
                        </p>
                     </div>
                  </div>
            @else
                  <div class="card-alert card gradient-45deg-green-teal">
                     <div class="card-content white-text">
                        <p>
                           <i class="material-icons">check</i> SUKSES : Anda telah berhasil mendaftar untuk ujian. Semoga sukses!
                     </div>
                  </div>
            @endif
            </div>
         <div class="col s12 m8 card-width">
            <div class="card border-radius-6">
              <div class="card-content center-align">
               <table class="striped">
                  <tbody>
                     @forelse($dataKelas as $kelas)
                     <tr>
                         <td>Nama</td>
                         <td>: {{ auth()->user()->name }}</td>
                     </tr>                        
                     <tr>
                         <td>Nama Kelas</td>
                         <td>: {{ $kelas->name_class }}</td>
                     </tr>
                     <tr>
                         <td>Kelas</td>
                         <td>: {{ $kelas->type_class }}</td>
                     </tr>
                     <tr>
                         <td>Mu'allimat</td>
                         <td>: {{ $kelas->name_teacher }}</td>
                     </tr>
                     <tr>
                         <td>Ruangan</td>
                         <td>: {{ $kelas->room }}</td>
                     </tr>
                     <tr>
                     <td></td>
                     <td>
                        <div class="col s12 center-align">
                           <a href="/edit-data-diri" class="waves-effect waves-light btn blue-btn center-align gradient-45deg-blue-teal">Edit Data Diri</a>
                        </div>
                     </td>
                  </tr>
                 @empty
                  <tr>
                     <td>Nama</td>
                     <td>: {{ auth()->user()->name }}</td>
                  </tr>                        
                  <tr>
                        <td>Nama Kelas</td>
                        <td>:</td>
                  </tr>
                  <tr>
                        <td>Kelas</td>
                        <td>: </td>
                  </tr>
                  <tr>
                        <td>Mu'allimat</td>
                        <td>: </td>
                  </tr>
                  <tr>
                        <td>Ruangan</td>
                        <td>: </td>
                  </tr>                  
                  <tr>
                     <td></td>
                     <td>
                        <div class="col s12 center-align">
                           <a href="/edit-data-diri" class="waves-effect waves-light btn blue-btn center-align gradient-45deg-blue-teal">Edit Data Diri</a>
                        </div>
                     </td>
                  </tr>

                 @endforelse
                 
                  </tbody>
                </table>
              </div>
            </div>
         </div>
         @php
         $belumDaftar = $daftar_ujian->contains('status', 'Belum Daftar');
         $sudahDaftar = $daftar_ujian->contains('status', 'Sudah Daftar');
         @endphp
         
         @if($belumDaftar)
            <div class="col s12 m6 l6 xl3">
               <div class="card gradient-45deg-light-blue-cyan gradient-shadow min-height-100 white-text animate fadeLeft">
                  <div class="padding-4">
                     <div class="row">
                        <div class="col s12 center-align">
                           <p>Pendaftaraan Ujian Telah Dibuka</p>
                           <a href="/daftar-ujian" class="waves-effect waves-light btn green-btn center-align gradient-45deg-green-teal">Daftar</a>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         @endif
         {{-- <div class="col s12 m6 l6 xl3">
            <div class="card gradient-45deg-red-pink gradient-shadow min-height-100 white-text animate fadeLeft">
               <div class="padding-4">
                  <div class="row">
                     <div class="col s7 m7">
                        <i class="material-icons background-round mt-5">attach_money</i>
                        <p>SPP</p>
                     </div>
                     <div class="col s5 m5 right-align">
                        <h5 class="mb-0 white-text">{{ $sppT  }}</h5>
                        <p class="no-margin">Tagihan</p>
                     </div>
                  </div>
               </div>
            </div>
         </div> --}}
     


         @endcan

         </div><!-- START RIGHT SIDEBAR NAV -->
         <script src="{{ $jumlahSiswaKelas->cdn() }}"></script>
         <script src="{{ $kelasBayarSpp->cdn() }}"></script>

         {{ $jumlahSiswaKelas->script() }}
         {{ $kelasBayarSpp->script() }}
      </div>
   <div class="content-overlay"></div>
</div>  

@endsection