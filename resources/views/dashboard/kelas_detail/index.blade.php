@extends('layouts.main_dashboard')

@section('container')
      <div class="breadcrumbs-dark pb-0 pt-4" id="breadcrumbs-wrapper">
        <!-- Search for small screen-->
        <div class="container">
          <div class="row">
            <div class="col s10 m6 l6">
              <h5 class="breadcrumbs-title mt-0 mb-0"><span>Detail Kelas</span></h5>
              <ol class="breadcrumbs mb-0">
                <li class="breadcrumb-item"><a href="/dashboard">Home</a>
                </li>
                <li class="breadcrumb-item"><a href="/kelas">Kelola Data</a>
                </li>
                <li class="breadcrumb-item active">Detail Kelas
                </li>
              </ol>
            </div>
          </div>
        </div>
      </div>
      
        <div class="col s12">
            <div class="container">
                <!-- users view start -->
                <div class="section users-view">
                <!-- users view media object start -->
                <div id="form-with-validation" class="card card card-default scrollspy">
                    <div class="card-content">
                      <h4 class="card-title">Menambahkan Siswa</h4>
                    <form method="post" action="/detail-kelas/create" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                          <div class="input-field col m8 s12">
                            <i class="material-icons prefix">account_circle</i>

                            <select name="name_student" class="validate">
                              <option value="" disabled="" selected="">Pilih Siswa</option>
                              @foreach ($siswas as $siswa)
                                  @php
                                      $isInDetailSiswa = false;
                                      foreach ($detail_siswas as $detail_siswa) {
                                          if ($detail_siswa->name_student == $siswa->name) {
                                              $isInDetailSiswa = true;
                                              break;
                                          }
                                      }
                                  @endphp
                          
                                  @if ($siswa->class == $kelas->name_class && !$isInDetailSiswa)
                                      <option value="{{ $siswa->name }}">{{ $siswa->name }}</option>
                                  @endif
                              @endforeach
                          </select>
                            <input type="hidden" name="name_class" value="{{ $kelas->name }}">
                            <input type="hidden" name="type_class" value="{{ $kelas->name_class }}">
                            <input type="hidden" name="name_teacher" value="{{ $kelas->name_teacher }}">
                            <input type="hidden" name="room" value="{{ $kelas->room }}">
                          </div>
                          <div class="input-field col m4 s12">
                            <div class="input-field col s12">
                              <button class="btn cyan waves-effect waves-light" type="submit" name="action">
                                Submit <i class="material-icons Right">send</i> 
                            </button>
                            </div>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                    <!-- users view media object ends -->
                    <!-- users view card data start -->
                    <div class="card">
                        <div class="card-content">
                        <div class="row">
                            <div class="col s12 m4">
                            <table class="striped">
                                <tbody>
                                <tr>
                                    <td>Nama Kelas</td>
                                    <td class="indigo-text"> : {{ $kelas->name }}</td>
                                </tr>
                                <tr>
                                    <td>Kelas</td>
                                    <td class="users-view-latest-activity indigo-text">: {{ $kelas->name_class }}</td>
                                </tr>
                                <tr>
                                  <td>Mu'allimat</td>
                                  <td class="users-view-latest-activity indigo-text">: {{ $kelas->name_teacher }}</td>
                                </tr>
                                <tr>
                                  <td>Ruangan</td>
                                  <td class="users-view-latest-activity indigo-text">: {{ $kelas->room }}</td>
                                </tr>
                                </tbody>
                            </table>
                            </div>
                            <div class="col s12 m8">
                            <table class="responsive-table">
                                <thead>
                                <tr>
                                    <th>Nama Siswa</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($detail_siswas as $detail_siswa)
                                    @if ($detail_siswa->name_class == $kelas->name && $detail_siswa->name_teacher == $kelas->name_teacher && $detail_siswa->type_class == $kelas->name_class)
                                        <tr>
                                            <td>{{ $detail_siswa->name_student }}</td>
                                            <td style="position: relative;">
                                              <form action="{{ route('detail_kelas.destroy', $detail_siswa->id) }}" method="post">
                                                  @method('delete')
                                                  @csrf
                                                  <button type="submit" class="waves-block btn-flat" style="position: absolute; bottom: 0; right: 0;">
                                                      <i class="material-icons red-text">delete</i>
                                                  </button>
                                              </form>
                                          </td>
                                        </tr>
                                    @endif
                                @endforeach
                                </tbody>
                            </table>
                            </div>
                        </div>
                        </div>
                    </div>
                    <!-- users view card data ends -->
                </div>
            </div>
        </div>
        <div class="content-overlay"></div>
      </div>
@endsection
