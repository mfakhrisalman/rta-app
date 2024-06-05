@extends('layouts.main_dashboard')

@section('container')
    <div class="breadcrumbs-dark pb-0 pt-4" id="breadcrumbs-wrapper">
        <!-- Search for small screen-->
        <div class="container">
            <div class="row">
                <div class="col s10 m6 l6">
                    <h5 class="breadcrumbs-title mt-0 mb-0"><span>Data Pembayaran SPP</span></h5>
                    <ol class="breadcrumbs mb-0">
                        <li class="breadcrumb-item"><a href="/dashboard">Home</a>
                        </li>
                        <li class="breadcrumb-item"><a href="/pembayaran">Pembayaran</a>
                        </li>
                        <li class="breadcrumb-item active">Data Pembayaran SPP
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
                                            <th></th>
                                            <th>nama</th>
                                            <th>kelas</th>
                                            <th>bulan</th>
                                            <th>tahun</th>
                                            <th>jumlah</th>
                                            <th>status</th>
                                            @can('admin')
                                            <th>edit</th>
                                            @endcan
                                            @can('siswa')
                                            <th>aksi</th>
                                            @endcan
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($data_pembayarans as  $data_pembayaran)
                                            @foreach($data_pembayaran->tagihans as $tagihan)
                                            <tr>
                                                <td></td>
                                                <td>{{ $data_pembayaran->name }}</td>
                                                <td>{{ $data_pembayaran->class }}</td>
                                                <td>{{ $tagihan->month }}</td>
                                                <td>{{ $tagihan->year }}</td>
                                                <td>{{ $tagihan->amount }}</td>
                                                <td>
                                                    <span class="chip 
                                                        {{ $tagihan->status === 'Lunas' ? 'green lighten-5' : 
                                                           ($tagihan->status === 'Belum Lunas' ? 'red lighten-5' : 
                                                           ($tagihan->status === 'Menunggu Konfirmasi' ? 'blue lighten-5' : '')) }}">
                                                        <span class="{{ $tagihan->status === 'Lunas' ? 'green-text' : 
                                                                      ($tagihan->status === 'Belum Lunas' ? 'red-text' : 
                                                                      ($tagihan->status === 'Menunggu Konfirmasi' ? 'blue-text' : '')) }}">
                                                            {{ $tagihan->status }}
                                                        </span>
                                                    </span>
                                                </td>
                                                @can('admin')
                                                <td>
                                                    <a href="/pembayaran/{{ $data_pembayaran->id }}/edit?tagihan_id={{ $tagihan->id_tagihan }}&bulan={{ $tagihan->month }}&tahun={{ $tagihan->year }}">
                                                        <i class="material-icons">edit</i>
                                                    </a>
                                                </td>
                                                @endcan
                                                @can('siswa')
                                                <td>
                                                    @if($tagihan->status == 'Belum Lunas')
                                                    <a href="/bayar-spp/{{ $data_pembayaran->id }}/edit?tagihan_id={{ $tagihan->id_tagihan }}&bulan={{ $tagihan->month }}&tahun={{ $tagihan->year }}">
                                                        <button class="mb-6 btn waves-effect waves-light green darken-1">Bayar</button>
                                                    </a>
                                                @else
                                                    <h2>-</h2>
                                                @endif
                                                </td>
                                                @endcan
                                            </tr>
                                            @endforeach
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
