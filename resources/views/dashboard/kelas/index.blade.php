@extends('layouts.main_dashboard')

@section('container')
    <div class="breadcrumbs-dark pb-0 pt-4" id="breadcrumbs-wrapper">
        <!-- Search for small screen-->
        <div class="container">
            <div class="row">
                <div class="col s10 m6 l6">
                    <h5 class="breadcrumbs-title mt-0 mb-0"><span>Data Kelas</span></h5>
                    <ol class="breadcrumbs mb-0">
                        <li class="breadcrumb-item"><a href="/dashboard">Home</a>
                        </li>
                        <li class="breadcrumb-item"><a href="/kelas">Kelola Data</a>
                        </li>
                        <li class="breadcrumb-item active">Data Kelas
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
                                            <th>nama kelas</th>
                                            <th>kelas</th>
                                            <th>mu'allimat</th>
                                            <th>ruangan</th>
                                            <th>keterangan</th>
                                            <th>edit</th>
                                            <th>delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($kelass as $kelas)
                                        <tr>
                                            <td></td>
                                            <td>{{ $loop->iteration }}</td>
                                            <td><a href="/kelas/{{ $kelas->id }}/">{{ $kelas->name }}</a></td>
                                            <td>{{ $kelas->name_class }}</td>
                                            <td>{{ $kelas->name_teacher }}</td>
                                            <td>{{ $kelas->room }}</td>
                                            <td>{{ $kelas->information }}</td>
                                            <td><a href="/kelas/{{ $kelas->id }}/edit"><i class="material-icons">edit</i></a></td>
                                        <td>
                                            <form id="deleteForm-{{ $kelas->id }}" action="/kelas/{{ $kelas->id }}" method="post">
                                                @method('delete')
                                                @csrf
                                                <button type="submit" onclick="confirmDelete('{{ $kelas->id }}')" class="waves-block btn-flat">
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
                <form action="/kelas/create">
                    <button class="btn-floating btn-large waves-effect waves-light btn gradient-45deg-green-teal z-depth-4 mr-1 mb-2">
                        <i class="material-icons">add</i>
                    </button>
                </form>
            </div>
        </div>
        <div class="content-overlay"></div>
    </div>
<script>
function confirmDelete(id) {
    event.preventDefault(); // Mencegah aksi default tombol submit

    swal({
        title: "Apakah Anda yakin?",
        text: "Anda tidak akan dapat memulihkan data ini!",
        icon: 'warning',
        buttons: {
            cancel: 'Tidak, batalkan!',
            delete: 'Ya, hapus itu!'
        }
    }).then(function (willDelete) {
        if (willDelete) {
            var form = document.getElementById('deleteForm-' + id);
            form.submit();
        }
    });
}
</script>
@endsection
