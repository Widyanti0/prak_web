<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BiodataController extends Controller
{
    public function index()
    {
        $biodata = [
            'Nama' => 'Tri Widyanti',
            'Tempat, Tanggal Lahir' => 'Sinjai, 03 April 2001',
            'Jenis Kelamain' => 'Perempuan',
            'Agama' => 'Islam',
            'Alamat' => 'Jl. H.M Yasin Limpo ',
            'Pendidikan' => 'S1-Teknik Informatika',
            'Pengalaman Organisasi' => 'FOKMAD,PMII'
        ];

        return view('biodata')->with(compact('biodata'));
    }
}
