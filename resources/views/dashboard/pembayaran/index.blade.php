@extends('layouts.main_dashboard')

@section('container')
<div class="breadcrumbs-dark pb-0 pt-4" id="breadcrumbs-wrapper">
    <!-- Search for small screen-->
    <div class="container">
        <div class="row">
            <div class="col s10 m6 l6">
                <h5 class="breadcrumbs-title mt-0 mb-0"><span>Tagihan SPP</span></h5>
                <ol class="breadcrumbs mb-0">
                    <li class="breadcrumb-item"><a href="/dashboard">Home</a>
                    </li>
                    <li class="breadcrumb-item"><a href="/tagihan">Pembayaran</a>
                    </li>
                    <li class="breadcrumb-item active">Tagihan SPP
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
                                        <th>kelas</th>
                                        <th>bulan</th>
                                        <th>tahun</th>
                                        <th>jumlah</th>
                                        <th>delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($tagihans as $index => $tagihan)
                                    <tr>
                                        <td></td>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $tagihan->class }}</td>
                                        <td>{{ $tagihan->month }}</td>
                                        <td>{{ $tagihan->year }}</td>
                                        <td>{{ $tagihan->amount }}</td>
                                        <td>
                                            <form id="delete-form-{{ $tagihan->id }}" action="/tagihan/{{ $tagihan->id }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button type="button" onclick="deleteTagihan('{{ $tagihan->id }}', '{{ $tagihan->class }}', '{{ $tagihan->month }}', '{{ $tagihan->year }}', '{{ $tagihan->amount }}')" class="waves-block btn-flat">
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
            <form action="/tagihan/create">
                <button class="btn-floating btn-large waves-effect waves-light btn gradient-45deg-green-teal z-depth-4 mr-1 mb-2">
                    <i class="material-icons">add</i>
                </button>
            </form>
        </div>
    </div>
    <div class="content-overlay"></div>
</div>
<script>
    function deleteTagihan(id, classVal, month, year, amount) {
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
                // Tambahkan parameter ke form
                var form = document.getElementById('delete-form-' + id);
                var inputClass = document.createElement('input');
                inputClass.type = 'hidden';
                inputClass.name = 'class';
                inputClass.value = classVal;

                var inputMonth = document.createElement('input');
                inputMonth.type = 'hidden';
                inputMonth.name = 'month';
                inputMonth.value = month;

                var inputYear = document.createElement('input');
                inputYear.type = 'hidden';
                inputYear.name = 'year';
                inputYear.value = year;

                var inputAmount = document.createElement('input');
                inputAmount.type = 'hidden';
                inputAmount.name = 'amount';
                inputAmount.value = amount;

                form.appendChild(inputClass);
                form.appendChild(inputMonth);
                form.appendChild(inputYear);
                form.appendChild(inputAmount);

                // Submit the form to delete the record
                form.submit();
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
