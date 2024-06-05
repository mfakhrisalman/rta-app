@extends('layouts.main_dashboard')

@section('container')
    <div class="breadcrumbs-dark pb-0 pt-4" id="breadcrumbs-wrapper">
        <!-- Search for small screen-->
        <div class="container">
            <div class="row">
                <div class="col s10 m6 l6">
                    <h5 class="breadcrumbs-title mt-0 mb-0"><span>Data Siswa</span></h5>
                    <ol class="breadcrumbs mb-0">
                        <li class="breadcrumb-item"><a href="/dashboard">Home</a>
                        </li>
                        <li class="breadcrumb-item"><a href="/siswa">Kelola Data</a>
                        </li>
                        <li class="breadcrumb-item active">Data Siswa
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
                                    @foreach ($siswas as $siswa)
                                        <tr>
                                            <td></td>
                                            <td>{{ $loop->iteration }}</td>
                                            <td><a href="https://mail.google.com/mail/?view=cm&fs=1&to={{ $siswa->email }}" target="_blank">{{ $siswa->email }}</a></td>
                                            <td>{{ $siswa->name }}</td>
                                            <td>{{ $siswa->class }}</td>
                                            <td><a href="https://wa.me/62{{ $siswa->nohp }}" target="_blank">{{ $siswa->nohp }}</a></td>
                                            <td>
                                                <span class="chip {{ $siswa->status === 'Tidak Aktif' ? 'red lighten-5' : 'green lighten-5' }}">
                                                    <span class="{{ $siswa->status === 'Tidak Aktif' ? 'red-text' : 'green-text' }}">{{ $siswa->status }}</span>
                                                </span>
                                            </td>
                                            <td><a href="/siswa/{{ $siswa->id }}/edit"><i class="material-icons">edit</i></a></td>
                                            <td>
                                                <form id="delete-form-{{ $siswa->id }}" action="/siswa/{{ $siswa->id }}" method="post">
                                                    @method('delete')
                                                    @csrf
                                                    <button type="button" onclick="deleteSiswa('{{ $siswa->id }}')" class="waves-block btn-flat">
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
        </div>
        <div class="content-overlay"></div>
    </div>
    <script>
        function deleteSiswa(id) {
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
