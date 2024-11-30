@extends('partials.main')

@section('content')
    <h4 class="my-4 text-black">DAFTAR MAHASISWA</h4>
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
            Status: Belum Disetujui

            <input type="checkbox">
            <span class="checkmark" style="margin-left:10px;"></span>
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
        <div class="total-sks">
            <span>Total SKS: 18 SKS</span>
        </div>
        <div class="konfirmasi">
            <button id="accBtn">SETUJU</button>
            <button id="declineBtn">TOLAK</button>
        </div>
    </div>


    <div id="confirmModal" class="modal">
        <div class="modal-content">
            <span class="close" id="closeConfirmModal">&times;</span>
            <h2>Konfirmasi</h2>
            <p style="margin: 30px 0px;">Apakah Anda untuk menyetujui IRS?</p>
            <div class="modal-btn">
                <button id="confirmNo">Tidak</button>
                <button id="confirmYes">Ya</button>
            </div>
        </div>
    </div>

    <div id="successModal" class="modal">
        <div class="modal-content">
            <span class="close" id="closeSuccessModal">&times;</span>
            <h2 style="color: green">Berhasil!</h2>
            <p style="margin: 20px 0px">IRS berhasil disetujui!</p>
            <div class="button-container">
            </div>
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
        align-items: center;
        margin-top: 10px;
    }

    .total-sks {
        background-color: #a4a4a4;
        padding: 5px 10px;
        color: #fff;
    }

    .konfirmasi {
        display: flex;
    }

    .konfirmasi button {
        margin-left: 10px;
        padding: 8px 15px;
        cursor: pointer;
        border: none;
        border-radius: 3px;
        background-color: #a4a4a4;
        color: white;
    }

    .konfirmasi button:hover {
        background-color: #1476e0;
    }
</style>

<style>
    .modal {
        display: none;
        position: fixed;
        z-index: 1;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        overflow: auto;
        background-color: rgba(0, 0, 0, 0.5);
    }

    .modal-content {
        background-color: white;
        margin: 15% auto;
        padding: 20px;
        border: 1px solid #888;
        width: 30%;
        border-radius: 8px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }

    .modal-content button {
        margin-left: 5px;
        padding: 8px 15px;
        cursor: pointer;
        border: none;
        border-radius: 3px;
        background-color: #a4a4a4;
        color: white;
    }

    .close {
        color: #aaa;
        float: right;
        font-size: 28px;
        font-weight: bold;
    }

    .close:hover,
    .close:focus {
        color: black;
        text-decoration: none;
        cursor: pointer;
    }


    .modal-btn {
        display: flex;
        justify-content: flex-end;
        margin-top: 30px;
    }

    #confirmYes {
        background-color: red;
    }

    #confirmNo {
        background-color: #6c757d;
    }

    #confirmYes:hover {
        background-color: darkred;
    }

    #confirmNo:hover {
        background-color: #5a6268;
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
