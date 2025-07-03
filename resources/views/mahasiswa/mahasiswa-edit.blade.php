@extends('layouts.app')

@section('title', 'Edit Mahasiswa')

@section(section: 'content')
    <h2>Edit Mahasiswa</h2>
    <a href="/mahasiswa" class='button'>Kembali</a>
    @if (session()->has('message'))
        <h5>{{ session('message') }}</h5>
    @endif
    <form action="/mahasiswa/{{ $mahasiswa->id }}" class="form" method="POST">
        @csrf
        @method('PUT')
        <label for="nim">NIM Mahasiswa</label>
        <input type="text" name="nim" id="nim" placeholder="60xxxxxxxxx" value="{{ $mahasiswa->nim }}" required>
        <label for="nama">Nama Mahasiswa</label>
        <input type="text" name="nama" id="nama" placeholder="Tri Widyanti" value="{{ $mahasiswa->nama }}" required>
        <label for="alamat">Alamat Mahasiswa</label>
        <input type="text" name="alamat" id="alamat" placeholder="Jl. H.M Yasin Limpo" value="{{ $mahasiswa->profiles->alamat }}" required>
        <label for="no_hp">No HP Mahasiswa</label>
        <input type="text" name="no_hp" id="no_hp" placeholder="08xxxxxxxxx" value="{{ $mahasiswa->profiles->no_hp }}" required>
        <button type="submit">Edit Mahasiswa</button>
    </form>
@endsection
