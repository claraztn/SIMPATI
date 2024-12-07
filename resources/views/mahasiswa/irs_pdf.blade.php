<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IRS - {{ $mahasiswa->nim }}</title>

    <style>
        body {
            font-family: 'Times New Roman', Times, serif;
        }

        .center {
            text-align: center;
            font-size: 14px;
        }

        .mt-25 {
            margin-top: 25px;
        }

        .info-mahasiswa {
            font-size: 13px;
        }

        .table-justify-left {
            font-size: 13px;
        }

        .table-custom {
            font-size: 13px;
            text-align: center;
        }

        p {
            padding-top: 0;
            margin-top: 0;
        }

        .text-normal {
            font-size: 13px;
            text-align: right;
        }

        .container {
            justify-content: space-between;
        }
    </style>
</head>

<body>
    <div class="center">
        <p>KEMENTERIAN PENDIDIKAN, KEBUDAYAAN, RISET DAN TEKNOLOGI
        </p>
        <p> FAKULTAS SAINS DAN MATEMATIKA
            UNIVERSITAS DIPONEGORO</p>
        <h3>ISIAN RENCANA STUDI</h3>
        <h3> Semester Ganjil TA 2024/2025</h3>
    </div>
    <div class="mt-25"></div>

    <div class="info-mahasiswa">
        <p>NIM : {{ $mahasiswa->nim }}</p>
        <p>Nama Mahasiswa: {{ $mahasiswa->nama_mahasiswa }}</p>
        <p>Program Studi: {{ $mahasiswa->programStudi->nama_prodi }}</p>
        <p>Dosen Wali: {{ $mahasiswa->dosen->nama_dosen }}</p>
        <p>Semester: {{ $irs->semester }}</p>
    </div>
    <table border="1" cellspacing="0" cellpadding="5">
        <thead class="table-custom">
            <tr>
                <th>No</th>
                <th>KODE MK</th>
                <th>MATA KULIAH</th>
                <th>KELAS</th>
                <th>SKS</th>
                <th>RUANG</th>
                <th>NAMA DOSEN</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($itemIRS as $index => $item)
                <tr class="center">
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $item->mataKuliah->kode_mk }}</td>
                    <td>{{ $item->mataKuliah->nama_mk }}</td>
                    <td>{{ $item->jadwal->kode_kelas }}</td>
                    <td>{{ $item->mataKuliah->sks }}</td>
                    <td>{{ $item->jadwal->ruangan->nama_ruang }}</td>
                    <td width="10%">
                        @foreach ($item->mataKuliah->dosenMataKuliah as $dosen)
                            {{ $dosen->dosen->nama_dosen }}<br>
                        @endforeach
                    </td>
                </tr>
                <tr>
                    <td colspan="7" class="table-justify-left">{{ $item->jadwal->hari }}, pukul
                        {{ $item->jadwal->jam_mulai }} -
                        {{ $item->jadwal->jam_selesai }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="mt-25"></div>

    <table border="0" cellspacing="0" cellpadding="5">
        <tbody>
            <tr>
                <td>
                    <br> <br>
                    <p>Pembimbing Akademik</p>
                    <br><br><br>
                    <p>{{ $mahasiswa->dosen->nama_dosen }}</p>
                    <p>NIP. {{ $mahasiswa->dosen_wali }}</p>
                </td>
                <td colspan="7"></td>
                <td>
                    <div style="display: flex; flex-direction: column; align-items: flex-start;">
                        <p>Semarang, {{ $dateNow }}</p> <!-- Tempatkan Bandung di atas Nama Mahasiswa -->
                        <p>Nama Mahasiswa,</p>
                        <br><br><br>
                        <p>{{ $mahasiswa->nama_mahasiswa }}</p>
                        <p>NIM. {{ $mahasiswa->nim }}</p>
                    </div>
                </td>
            </tr>
        </tbody>
    </table>

</body>
</html>