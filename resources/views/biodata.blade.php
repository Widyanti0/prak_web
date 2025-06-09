@extends('layouts.app')

@section('title', 'Biodata')

@section('content')
    <h2>Selamat datang di halaman Biodata</h2>
    <table>
        @foreach ($biodata as $key => $item)
            <tr>
                <td>{{ $key }}</td>
                <td>{{ $item }}</td>
            </tr>
        @endforeach
    </table>
@endsection
