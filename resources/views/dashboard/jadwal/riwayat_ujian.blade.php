@extends('layouts.main_dashboard')

@section('container')
    <div class="breadcrumbs-dark pb-0 pt-4" id="breadcrumbs-wrapper">
        <!-- Search for small screen-->
        <div class="container">
            <div class="row">
                <div class="col s10 m6 l6">
                    <h5 class="breadcrumbs-title mt-0 mb-0"><span>Riwayat Ujian</span></h5>
                    <ol class="breadcrumbs mb-0">
                        <li class="breadcrumb-item"><a href="/dashboard">Home</a>
                        </li>
                        <li class="breadcrumb-item"><a href="/catatan-ujian">Kelola Riwayat Ujian</a>
                        </li>
                        <li class="breadcrumb-item active">Data Riwayat
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="col s12">
        <div class="container">
            <!-- users list start -->
            <section class="users-list-wrapper section">
                <div class="users-list-table">
                    <div class="card">
                        <div class="card-content">
                            <!-- datatable start -->
                            <div class="responsive-table">
                                <table id="users-list-datatable" class="table">
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th>no</th>
                                            @can('admin')
                                            <th>nama</th>
                                            @endcan
                                            <th>nama kelas</th>
                                            <th>kelas</th>
                                            <th>hafalan</th>
                                            <th>nilai</th>
                                            @can('siswa')
                                            <th>tahun</th>
                                            @endcan
                                            <th>status</th>
                                            @can('admin')
                                            <th>edit</th>
                                            @endcan
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($riwayats as $riwayat)
                                        <tr>
                                            <td></td>
                                            <td>{{ $loop->iteration }}</td>
                                            @can('admin')
                                            <td>{{ $riwayat->name_student }}</td>
                                            @endcan
                                            <td>{{ $riwayat->name_class ?? 'N/A' }}</td>
                                            <td>{{ $riwayat->class }}</td>
                                            <td>{{ $riwayat->qty_juz }} juz</td>
                                            <td>{{ $riwayat->score }}</td>
                                            @can('siswa')
                                            <td>{{ $riwayat->year }}</td>
                                            @endcan
                                            <td>
                                                <span class="chip {{ $riwayat->status === 'Sudah Daftar' ? 'orange lighten-5' : 'green lighten-5' }}">
                                                    <span class="{{ $riwayat->status === 'Sudah Daftar' ? 'orange-text' : 'green-text' }}">{{ $riwayat->status }}</span>
                                                </span>
                                            </td>
                                            @can('admin')
                                            <td><a href="/catatan-ujian/{{ $riwayat->id }}/edit"><i class="material-icons">edit</i></a></td>
                                            @endcan
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- datatable ends -->
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <div class="content-overlay"></div>
    </div>
@endsection
