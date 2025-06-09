@extends('layouts.app')

@section('title', 'About')

@section('content')
    <h2>Selamat datang di halaman About</h2>
    <div style="display: flex; flex-direction: row; align-items: start; justify-content: center; gap: 50px;">
        <div>
            <h2>Data Mahasiswa</h2>
            <p>Nama : Nabil Hakim</p>
            <p>NIM : 602001190</p>
            <p>Kelas : C</p>
            <p>Jurusan : Teknik Informatika</p>
        </div>
        <div>
            <h2>Data Pribadi</h2>
            <p>TTL : Sinjai, 3 April 2001</p>
            <p>Alamat : Jl. H.M Yasin Limpo</p>
            <p>Jenis Kelamin : Perempuan</p>
            <p>Agama : Islam</p>
        </div>
    </div>
@endsection
