
<div class="container my-5">
    <h2 class="mb-4">Atur Jadwal Kuliah</h2>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('kaprodi.store-jadwal') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="kode_kelas" class="form-label">Kelas</label>
            <select name="kode_kelas" id="kode_kelas" class="form-control" required>
                <option value="">Pilih Kelas</option>
                @foreach($kelas as $kls)
                    <option value="{{ $kls->kode_kelas }}">{{ $kls->kode_kelas }} - {{ $kls->mataKuliah->nama_mk }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="hari" class="form-label">Hari</label>
            <select name="hari" id="hari" class="form-control" required>
                <option value="">Pilih Hari</option>
                <option value="Senin">Senin</option>
                <option value="Selasa">Selasa</option>
                <option value="Rabu">Rabu</option>
                <option value="Kamis">Kamis</option>
                <option value="Jumat">Jumat</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="id_ruang" class="form-label">Ruangan</label>
            <select name="id_ruang" id="id_ruang" class="form-control" required>
                <option value="">Pilih Ruangan</option>
                @foreach($ruangan as $rg)
                    <option value="{{ $rg->id_ruang }}">{{ $rg->nama_ruang }} ({{ $rg->gedung }})</option>
                @endforeach

            </select>
        </div>

        <div class="mb-3">
            <label for="jam_mulai" class="form-label">Jam Mulai</label>
            <input type="time" name="jam_mulai" id="jam_mulai" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="sks" class="form-label">SKS</label>
            <input type="number" name="sks" id="sks" class="form-control" min="1" max="4" required>
        </div>

        <button type="submit" class="btn btn-primary">Simpan Jadwal</button>
    </form>

    <hr class="my-4">

    <h3>Jadwal Tersimpan</h3>
    <table class="table table-bordered mt-3">
        <thead>
            <tr>
                <th>Kelas</th>
                <th>Hari</th>
                <th>Ruangan</th>
                <th>Jam Mulai</th>
                <th>SKS</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach($kelas as $kls)
                @if($kls->jadwal)
                    <tr>
                        <td>{{ $kls->kode_kelas }} - {{ $kls->mataKuliah->nama_mk }}</td>
                        <td>{{ $kls->jadwal->hari }}</td>
                        <td>{{ $kls->jadwal->ruangan->nama_ruang ?? 'Belum ditentukan' }}</td>
                        <td>{{ $kls->jadwal->jam_mulai }}</td>
                        <td>{{ $kls->jadwal->sks }}</td>
                        <td>{{ ucfirst($kls->jadwal->status) }}</td>
                    </tr>
                @endif
            @endforeach
        </tbody>
    </table>
</div>

