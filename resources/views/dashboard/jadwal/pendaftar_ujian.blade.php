@extends('layouts.main_dashboard')

@section('container')
<div class="breadcrumbs-dark pb-0 pt-4" id="breadcrumbs-wrapper">
    <!-- Search for small screen-->
    <div class="container">
        <div class="row">
            <div class="col s10 m6 l6">
                <h5 class="breadcrumbs-title mt-0 mb-0"><span>Data Pendaftar Ujian</span></h5>
                <ol class="breadcrumbs mb-0">
                    <li class="breadcrumb-item"><a href="/dashboard">Home</a>
                    </li>
                    <li class="breadcrumb-item"><a href="/buat-jadwal">Jadwal Ujian</a>
                    </li>
                    <li class="breadcrumb-item active">Data Pendaftar Ujian
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
                                <div class="top display-flex mb-2">
                                    <div class="action-filters">
                                        <div id="DataTables_Table_0_filter" class="dataTables_filter">
                                            <label>
                                                <div class="filter-btn">
                                                    <!-- Dropdown Trigger for Status -->
                                                    <a class="dropdown-trigger btn waves-effect waves-light purple darken-1 border-round" href="#" data-target="btn-filter-status">
                                                        <span class="hide-on-small-only">Filter Status</span>
                                                        <i class="material-icons">keyboard_arrow_down</i>
                                                    </a>
                                                    <ul id="btn-filter-status" class="dropdown-content" tabindex="0">
                                                        <li tabindex="0">
                                                            <a href="#!" onclick="filterTable('status', 'Sudah Daftar')">Sudah Daftar</a>
                                                        </li>
                                                        <li tabindex="0">
                                                            <a href="#!" onclick="filterTable('status', 'Belum Daftar')">Belum Daftar</a>
                                                        </li>
                                                    </ul>
                                                    <!-- Dropdown Trigger for Jumlah Juz -->
                                                    <a class="dropdown-trigger btn waves-effect waves-light purple darken-1 border-round" href="#" data-target="btn-filter-juz">
                                                        <span class="hide-on-small-only">Filter Jumlah Juz</span>
                                                        <i class="material-icons">keyboard_arrow_down</i>
                                                    </a>
                                                    <ul id="btn-filter-juz" class="dropdown-content" tabindex="0">
                                                        @for ($i = 1; $i <= 30; $i++)
                                                            <li tabindex="0">
                                                                <a href="#!" onclick="filterTable('jumlah_juz', '{{ $i }}')">{{ $i }}</a>
                                                            </li>
                                                        @endfor
                                                    </ul>
                                                    <!-- Dropdown Trigger for Tabi'i -->
                                                    <a class="dropdown-trigger btn waves-effect waves-light purple darken-1 border-round" href="#" data-target="btn-filter-tabi">
                                                        <span class="hide-on-small-only">Filter Tabi'i</span>
                                                        <i class="material-icons">keyboard_arrow_down</i>
                                                    </a>
                                                    <ul id="btn-filter-tabi" class="dropdown-content" tabindex="0">
                                                        <li tabindex="0">
                                                            <a href="#!" onclick="filterTable('tabi', 'Tabi\' Dalam')">Tabi' Dalam</a>
                                                        </li>
                                                        <li tabindex="0">
                                                            <a href="#!" onclick="filterTable('tabi', 'Tabi\' Luar')">Tabi' Luar</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="actions action-btns display-flex align-items-center">
                                        <div class="invoice-filter-action mr-3 ml-3">
                                            <a href="#" class="btn waves-effect waves-light invoice-export border-round z-depth-4" onclick="exportToPDF()">
                                                <i class="material-icons">picture_as_pdf</i>
                                                <span class="hide-on-small-only">Export to PDF</span>
                                            </a>
                                        </div>
                                        <div class="invoice-create-btn">
                                            <a href="#" class="btn waves-effect waves-light invoice-create border-round z-depth-4" onclick="exportToExcel()">
                                                <i class="material-icons">grid_on</i>
                                                <span class="hide-on-small-only">Export to Excel</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>nama</th>
                                        <th>kelas</th>
                                        <th>jumlah hafalan</th>
                                        <th>tabi'i</th>
                                        <th>nama ujian</th>
                                        <th>tahun</th>
                                        <th>status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($datas as $data)
                                        @foreach($data->jadwals as $jadwal)
                                        <tr>
                                            <td></td>
                                            <td>{{ $data->name }}</td>
                                            <td>{{ $data->class }}</td>
                                            <td>{{ $jadwal->qty_juz }}</td>
                                            <td>{{ $jadwal->tabi }}</td>
                                            <td>{{ $jadwal->name }}</td>
                                            <td>{{ $jadwal->year }}</td>
                                            <td>
                                                <span class="chip 
                                                    {{ $jadwal->status === 'Sudah Daftar' ? 'green lighten-5' : 
                                                       ($jadwal->status === 'Belum Daftar' ? 'blue lighten-5' : '') }}">
                                                    <span class="{{ $jadwal->status === 'Sudah Daftar' ? 'green-text' : 
                                                                  ($jadwal->status === 'Belum Daftar' ? 'blue-text' : '') }}">
                                                        {{ $jadwal->status }}
                                                    </span>
                                                </span>
                                            </td>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.16.9/xlsx.full.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.13/jspdf.plugin.autotable.min.js"></script>

<script>
    var filters = {
        status: null,
        jumlah_juz: null,
        tabi: null
    };

    function filterTable(filterType, filterValue) {
        filters[filterType] = filterValue;

        var table = document.getElementById("kritiksaran-list-datatable");
        var tr = table.getElementsByTagName("tr");

        for (var i = 1; i < tr.length; i++) {
            var td = tr[i].getElementsByTagName("td");
            var showRow = true;

            if (filters.status && td[7].textContent.trim() !== filters.status) {
                showRow = false;
            }
            if (filters.jumlah_juz && td[3].textContent.trim() !== filters.jumlah_juz) {
                showRow = false;
            }
            if (filters.tabi && td[4].textContent.trim() !== filters.tabi) {
                showRow = false;
            }

            tr[i].style.display = showRow ? "" : "none";
        }
    }

    function exportToPDF() {
    const { jsPDF } = window.jspdf;
    const doc = new jsPDF();
    
    // Ambil elemen tabel
    var table = document.getElementById("kritiksaran-list-datatable");
    var tr = table.getElementsByTagName("tr");

    let rowData = [];
    // Ambil header
    let header = [];
    var th = table.getElementsByTagName("th");
    for (var h = 0; h < th.length; h++) {
        header.push(th[h].textContent.trim());
    }
    rowData.push(header);

    // Ambil data baris
    for (var i = 1; i < tr.length; i++) {
        var td = tr[i].getElementsByTagName("td");
        let row = [];
        for (var j = 0; j < td.length; j++) {
            row.push(td[j].textContent.trim());
        }
        rowData.push(row);
    }

    // Menggunakan autoTable
    doc.autoTable({
        head: [rowData[0]],
        body: rowData.slice(1),
    });

    // Simpan PDF
    doc.save('table-data.pdf');
}



    function exportToExcel() {
        var table = document.getElementById("kritiksaran-list-datatable");
        var wb = XLSX.utils.table_to_book(table, {sheet: "Sheet JS"});

        XLSX.writeFile(wb, "table-data.xlsx");
    }
</script>
@endsection
