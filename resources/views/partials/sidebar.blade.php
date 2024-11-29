<div class="sidebar">
    <div class="profile-container">
        <img src="{{ asset('img/user.png') }}" class="img-profile" alt="">
        <a href="#" class="btn-profile">Lihat Profil</a>
    </div>

    <div class="menu-links">
        <a href="#dashboard">Dashboard</a>
        <a href="/jadwal">Jadwal</a>
        <a href="#perkuliahan">Perkuliahan</a>
        <a href="#ujian">Ujian</a>
        <a href="#presensi">Presensi</a>
        <a href="/irs">IRS</a>
    </div>
</div>

<style>
    .sidebar {
        width: 200px;
        background-color: #726f6f;
        color: #fff;
        display: flex;
        flex-direction: column;
        padding: 20px;
        height: 100%;
        overflow-y: auto;
    }

    .profile-container {
        display: flex;
        flex-direction: column;
        align-items: center;
        margin-bottom: 20px;
    }

    .img-profile {
        width: 120px;
        border-radius: 50%;
        margin-bottom: 10px;
    }

    .btn-profile {
        background-color: #d8a354;
        color: white;
        padding: 10px 20px;
        text-decoration: none;
        border-radius: 5px;
        font-size: 14px;
        text-align: center;
        display: inline-block;
    }

    .menu-links a {
        color: #fff;
        padding: 10px;
        text-decoration: none;
        font-size: 16px;
        margin-bottom: 10px;
        display: block;
        border-radius: 4px;
    }

    .menu-links a:hover {
        background-color: #7F7F7F;
    }
</style>
