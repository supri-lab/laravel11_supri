@extends('layout.main')
@section('content')

<h1>Jadwal Pelajaran</h1>
<div class="card">
        <div class="card-header">
        <a href="{{ route('jadwal.create') }}" class="btn btn-primary btn-sm">Tambah Data</a>
        </div>
        <div class="card-body">   
            <table class="table table-sm table-stripped table-bordered">
                <thead>
            <tr>
                <td>No</td>
                <td>Nama Jadwal</td>
                <td>Nama Guru</td>
                <td>Pelajaran</td>
                <td>Jam Mulai</td>
               
                <td>Tanggal</td>
                <td>Aksi</td>
                <td>Delete</td>
            </tr>
            </thead>
            @foreach ($jadwal as $rows)
            <tbody>
                 <tr>
                    <td>{{ $loop->iteration }} </td>
                    <td>{{ $rows->nama_jadwal }}</td>
                    <td>{{ $rows->nama_guru }}</td>
                    <td>{{ $rows->nama_pelajaran }}</td>
                    <td>{{ $rows->jam_mulai }} </td>
                    <td>{{ $rows->created_at }}</td>
                    <td>
                        <a href="{{ route('jadwal.edit', $rows->id) }}" class="btn btn-warning btn-sm">Ubah</a>                                      
                    </td>
                    <td> 
                    
                    <form onsubmit="return deleteData('{{ $rows->nama_jadwal }}')" style="display: inline" method="POST"  action="{{ route('jadwal.destroy', $rows->id) }}">
                            @csrf 
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm">Hapus</button>
                        </form>  
                    </td>
                 </tr>   
            @endforeach
            </tbody>
            </table>
        </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
  function deleteData(name){
    pesan = confirm('Yakin data dengan nama : '+name+' ini dihapus?');
    if(pesan) return true;
    else return false;
  }

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

@endsection