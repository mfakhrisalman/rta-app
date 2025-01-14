@extends('layouts.main_dashboard')

@section('container')
<style>
    @media screen and (max-width: 600px) {
    .table td, .table th {
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }
}
</style>
<div class="breadcrumbs-dark pb-0 pt-4" id="breadcrumbs-wrapper">
    <div class="container">
        <div class="row">
            <div class="col s10 m6 l6">
                <h5 class="breadcrumbs-title mt-0 mb-0"><span>Data Pendaftar Ujian</span></h5>
                <ol class="breadcrumbs mb-0">
                    <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
                    <li class="breadcrumb-item"><a href="/buat-jadwal">Jadwal Ujian</a></li>
                    <li class="breadcrumb-item active">Data Pendaftar Ujian</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<div class="col s12">
    <div class="container">
        <section class="users-list-wrapper section">
            <div class="users-list-table">
                <div class="card">
                    <div class="card-content">
                        <div class="responsive-table">
                            <div class="top display-flex mb-2">
                                <div class="action-filters">
                                    <div id="DataTables_Table_0_filter" class="dataTables_filter">
                                        <label>
                                            <div class="filter-btn">
                                                <a class="dropdown-trigger btn waves-effect waves-light purple darken-1 border-round" href="#" data-target="btn-filter-status">
                                                    <span class="hide-on-small-only">Status</span>
                                                    <i class="material-icons">keyboard_arrow_down</i>
                                                </a>
                                                <ul id="btn-filter-status" class="dropdown-content">
                                                    <li><a href="#" onclick="applyFilter('status', 'Sudah Daftar')">Sudah Daftar</a></li>
                                                    <li><a href="#" onclick="applyFilter('status', 'Belum Daftar')">Belum Daftar</a></li>
                                                </ul>
                                                <a class="dropdown-trigger btn waves-effect waves-light purple darken-1 border-round" href="#" data-target="btn-filter-juz">
                                                    <span class="hide-on-small-only">Jumlah Juz</span>
                                                    <i class="material-icons">keyboard_arrow_down</i>
                                                </a>
                                                <ul id="btn-filter-juz" class="dropdown-content">
                                                    <li><a href="#" onclick="applyFilter('jumlah_juz', '')">0</a></li>
                                                    @for ($i = 1; $i <= 30; $i++)
                                                    <li><a href="#" onclick="applyFilter('jumlah_juz', '{{ $i }}')">{{ $i }}</a></li>
                                                    @endfor
                                                </ul>
                                                <a class="dropdown-trigger btn waves-effect waves-light purple darken-1 border-round" href="#" data-target="btn-filter-tabi">
                                                    <span class="hide-on-small-only">Tabi'</span>
                                                    <i class="material-icons">keyboard_arrow_down</i>
                                                </a>
                                                <ul id="btn-filter-tabi" class="dropdown-content">
                                                    <li><a href="#" onclick="applyFilter('tabi', 'Tabi\' Dalam')">Tabi' Dalam</a></li>
                                                    <li><a href="#" onclick="applyFilter('tabi', 'Tabi\' Luar')">Tabi' Luar</a></li>
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
                            <table id="kritiksaran-list-datatable" class="table">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>Nama</th>
                                        <th>Kelas</th>
                                        <th>Jumlah Hafalan</th>
                                        <th>Tabi'</th>
                                        <th>Nama Kelas</th>
                                        <th>Tahun</th>
                                        <th>Status</th>
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
                                            <td>{{ $data->kelasDetails->name_class ?? 'Belum ada kelas' }}</td>
                                            <td>{{ $jadwal->year }}</td>
                                            <td>
                                                <span class="chip {{ $jadwal->status === 'Sudah Daftar' ? 'green lighten-5' : ($jadwal->status === 'Belum Daftar' ? 'blue lighten-5' : '') }}">
                                                    <span class="{{ $jadwal->status === 'Sudah Daftar' ? 'green-text' : ($jadwal->status === 'Belum Daftar' ? 'blue-text' : '') }}">
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
 let filters = {
    status: null,
    jumlah_juz: null,
    tabi: null
};

function applyFilter(type, value) {
    filters[type] = value;
    updateTable();
}

function updateTable() {
    const rows = document.querySelectorAll("#kritiksaran-list-datatable tbody tr");
    rows.forEach(row => {
        const cells = row.querySelectorAll("td");
        const [_, nameCell, classCell, juzCell, tabiCell, examNameCell, yearCell, statusCell] = cells;

        // Mendapatkan teks dari masing-masing kolom
        const filtersMatch = [
            !filters.status || statusCell.textContent.trim() === filters.status,
            !filters.jumlah_juz || juzCell.textContent.trim() === filters.jumlah_juz,
            !filters.tabi || tabiCell.textContent.trim() === filters.tabi
        ].every(Boolean);

        // Menyembunyikan atau menampilkan baris sesuai dengan hasil filter
        row.style.display = filtersMatch ? "" : "none";
    });
}


function exportToPDF() {
    const { jsPDF } = window.jspdf;
    const doc = new jsPDF();
    const table = document.getElementById("kritiksaran-list-datatable");
    doc.autoTable({ html: table });
    doc.save("Data-Pendaftar_Ujian.pdf");
}

function exportToExcel() {
    const table = document.getElementById("kritiksaran-list-datatable");
    const rows = Array.from(table.querySelectorAll("tbody tr")).filter(row => row.style.display !== "none");

    if (rows.length === 0) {
        alert("Tidak ada data yang tersedia untuk diekspor.");
        return;
    }

    const workbook = XLSX.utils.book_new();
    const sheetData = [];

    // Menambah header
    const headers = Array.from(table.querySelectorAll("thead th")).map(header => header.textContent.trim());
    sheetData.push(headers);

    // Menambah data dari baris yang terlihat
    rows.forEach(row => {
        const cells = Array.from(row.querySelectorAll("td")).map(cell => cell.textContent.trim());
        sheetData.push(cells);
    });

    const worksheet = XLSX.utils.aoa_to_sheet(sheetData);
    XLSX.utils.book_append_sheet(workbook, worksheet, "Data Pendaftar");
    XLSX.writeFile(workbook, "Data_Pendaftar_Ujian.xlsx");
}

</script>
@endsection
