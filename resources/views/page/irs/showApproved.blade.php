@extends('partials.main')

@section('content')
    <h2>DETAIL MAHASISWA</h2>
    <div class="detail-mahasiswa">
        <div class="left-column">
            <div class="detail-item">
                <strong>Nama</strong> <span>: Andi Pratama</span>
            </div>
            <div class="detail-item">
                <strong>NIM</strong> <span>: 123456789</span>
            </div>
            <div class="detail-item">
                <strong>Semester</strong> <span>: 5</span>
            </div>
        </div>
        <div class="right-column">
            <div class="detail-item">
                <strong>IPS/IPK</strong> <span>: 3.75 / 3.65</span>
            </div>
            <div class="detail-item">
                <strong>Maks SKS</strong> <span>: 24</span>
            </div>
            <div class="detail-item">
                <strong>Jumlah SKS</strong> <span>: 18</span>
            </div>
        </div>
    </div>


    <div class="status-irs">
        <label class="custom-checkbox">
            Status: Sudah Disetujui
            {{--
            <input type="checkbox">
            <span class="checkmark" style="margin-left:10px;"></span> --}}
        </label>
    </div>




    <table border="0" cellspacing="0" cellpadding="10"
        style="width: 100%; border-collapse: separate; border-spacing: 0; margin-top:20px;">
        <thead>
            <tr style="background-color: #726f6f; color: #fff;">
                <th style="border-bottom: 2px solid #fff; padding: 10px;">No</th>
                <th style="border-bottom: 2px solid #fff; padding: 10px;">KODE MK MK</th>
                <th style="border-bottom: 2px solid #fff; padding: 10px;">NAMA MK</th>
                <th style="border-bottom: 2px solid #fff; padding: 10px;">SKS</th>
                <th style="border-bottom: 2px solid #fff; padding: 10px;">HARI, JAM, RUANG KELAS</th>
                <th style="border-bottom: 2px solid #fff; padding: 10px;">DOSEN PENGAMPU</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td style="border-bottom: 1px solid #726f6f;">1.</td>
                <td style="border-bottom: 1px solid #726f6f;">PAIK 1234</td>
                <td style="border-bottom: 1px solid #726f6f;">LOGIKA INFORMATIKA</td>
                <td style="border-bottom: 1px solid #726f6f;">3</td>
                <td style="border-bottom: 1px solid #726f6f;">SENIN, 07.00-09.00, R.E101, C</td>
                <td style="border-bottom: 1px solid #726f6f;">Dr. Luna Mayya, M.Kom</td>
            </tr>
            <tr>
                <td style="border-bottom: 1px solid #726f6f;">2.</td>
                <td style="border-bottom: 1px solid #726f6f;">PAIK 4524</td>
                <td style="border-bottom: 1px solid #726f6f;">BAHASA INGGRIS</td>
                <td style="border-bottom: 1px solid #726f6f;">2</td>
                <td style="border-bottom: 1px solid #726f6f;">RABU, 07.00-09.00, R.E101, A</td>
                <td style="border-bottom: 1px solid #726f6f;">Dr. Abe Cekut, M.Kom</td>
            </tr>
            <tr>
                <td style="border-bottom: 1px solid #726f6f;">3.</td>
                <td style="border-bottom: 1px solid #726f6f;">PAIK 9707</td>
                <td style="border-bottom: 1px solid #726f6f;">DASAR PEMROGRAMAN</td>
                <td style="border-bottom: 1px solid #726f6f;">3</td>
                <td style="border-bottom: 1px solid #726f6f;">KAMIS, 07.00-09.00, R.E101, B</td>
                <td style="border-bottom: 1px solid #726f6f;">Wismur, S.Kom</td>
            </tr>
            <tr>
                <td style="border-bottom: 1px solid #726f6f;">4.</td>
                <td style="border-bottom: 1px solid #726f6f;">PAIK 8705</td>
                <td style="border-bottom: 1px solid #726f6f;">OLAHRAGA</td>
                <td style="border-bottom: 1px solid #726f6f;">4</td>
                <td style="border-bottom: 1px solid #726f6f;">JUMAT, 07.00-09.00, R.E101, D</td>
                <td style="border-bottom: 1px solid #726f6f;">Wismur, S.Kom</td>
            </tr>
            <tr>
                <td style="border-bottom: 1px solid #726f6f;">5.</td>
                <td style="border-bottom: 1px solid #726f6f;">PAIK 4524</td>
                <td style="border-bottom: 1px solid #726f6f;">BAHASA INGGRIS</td>
                <td style="border-bottom: 1px solid #726f6f;">2</td>
                <td style="border-bottom: 1px solid #726f6f;">RABU, 07.00-09.00, R.E101, A</td>
                <td style="border-bottom: 1px solid #726f6f;">Dr. Samsons, M.Kom</td>
            </tr>
            <tr>
                <td style="border-bottom: 1px solid #726f6f;">5.</td>
                <td style="border-bottom: 1px solid #726f6f;">PAIK 5545</td>
                <td style="border-bottom: 1px solid #726f6f;">MATEMATIKA I</td>
                <td style="border-bottom: 1px solid #726f6f;">2</td>
                <td style="border-bottom: 1px solid #726f6f;">RABU, 13.00-16.00, R.E101, B</td>
                <td style="border-bottom: 1px solid #726f6f;">Bagas, M.Kom</td>
            </tr>
            <tr>
                <td style="border-bottom: 1px solid #726f6f;">8.</td>
                <td style="border-bottom: 1px solid #726f6f;">PAIK 345</td>
                <td style="border-bottom: 1px solid #726f6f;">SISTEM OPERASI</td>
                <td style="border-bottom: 1px solid #726f6f;">2</td>
                <td style="border-bottom: 1px solid #726f6f;">SABTU, 13.00-16.00, R.E101, B</td>
                <td style="border-bottom: 1px solid #726f6f;">Dr. Zita Isabella, M.Kom</td>
            </tr>
        </tbody>
    </table>


    <div class="acc-container">
        <div class="info-acc">
            <span style="font-size: 14px;">
                IRS telah disetujui wali
                <br>
                <strong>Rabu, 19 Oktober 2023 Pukul 15:52</strong>
            </span>
        </div>
        <div class="detail-acc">
            <span><strong>Nusantara, 5 November 2023</strong></span>
            <br>
            <img src="{{ asset('img/ttd.png') }}" alt="Signature" class="signature-img">
            <br>
            <span><strong>Hasbi, M.Kom</strong></span><br>
            <span>12919281009</span>
        </div>
    </div>
