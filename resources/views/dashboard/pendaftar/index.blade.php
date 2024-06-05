@extends('layouts.main_dashboard')

@section('container')
    <div class="breadcrumbs-dark pb-0 pt-4" id="breadcrumbs-wrapper">
        <!-- Search for small screen-->
        <div class="container">
            <div class="row">
                <div class="col s10 m6 l6">
                    <h5 class="breadcrumbs-title mt-0 mb-0"><span>Data Pendaftar</span></h5>
                    <ol class="breadcrumbs mb-0">
                        <li class="breadcrumb-item"><a href="/dashboard">Home</a>
                        </li>
                        <li class="breadcrumb-item"><a href="/pendaftar">Kelola Data</a>
                        </li>
                        <li class="breadcrumb-item active">Data Pendaftar
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
                                            <th>email</th>
                                            <th>nama</th>
                                            <th>kelas</th>
                                            <th>nohp</th>
                                            <th>status</th>
                                            <th>edit</th>
                                            <th>delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($pendaftars as $pendaftar)
                                        <tr>
                                            <td></td>
                                            <td>{{ $loop->iteration }}</td>
                                            <td><a href="https://mail.google.com/mail/?view=cm&fs=1&to={{ $pendaftar->email }}" target="_blank">{{ $pendaftar->email }}</a></td>
                                            <td>{{ $pendaftar->name }}</td>
                                            <td>{{ $pendaftar->class }}</td>
                                            <td><a href="https://wa.me/62{{ $pendaftar->nohp }}" target="_blank">{{ $pendaftar->nohp }}</a></td>
                                            <td>
                                                <span class="chip {{ $pendaftar->status === 'Diproses' ? 'orange lighten-5' : 'green lighten-5' }}">
                                                    <span class="{{ $pendaftar->status === 'Diproses' ? 'orange-text' : 'green-text' }}">{{ $pendaftar->status }}</span>
                                                </span>
                                            </td>
                                            <td><a href="/pendaftar/{{ $pendaftar->id }}/edit"><i class="material-icons">edit</i></a></td>
                                            <td>
                                                <form id="delete-form-{{ $pendaftar->id }}" action="/pendaftar/{{ $pendaftar->id }}" method="post">
                                                    @method('delete')
                                                    @csrf
                                                    <button type="button" onclick="deletePendaftar('{{ $pendaftar->id }}')" class="waves-block btn-flat">
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
                <form action="/pendaftar/create">
                    <button class="btn-floating btn-large waves-effect waves-light btn gradient-45deg-green-teal z-depth-4 mr-1 mb-2">
                        <i class="material-icons">person_add</i>
                    </button>
                </form>
            </div>
        </div>
        <div class="content-overlay"></div>
    </div>
    <script>
        function deletePendaftar(id) {
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
