@extends('layouts.app')

@section('title', 'Tambah Mahasiswa')

@section('content')
    <h2>Tambah Mahasiswa</h2>
    <a href="/mahasiswa" class='button'>Kembali</a>
    @if (session()->has('message'))
        <h5>{{ session('message') }}</h5>
    @endif
    <form action="/mahasiswa" class="form" method="POST">
        @csrf
        <label for="nim">NIM Mahasiswa</label>
        <input type="text" name="nim" id="nim" placeholder="60xxxxxxxxx" required>
        <label for="nama">Nama Mahasiswa</label>
        <input type="text" name="nama" id="nama" placeholder="Tri Widyanti" required>
        <label for="alamat">Alamat Mahasiswa</label>
        <input type="text" name="alamat" id="alamat" placeholder="Jl. H.M Yasin Limpo" required>
        <label for="no_hp">No HP Mahasiswa</label>
        <input type="text" name="no_hp" id="no_hp" placeholder="08xxxxxxxxx" required>
        <button type="submit">Tambah Mahasiswa</button>
    </form>
@endsection
