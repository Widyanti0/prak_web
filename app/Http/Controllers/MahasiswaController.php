<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mahasiswa = Mahasiswa::orderBy('nim')->get();

        return view('mahasiswa.mahasiswa-index')->with(compact('mahasiswa'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('mahasiswa.mahasiswa-create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nim' => [
                'required',
                'numeric',
                'min:10',
                Rule::unique('mahasiswas')->whereNull('deleted_at')
            ],
            'nama' => 'required|min:3',
            'alamat' => 'required|min:3',
            'no_hp' => 'required|numeric|min:10',
        ]);

        $mahasiswa = Mahasiswa::create([
            'nim' => $validated['nim'],
            'nama' => $validated['nama'],
        ]);

        Profile::create([
            'mahasiswa_id' => $mahasiswa->id,
            'alamat' => $validated['alamat'],
            'no_hp' => $validated['no_hp'],
        ]);

        return back()->with('message', 'NIM '.$validated['nim'].' Berhasil Ditambah');
    }

    /**
     * Display the specified resource.
     */
    public function show(Mahasiswa $mahasiswa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);

        return view('mahasiswa.mahasiswa-edit')->with(compact('mahasiswa'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nim' => [
                'required',
                'numeric',
                'min:10',
                Rule::unique('mahasiswas')->whereNull('deleted_at')->ignore($id)
            ],
            'nama' => 'required|min:3',
            'alamat' => 'required|min:3',
            'no_hp' => 'required|numeric|min:10',
        ]);

        $mahasiswa = Mahasiswa::findOrFail($id);
        $profile = Profile::where('mahasiswa_id', $mahasiswa->id)->first();

        $mahasiswa->update([
            'nim' => $validated['nim'],
            'nama' => $validated['nama'],
        ]);

        $profile->update([
            'alamat' => $validated['alamat'],
            'no_hp' => $validated['no_hp'],
        ]);

        return back()->with('message', 'NIM '.$validated['nim'].' Berhasil Diedit');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);
        $profile = Profile::where('mahasiswa_id', $mahasiswa->id)->first();

        $mahasiswa->delete();
        $profile->delete();

        return back()->with('message', 'NIM '.$mahasiswa['nim'].' Berhasil Dipindahkan ke Tempat Sampah');
    }
    public function trash()
    {
        $mahasiswa = Mahasiswa::onlyTrashed()
            ->with(['profiles' => function ($query) {
                $query->onlyTrashed();
            }])
            ->orderBy('nim')->get();

        return view('mahasiswa.mahasiswa-trash')->with(compact('mahasiswa'));
    }
    public function restore($id)
    {
        $mahasiswa = Mahasiswa::onlyTrashed()->findOrFail($id);
        $profile = Profile::onlyTrashed()->where('mahasiswa_id', $mahasiswa->id)->first();

        $mahasiswa->restore();
        $profile->restore();

        return back()->with('message', 'NIM '.$mahasiswa['nim'].' Berhasil Dipulihkan');
    }
    public function forceDelete($id)
    {
        $mahasiswa = Mahasiswa::onlyTrashed()->findOrFail($id);
        $profile = Profile::onlyTrashed()->where('mahasiswa_id', $mahasiswa->id)->first();

        $mahasiswa->forceDelete();
        $profile->forceDelete();

        return back()->with('message', 'NIM '.$mahasiswa['nim'].' Berhasil Dihapus Permanen');
    }
}
