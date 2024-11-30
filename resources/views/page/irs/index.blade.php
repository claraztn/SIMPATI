@extends('partials.main')

@section('content')
    <div class="container">
        <h4 class="my-4 text-black">DAFTAR MAHASISWA</h4>
        <div class="mb-3">
            <div class="row">
                <div class="col-1">
                    <label for="angkatanDropdown" class="form-label">Angkatan</label>
                </div>
                <div class="col-1">
                    <div class="btn-group w-100" id="angkatanDropdown">
                        <button class="btn btn-secondary btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            Pilih Angkatan
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item active" href="#">Angkatan 2024</a></li>
                            <li><a class="dropdown-item" href="#">Angkatan 2023</a></li>
                            <li><a class="dropdown-item" href="#">Angkatan 2022</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-1">
                    <label for="angkatanDropdown" class="form-label">Angkatan</label>
                </div>
                <div class="col-1">
                    <div class="btn-group w-100" id="angkatanDropdown">
                        <button class="btn btn-secondary btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            Pilih Angkatan
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item active" href="#">Angkatan 2024</a></li>
                            <li><a class="dropdown-item" href="#">Angkatan 2023</a></li>
                            <li><a class="dropdown-item" href="#">Angkatan 2022</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="mt-3 text-start">
                <button class="btn btn-sm btn-primary" type="button">Filter Data</button>
                <button class="btn btn-sm btn-secondary" type="button">Reset Filter</button>
            </div>
        </div>
    </div>





    <table border="0" cellspacing="0" cellpadding="10"
        style="width: 100%; border-collapse: separate; border-spacing: 0; margin-top:20px;">
        <thead>
            <tr style="background-color: #726f6f; color: #fff;">
                <th style="border-bottom: 2px solid #fff; padding: 10px;">No</th>
                <th style="border-bottom: 2px solid #fff; padding: 10px;">Nama</th>
                <th style="border-bottom: 2px solid #fff; padding: 10px;">NIM</th>
                <th style="border-bottom: 2px solid #fff; padding: 10px;">Semester</th>
                <th style="border-bottom: 2px solid #fff; padding: 10px;">Jumlah <br> SKS</th>
                <th style="border-bottom: 2px solid #fff; padding: 10px;">Beban SKS <br> Maks</th>
                <th style="border-bottom: 2px solid #fff; padding: 10px;">IPS</th>
                <th style="border-bottom: 2px solid #fff; padding: 10px;">IPK</th>
                <th style="border-bottom: 2px solid #fff; padding: 10px;">Rencana Studi</th>
                <th style="border-bottom: 2px solid #fff; padding: 10px;">Status</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td style="border-bottom: 1px solid #726f6f;">1.</td>
                <td style="border-bottom: 1px solid #726f6f;">Adi Pratama</td>
                <td style="border-bottom: 1px solid #726f6f;">123456789</td>
                <td style="border-bottom: 1px solid #726f6f;">5</td>
                <td style="border-bottom: 1px solid #726f6f;">18</td>
                <td style="border-bottom: 1px solid #726f6f;">24</td>
                <td style="border-bottom: 1px solid #726f6f;">3.75</td>
                <td style="border-bottom: 1px solid #726f6f;">3.65</td>
                <td style="border-bottom: 1px solid #726f6f; text-align: center;">
                    <a href="{{ route('irs.show') }}" class="btn-detail"
                        style="background-color: #6f6f6f; color: white; text-decoration: none; padding: 5px 18px; border-radius: 3px; cursor: pointer;">
                        Detail
                    </a>
                </td>

                <td style="border-bottom: 1px solid #726f6f; text-align: center;">
                    <span
                        style="background-color: #d9534f; color: white; padding: 5px 10px; border-radius: 3px; display: inline-block;">
                        Ditolak
                    </span>
                </td>
            </tr>
            <tr>
                <td style="border-bottom: 1px solid #726f6f;">2.</td>
                <td style="border-bottom: 1px solid #726f6f;">Budi Handika</td>
                <td style="border-bottom: 1px solid #726f6f;">987654321</td>
                <td style="border-bottom: 1px solid #726f6f;">4</td>
                <td style="border-bottom: 1px solid #726f6f;">15</td>
                <td style="border-bottom: 1px solid #726f6f;">24</td>
                <td style="border-bottom: 1px solid #726f6f;">3.60</td>
                <td style="border-bottom: 1px solid #726f6f;">3.50</td>
                <td style="border-bottom: 1px solid #726f6f; text-align: center;">
                    <a href="{{ route('irs.show') }}" class="btn-detail"
                        style="background-color: #6f6f6f; color: white; text-decoration: none; padding: 5px 18px; border-radius: 3px; cursor: pointer;">
                        Detail
                    </a>
                </td>

                <td style="border-bottom: 1px solid #726f6f; text-align: center;">
                    <span
                        style="background-color: #3583f0; color: white; padding: 5px 10px; border-radius: 3px; display: inline-block;">
                        Belum Disetujui
                    </span>
                </td>
            </tr>
            <tr>
                <td style="border-bottom: 1px solid #726f6f;">3.</td>
                <td style="border-bottom: 1px solid #726f6f;">Rini Aulia</td>
                <td style="border-bottom: 1px solid #726f6f;">987654321</td>
                <td style="border-bottom: 1px solid #726f6f;">4</td>
                <td style="border-bottom: 1px solid #726f6f;">15</td>
                <td style="border-bottom: 1px solid #726f6f;">24</td>
                <td style="border-bottom: 1px solid #726f6f;">3.60</td>
                <td style="border-bottom: 1px solid #726f6f;">3.50</td>
                <td style="border-bottom: 1px solid #726f6f; text-align: center;">
                    <a href="{{ route('irs.showApproved') }}" class="btn-detail"
                        style="background-color: #6f6f6f; color: white; text-decoration: none; padding: 5px 18px; border-radius: 3px; cursor: pointer;">
                        Detail
                    </a>
                </td>

                <td style="border-bottom: 1px solid #726f6f; text-align: center;">
                    <span
                        style="background-color: #5cb85c; color: white; padding: 5px 10px; border-radius: 3px; display: inline-block;">
                        Telah Disetujui
                    </span>
                </td>
            </tr>
        </tbody>
    </table>
    </div>
@endsection
