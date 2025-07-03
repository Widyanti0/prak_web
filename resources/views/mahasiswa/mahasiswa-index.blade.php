@extends('layouts.app')

@section('title', 'Mahasiswa')

@section('scripts')
    <script>
        function confirmDelete() {
            return confirm("Apakah Anda yakin ingin memindahkan ke tempat sampah data ini?");
        }
    </script>
@endsection

@section('content')
    <h2>Selamat datang di halaman Mahasiswa</h2>
    <a href="mahasiswa/create" class='button'>Tambah Mahasiswa</a>
    <a href="{{ route('mahasiswa.trash') }}" class="button trash-btn">Lihat Trash</a>
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
                    <button type="button" class="button edit-btn" onclick="window.location.href='{{ route('mahasiswa.edit', $item->id) }}'">Edit</button>

                    <form action="{{ route('mahasiswa.destroy', $item->id) }}" method="POST" class="table-form" onsubmit="return confirmDelete()">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="button delete-btn">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
@endsection
