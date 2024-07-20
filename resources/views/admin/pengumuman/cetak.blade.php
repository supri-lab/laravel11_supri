<h3>Master Data Pengumuman</h3>
<table border="1" width="75%">
    <tr>
        <td>NO</td>
        <td>Judul Pengumuman</td>
        <td>Isi Pengumuman</td>
        <td>Tanggal Posting</td>
    </tr>

    @foreach($pengumuman as $item)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $item->judul }}</td>
            <td>{{ $item->isi_pengumuman }}</td>
            <td>{{ $item->tgl_posting }}</td>
        </tr>
    @endforeach
</table>

<!-- Tombol cetak -->
<button onclick="printTable()">Cetak Tabel</button>

<!-- Script untuk fungsi cetak -->
<script>
    function printTable() {
        window.print(); // Memanggil fungsi print bawaan dari window
    }
</script>