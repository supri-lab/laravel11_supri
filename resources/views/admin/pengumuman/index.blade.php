@extends('layout.main')
@section('content')
    

<h1>Master Data Pengumuman</h1>
<div class="row">
    <div class="col-md-12 my-3">
        <a href="{{ route('pengumuman.create') }}" class="btn btn-success btn-sm">Tambah Data</a>
        <a href="{{ route('cetak_pengumuman') }}" target="_BLANK" class="btn btn-primary btn-sm">Cetak Data</a>
    </div>
    <div class="col-md-12 my-3">
        <table class="table table-bordered table-condensed table-hover">
            <tr>
                <th scope="col">No</th>
                <th scope="col">Judul</th>
                <th scope="col">Isi Pengumuman</th>
                <th scope="col">Tgl Posting</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pengumuman as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->judul }}</td>
                <td>{{ $item->isi_pengumuman }}</td>
                <td>{{ date('d M Y', strtotime($item->tgl_posting)) }}</td>
                <td>
                    <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('pengumuman.destroy', $item->id_pengumuman) }}" method="POST">
                        <!-- <a href="{{ route('pengumuman.show', $item->id_pengumuman) }}" class="btn btn-sm btn-dark">SHOW</a> -->
                        <a href="{{ route('pengumuman.edit', $item->id_pengumuman) }}" class="btn btn-sm btn-primary">EDIT</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    //message with sweetalert
    @if(session('success'))
        Swal.fire({
            icon: "success",
            title: "BERHASIL",
            text: "{{ session('success') }}",
            showConfirmButton: false,
            timer: 2000
        });
    @elseif(session('error'))
        Swal.fire({
            icon: "error",
            title: "GAGAL!",
            text: "{{ session('error') }}",
            showConfirmButton: false,
            timer: 2000
        });
    @endif

</script>

</tbody>
</table>
</div>
</div>
@endsection