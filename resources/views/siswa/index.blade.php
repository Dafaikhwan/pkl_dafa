<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Siswa</title>
</head>
<body>
    <h1>Daftar Siswa</h1>
    <hr>
    <a href="/siswa/create">+ Tambah Siswa</a><br><br>
    
    <table >
        <tr>
            <th>No</th>
            <th>Nama Lengkap</th>
            <th>Kelas</th>
            <th>Aksi</th>
        </tr> 
        @php $no = 1; @endphp
        @foreach ($siswa as $data)
        <tr>
            <td>{{ $no++ }}</td>
            <td>{{ $data['nama'] }}</td>
            <td>{{ $data['kelas'] }}</td>
            <td>  
                <a href="/siswa/{{ $data['id'] }}">Show</a> |
                <a href="/siswa/{{ $data['id'] }}/edit">Edit</a> |
                <form action="/siswa/{{ $data['id'] }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
</body>
</html>
