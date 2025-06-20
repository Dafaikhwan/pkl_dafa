<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Siswa</title>
</head>
<body>
    <h2>Edit Siswa</h2>
    <hr>
    <form action="/siswa/{{ $siswa['id'] }}" method="post">
        @method('PUT')
        @csrf 

        <label for="kelas">Pilih Kelas:</label>
        <select name="kelas" id="kelas" required>
            <option value="xii rpl 1" {{ $siswa['kelas'] == 'xii rpl 1' ? 'selected' : '' }}>XII RPL 1</option>
            <option value="xii rpl 2" {{ $siswa['kelas'] == 'xii rpl 2' ? 'selected' : '' }}>XII RPL 2</option>
            <option value="xii rpl 3" {{ $siswa['kelas'] == 'xii rpl 3' ? 'selected' : '' }}>XII RPL 3</option>
        </select>
        <br><br>

        <label for="nama">Nama:</label>
        <input type="text" name="nama" value="{{ $siswa['nama'] }}" id="nama" placeholder="Masukkan nama" required>
        <br><br>

        <button type="submit">Simpan</button>
        <button type="reset">Reset</button>
    </form>
</body>
</html>