@endsection

<style>
    .detail-mahasiswa {
        display: flex;
        justify-content: space-between;
        margin-top: 24px;
    }

    .left-column,
    .right-column {
        flex: 1;
    }

    .right-column {
        margin-left: 20px;
    }

    .detail-item {
        display: flex;
        align-items: center;
        margin-bottom: 10px;
        font-size: 16px;
        color: #333;
    }

    .detail-item strong {
        width: 100px;
        display: inline-block;
    }

    .detail-item span {
        margin-left: 20px;
    }

    .status-irs {
        color: black;
        font-size: 16px;
        margin-top: 5px;
        display: flex;
        justify-content: flex-end;
        align-items: center;
    }

    .custom-checkbox {
        display: flex;
        align-items: center;
        cursor: pointer;
    }

    .custom-checkbox input[type="checkbox"] {
        display: none;
    }

    .checkmark {
        height: 25px;
        width: 25px;
        background-color: #d51919;
        border-radius: 4px;
        margin-right: 10px;
        position: relative;
    }

    .custom-checkbox:hover .checkmark {
        background-color: #ccc;
    }

    .custom-checkbox input:checked+.checkmark {
        background-color: #2196F3;
    }

    .checkmark:after {
        content: "";
        position: absolute;
        display: none;
    }

    .custom-checkbox input:checked+.checkmark:after {
        display: block;
    }

    .checkmark:after {
        left: 9px;
        top: 5px;
        width: 5px;
        height: 10px;
        border: solid white;
        border-width: 0 3px 3px 0;
        transform: rotate(45deg);
    }

    .acc-container {
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        margin-top: 5px;
        padding: 10px;
    }

    .signature-img {
        width: 100px;
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var confirmModal = document.getElementById("confirmModal");

        var accBtn = document.getElementById("accBtn");
        var closeConfirmModal = document.getElementById("closeConfirmModal");
        var confirmYes = document.getElementById("confirmYes");
        var confirmNo = document.getElementById("confirmNo");

        accBtn.onclick = function() {
            confirmModal.style.display = "block";
        }

        closeConfirmModal.onclick = function() {
            confirmModal.style.display = "none";
        }

        confirmNo.onclick = function() {
            confirmModal.style.display = "none";
        }

        confirmYes.onclick = function() {
            confirmModal.style.display = "none";
            successModal.style.display = "block";
        }

        closeSuccessModal.onclick = function() {
            successModal.style.display = "none";
        }

        closeSuccessBtn.onclick = function() {
            successModal.style.display = "none";
        }


        window.onclick = function(event) {
            if (event.target == confirmModal) {
                confirmModal.style.display = "none";
            }
        }

        document.getElementById("declineBtn").onclick = function() {
            alert("Permintaan ditolak!");
        }
    });
</script>
