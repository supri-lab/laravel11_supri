@extends('layout.main')
@section('content')
<h3>Edit Data</h3>
<form action="{{ route('pengumuman.update', $pengumuman->id_pengumuman) }}" method="post">
    @csrf
    @method('put')
    <table>
        <tr>
            <td>Judul pengumuman</td><td><input type="text" name="judul" value="{{ $pengumuman->judul }}"></td>
        </tr>
        <tr>
            <td>Isi pengumuman</td><td><input type="text" name="isi_pengumuman" value="{{ $pengumuman->isi_pengumuman }}"></td>
        </tr>
        <tr>
            <td>Tgl posting</td><td><input type="date" name="tgl_posting" value="{{ $pengumuman->tgl_posting }}"></td>
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