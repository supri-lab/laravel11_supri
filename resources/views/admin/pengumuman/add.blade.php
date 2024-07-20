@extends('layout.main')
@section('content')
<h31>Tambah Data</h3>
<form action="{{ route('pengumuman.store') }}" method="post" enctype="multipart/form-data">
    @csrf
    <table>
        <tr>
            <td>Judul Pengumuman</td><td><input type="text" name="judul"></td>
        </tr>

        <tr>
            <td>Isi Pengumuman</td><td><input type="text" name="isi_pengumuman"></td>
        </tr>
        <tr>
            <td>Tgl Posting</td><td><input type="date" name="tgl_posting"></td>
        </tr>
        
        <tr>
            <td>Icon</td><td><input type="file" name="img"></td>
        </tr>               
        <tr>
            <td>
                <input class="btn btn-sm btn-success" type="submit" value="Simpan">
                <a class="btn btn-sm btn-danger" href="{{ url()->previous() }}" >Back</a>
            </td>
        </tr>
    </table>
</form>
@endsection