@extends('layouts.main_dashboard')

@section('container')
    <div class="breadcrumbs-dark pb-0 pt-4" id="breadcrumbs-wrapper">
        <!-- Search for small screen-->
        <div class="container">
            <div class="row">
                <div class="col s10 m6 l6">
                    <h5 class="breadcrumbs-title mt-0 mb-0"><span>Data Donasi</span></h5>
                    <ol class="breadcrumbs mb-0">
                        <li class="breadcrumb-item"><a href="/dashboard">Home</a>
                        </li>
                        <li class="breadcrumb-item active">Data Donasi
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
                                            <th>no</th>
                                            <th>tanggal donasi</th>
                                            <th>nama donatur</th>
                                            <th>jumlah</th>
                                            <th>keterangan</th>
                                            <th>edit</th>
                                            <th>delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($donasis as $donasi)
                                        <tr>
                                            <td></td>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $donasi->date }}</td>
                                            <td>{{ $donasi->name_donor }}</td>
                                            <td>{{ $donasi->amount }}</td>
                                            <td>{{ $donasi->information }}</td>
                                            <td><a href="/donasi/{{ $donasi->id }}/edit"><i class="material-icons">edit</i></a></td>
                                            <td>
                                                <form id="delete-form-{{ $donasi->id }}" action="/donasi/{{ $donasi->id }}" method="post">
                                                    @method('delete')
                                                    @csrf
                                                    <button type="button" onclick="deleteDonasi('{{ $donasi->id }}')" class="waves-block btn-flat">
                                                        <i class="material-icons red-text">delete</i>
                                                    </button>
                                                </form>
                                            </td>
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
            <div style="bottom: 50px; right: 19px;" class="fixed-action-btn direction-top">
                <form action="/donasi/create">
                    <button class="btn-floating btn-large waves-effect waves-light btn gradient-45deg-green-teal z-depth-4 mr-1 mb-2">
                        <i class="material-icons">add</i>
                    </button>
                </form>
            </div>
        </div>
        <div class="content-overlay"></div>
    </div>
    <script>
        function deleteDonasi(id) {
            swal({
                title: "Apakah Anda yakin?",
                text: "Anda tidak akan dapat memulihkan data ini!",
                icon: 'warning',
                buttons: {
                    cancel: 'Tidak, batalkan!',
                    delete: 'Ya, hapus itu!'
                },
                dangerMode: true,
            }).then(function (willDelete) {
                if (willDelete) {
                    // Submit the form to delete the record
                    document.getElementById('delete-form-' + id).submit();
                } else {
                    swal("Data Anda aman", {
                        title: 'Dibatalkan',
                        icon: "error",
                    });
                }
            });
        }
    </script>
@endsection
