@extends('layouts.app')

@section('title', 'Daftar Mahasiswa')

@section('content')
    <h1>Daftar Mahasiswa</h1>

    <table border="1" cellpadding="10" cellspacing="0">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>NIM</th>
                <th>IPK</th>
                <th>Keterangan</th>
                <th>Aksi</th>
            </tr>
        </thead>

        <tbody>
            @forelse ($mahasiswa as $mhs)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $mhs['nama'] }}</td>
                    <td>{{ $mhs['nim'] }}</td>
                    <td>{{ number_format($mhs['ipk'], 2) }}</td>

                    <td>
                        @if ($mhs['ipk'] >= 3.5)
                            Cum Laude
                        @elseif ($mhs['ipk'] >= 3.0)
                            Baik
                        @else
                            Perlu ditingkatkan
                        @endif

                        @if ($mhs['ipk'] < 2.0)
                            <x-alert tipe="bahaya">
                                Perhatian! IPK mahasiswa di bawah 2,00.
                            </x-alert>
                        @endif
                    </td>

                    <td>
                        <a href="{{ route('mahasiswa.detail', $mhs['nim']) }}">
                            Lihat Detail
                        </a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6">Belum ada data mahasiswa.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection
