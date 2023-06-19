<div class="mt-3 border p-3 rounded">
    <span class="d-block">Nama: {{ $anak->nama_lengkap }}</span>
    <span class="d-block">NIK: {{ $anak->nik }}</span>
    <span class="d-block">Jenis Kelamin: {{ $anak->jenis_kelamin }}</span>
    <a href="{{route('dashboard.pengukuran.ukur',$anak->id)}}" class="btn btn-success mt-3">UKUR</a>
</div>