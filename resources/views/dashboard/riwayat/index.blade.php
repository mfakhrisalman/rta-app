@extends('layouts.main_dashboard')

@section('container')
    <div class="breadcrumbs-dark pb-0 pt-4" id="breadcrumbs-wrapper">
        <!-- Search for small screen-->
        <div class="container">
            <div class="row">
                <div class="col s10 m6 l6">
                    <h5 class="breadcrumbs-title mt-0 mb-0"><span>Riwayat Hafalan</span></h5>
                    <ol class="breadcrumbs mb-0">
                        <li class="breadcrumb-item"><a href="/dashboard">Home</a>
                        </li>
                        <li class="breadcrumb-item"><a href="/riwayat">Riwayat Hafalan</a>
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
                                            <th>tanggal</th>
                                            <th>nama</th>
                                            <th>kelas</th>
                                            <th>jenis kelas</th>
                                            <th>surah</th>
                                            <th>keterangan</th>
                                            <th>musyrifah</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($riwayats as $riwayat)
                                        <tr>
                                            <td></td>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $riwayat->date }}</td>
                                            <td>{{ $riwayat->name_student }}</td>
                                            <td>{{ $riwayat->name_class }}</td>
                                            <td>{{ $riwayat->type_class }}</td>
                                            <td>{{ $riwayat->surah }}</td>
                                            <td>{{ $riwayat->information }}</td>
                                            <td>{{ $riwayat->created_by }}</td>
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
            @can('guru')
            <div style="bottom: 50px; right: 19px;" class="fixed-action-btn direction-top">
                <form action="/guru/create">
                    <button class="btn-floating btn-large waves-effect waves-light btn gradient-45deg-green-teal z-depth-4 mr-1 mb-2">
                        <i class="material-icons">person_add</i>
                    </button>
                </form>
            </div>
            @endcan
        </div>
        <div class="content-overlay"></div>
    </div>
@endsection
