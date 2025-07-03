@extends('layouts.app')

@section('title', 'Mahasiswa')

@section('scripts')
    <script>
        function confirmRestore() {
            return confirm("Apakah Anda yakin ingin memulihkan data ini?");
        }
        function confirmDelete() {
            return confirm("Apakah Anda yakin ingin menghapus permanen data ini?");
        }
    </script>
@endsection

@section('content')
    <h2>Selamat datang di halaman Tempat Sampah Mahasiswa</h2>
    <a href="/mahasiswa" class='button'>Kembali</a>
    @if (session()->has('message'))
        <h5>{{ session('message') }}</h5>
    @endif
    <table>
        @foreach ($mahasiswa as $item)
            <thead>
                <tr>
                    <td>No</td>
                    <td>NIM</td>
                    <td>Nama</td>
                    <td>Alamat</td>
                    <td>No HP</td>
                    <td>Aksi</td>
                </tr>
            </thead>
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->nim }}</td>
                <td>{{ $item->nama }}</td>
                <td>{{ $item->profiles->alamat }}</td>
                <td>{{ $item->profiles->no_hp }}</td>
                <td>
                    <form action="{{ route('mahasiswa.restore', $item->id) }}" method="POST" class="table-form" onsubmit="return confirmRestore()">
                        @csrf
                        @method('PUT')
                        <button type="submit" class="button delete-edit">Pulihkan</button>
                    </form>
                    <form action="{{ route('mahasiswa.forceDelete', $item->id) }}" method="POST" class="table-form" onsubmit="return confirmDelete()">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="button delete-btn">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
@endsection
