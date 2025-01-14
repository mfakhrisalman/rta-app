@extends('layouts.main_dashboard')

@section('container')
    <div class="breadcrumbs-dark pb-0 pt-4" id="breadcrumbs-wrapper">
        <!-- Search for small screen-->
        <div class="container">
            <div class="row">
                <div class="col s10 m6 l6">
                    <h5 class="breadcrumbs-title mt-0 mb-0"><span>Riwayat Hafalan </span></h5>
                    <ol class="breadcrumbs mb-0">
                        <li class="breadcrumb-item"><a href="/dashboard">Home</a>
                        </li>
                        <li class="breadcrumb-item"><a href="/pendaftar">Kelola Data</a>
                        </li>
                        <li class="breadcrumb-item active">Riwayat Hafalan
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
                                            <th>nama</th>
                                            <th>juz</th>
                                            <th>surat</th>
                                            <th>mulai ayat</th>
                                            <th>akhir ayat</th>
                                            <th>kelas</th>
                                            <th>mu'allimat</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td></td>
                                            <td>1</td>
                                            <td>aisyah</td>
                                            <td>30</td>
                                            <td>an-naba</td>
                                            <td>1</td>
                                            <td>20</td>
                                            <td>Arafah</td>
                                            <td>asd</td>
                                            <td></td>
                                            </tr>
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
                title: "Are you sure?",
                text: "You will not be able to recover this imaginary file!",
                icon: 'warning',
                dangerMode: true,
                buttons: {
                    cancel: 'No, Please!',
                    delete: 'Yes, Delete It'
                }
            }).then(function (willDelete) {
                if (willDelete) {
                    // Redirect to delete route
                    window.location.href = "/pendaftar/" + id;
                } else {
                    swal("Your imaginary file is safe", {
                        title: 'Cancelled',
                        icon: "error",
                    });
                }
            });
        }
    </script>
@endsection
