@extends('layout.main')
@section('content')


<h3>Tambah Data Jadwal</h3>
<form action="{{ route('jadwal.store') }}" method="POST">
@csrf
<table class="table table-borderless">
    <tr>
        <td width="30%">Nama Jadwal</td>
        <td><input type="text" name="nama_jadwal" class="form-control"></td>
    </tr>
    <tr>
        <td width="30%">Hari</td>
        <td><input type="date" name="hari" class="form-control"></td>
    </tr>
    <tr>
        <td>Jam Mulai</td>
        <td><input type="time" name="jam_mulai" class="form-control"></td>
    </tr>
    <tr>
        <td>Guru</td>
        <td>
            <select name="id_guru" id="id_guru" class="form-select">
                @foreach($guru as $item)
                <option value="{{ $item->id_guru }}"> {{ $item->nama_guru }} </option>
                @endforeach
            </select>
        </td>
    </tr>
    
    <tr>
        <td>Pelajaran</td>
        <td>
            <select name="id_pelajaran" id="id_pelajaran" class="form-select">
                @foreach($pelajaran as $item)
                <option value="{{ $item->id }}"> {{ $item->nama_pelajaran }} </option>
                @endforeach
            </select>
        </td>
    </tr>
    <tr>
        <td><input type="submit" class="btn btn-primary" value="Kirim"></td>
    </tr>
</table>
</form>

@endsection