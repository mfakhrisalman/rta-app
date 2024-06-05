@extends('layouts.main_dashboard')

@section('container')
    <div class="breadcrumbs-dark pb-0 pt-4" id="breadcrumbs-wrapper">
        <!-- Search for small screen-->
        <div class="container">
            <div class="row">
                <div class="col s10 m6 l6">
                    <h5 class="breadcrumbs-title mt-0 mb-0"><span>Kritik & Saran</span></h5>
                    <ol class="breadcrumbs mb-0">
                        <li class="breadcrumb-item"><a href="/dashboard">Home</a>
                        </li>
                        <li class="breadcrumb-item"><a href="/kritiksaran">Kelola Data</a>
                        </li>
                        <li class="breadcrumb-item active">Data Kritik Saran
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
                                <table id="kritiksaran-list-datatable" class="table">
                                    <thead>
                                        <tr>
                                            <th>no</th>
                                            <th>email</th>
                                            <th>nama</th>
                                            <th>pesan</th>
                                            <th>tanggal</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($kritiksarans as $kritiksaran)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td><a href="https://mail.google.com/mail/?view=cm&fs=1&to={{ $kritiksaran->email }}" target="_blank">{{ $kritiksaran->email }}</a></td>
                                            <td>{{ $kritiksaran->name }}</td>
                                            <td>{{ $kritiksaran->message }}</td>
                                            <td>{{ $kritiksaran->created_at }}</td>
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
