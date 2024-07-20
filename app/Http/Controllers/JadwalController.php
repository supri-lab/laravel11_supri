<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Pelajaran_model;
use App\Models\Jadwal;
use App\Models\Siswa;
use Illuminate\Http\Request;

class JadwalController extends Controller
{
    public function index()
    {
        //Query builder biaya
        $myjadwal   = new Jadwal();
        $jadwal = $myjadwal->list_jadwal();
        
        //Menggunakan Eloquent
        //$jadwal = Jadwal::get();      
       return view('jadwal.index', compact('jadwal'));
    }

    public function create()
    {
        $guru = Guru::get();
        $pelajaran = Pelajaran_model::get();
        
        return view ('Jadwal.add', compact('guru', 'pelajaran'));
    }

    public function store(Request $request)
    {
        $Jadwal = new Jadwal();
        $Jadwal->nama_jadwal = $request->nama_jadwal;
        $Jadwal->hari = $request->hari;
        $Jadwal->jam_mulai = $request->jam_mulai;
        $Jadwal->id_guru = $request->id_guru;
        $Jadwal->id_pelajaran = $request->id_pelajaran;
        $Jadwal->save();
        return redirect()->route('jadwal.index')->with(['success' => 'Data Berhasil Ditambahkan!']);
    }


    public function show(string $id)
    {
        //
    }


    public function edit(string $id)
    {
        $jadwal = Jadwal::find($id);
        $guru = Guru::get();
        $pelajaran = Pelajaran_model::get();
        return view('Jadwal.edit', compact('jadwal', 'guru', 'pelajaran'));
    }

    public function update(Request $request, string $id)
    {
        $Jadwal = Jadwal::find($id);
        $Jadwal->nama_jadwal = $request->nama_jadwal;
        $Jadwal->hari = $request->hari;
        $Jadwal->jam_mulai = $request->jam_mulai;
        $Jadwal->id_guru = $request->id_guru;
        $Jadwal->id_pelajaran = $request->id_pelajaran;
        $Jadwal->update();
        return redirect()->route('jadwal.index')->with(['success' => 'Data Berhasil Diubah!']);
    }


    public function destroy(string $id)
    {
         Jadwal::destroy($id);
         return redirect()->route('jadwal.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
