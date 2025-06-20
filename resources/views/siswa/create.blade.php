<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Siswa</title>
</head>
<body>
    <h2>Tambah Siswa</h2>
    <hr>
    <form action="/siswa" method="post">
        @csrf 

        <label for="kelas">Pilih Kelas:</label>
        <select name="kelas" id="kelas" required>
            <option value="xii rpl 1">XII RPL 1</option>
            <option value="xii rpl 2">XII RPL 2</option>
            <option value="xii rpl 3">XII RPL 3</option>
        </select>
        <br><br>

        <label for="nama">Nama:</label>
        <input type="text" name="nama" id="nama" placeholder="Masukkan nama" required>
        <br><br>

        <button type="submit">Simpan</button>
        <button type="reset">Reset</button>
    </form>
</body>
</html>
