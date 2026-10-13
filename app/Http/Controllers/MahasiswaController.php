<?php

namespace App\Http\Controllers;

class MahasiswaController extends Controller
{
    // Latihan 1: Profil Mahasiswa
    public function profil()
    {
        $nama = 'Leo Gading Astrada';
        $nim = '242520120';
        $prodi = 'Teknologi Informasi';

        return view('mahasiswa.profil', compact('nama', 'nim', 'prodi'));
    }

    // Latihan 2: Daftar Mahasiswa
    public function daftar()
    {
        $mahasiswa = [
            [
                'nama' => 'Hafidz Maulana Ahamad',
                'nim' => '242520116',
                'ipk' => 3.80
            ],
            [
                'nama' => 'Akira Arnovzya Avanaza',
                'nim' => '242520125',
                'ipk' => 3.40
            ],
            [
                'nama' => 'Reza Revansyah',
                'nim' => '242520105',
                'ipk' => 3.10
            ],
            [
                'nama' => 'Bimo Putra Listyantoro',
                'nim' => '242520104',
                'ipk' => 2.75
            ],
            [
                'nama' => 'Agil Sudartono',
                'nim' => '242520119',
                'ipk' => 1.90
            ],
        ];

        return view('mahasiswa.daftar', compact('mahasiswa'));
    }

    // Latihan 3: Detail Mahasiswa berdasarkan NIM
    public function detail(string $nim)
    {
        $mahasiswa = [
            [
                'nama' => 'Hafidz Maulana Ahamad',
                'nim' => '242520116',
                'ipk' => 3.80
            ],
            [
                'nama' => 'Akira Arnovzya Avanaza',
                'nim' => '242520125',
                'ipk' => 3.40
            ],
            [
                'nama' => 'Reza Revansyah',
                'nim' => '242520105',
                'ipk' => 3.10
            ],
            [
                'nama' => 'Bimo Putra Listyantoro',
                'nim' => '242520104',
                'ipk' => 2.75
            ],
            [
                'nama' => 'Agil Sudartono',
                'nim' => '242520119',
                'ipk' => 1.90
            ],
        ];

        $data = collect($mahasiswa)->firstWhere('nim', $nim);

        if (!$data) {
            abort(404, 'Mahasiswa tidak ditemukan.');
        }

        return view('mahasiswa.detail', ['mhs' => $data]);
    }
}
