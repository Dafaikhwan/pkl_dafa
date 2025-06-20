<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MyController extends Controller
{
    private $arr = [
        ['id' => 1, 'nama' => 'faza', 'kelas' => 'xii rpl 1'],
        ['id' => 2, 'nama' => 'faza', 'kelas' => 'xii rpl 2'],
        ['id' => 3, 'nama' => 'faza', 'kelas' => 'xii rpl 3'],
    ];

    public function index()
    {
        // Cek apakah data sudah disimpan di session
        $siswa = session('siswa_data', $this->arr);

        return view('siswa.index', ['siswa' => $siswa]);
    }

    public function show($id)
    {
    $siswa = collect(session('siswa_data', $this->arr))->firstWhere('id', $id);

    if (!$siswa) {
        abort(404);
    }

    return view('siswa.show', ['siswa' => $siswa]);
    }


    public function create()
    {
        return view('siswa.create');
    }

    public function store(Request $request)
    {
        // Ambil data dari session atau default dari array awal
        $siswa = session('siswa_data', $this->arr);

        // Hitung ID baru
        $newId = collect($siswa)->max('id') + 1;

        // Tambahkan data baru dari input
        $siswa[] = [
            'id' => $newId,
            'nama' => $request->nama,
            'kelas' => $request->kelas,
        ];

        // Simpan ke session
        session(['siswa_data' => $siswa]);

        return redirect('/siswa');
    }
    public function edit($id)
    {
        $data = session('siswa_data',$this->arr);
        $siswa = collect($data)->firstWhere('id', $id);

        if (! $siswa){
            abort(404);
        }

        return view('siswa.edit', ['siswa' => $siswa]);
    }
    public function update(Request $request, $id)
    {
    $data = session('siswa_data', $this->arr);

    $index = collect($data)->search(fn($item) => $item['id'] == $id);

    if ($index === false) {
        abort(404);
    }

    $data[$index]['nama'] = $request->nama;
    $data[$index]['kelas'] = $request->kelas;

    session(['siswa_data' => $data]);

    return redirect('/siswa');
    }
    public function destroy($id)
    {
    // Ambil data siswa dari session (atau default dari $this->arr)
    $data = session('siswa_data', $this->arr);

    // Hapus siswa dengan ID yang sesuai
    $filtered = collect($data)->reject(function ($item) use ($id) {
        return $item['id'] == $id;
    })->values()->all(); // Reset index array

    // Simpan kembali ke session
    session(['siswa_data' => $filtered]);

    // Redirect ke halaman daftar siswa
    return redirect('/siswa');
    }


}
