<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DosenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $query = Dosen::orderBy('id', 'asc')->paginate(5);
        return view('dosen.index', ['queries' => $query]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dosen.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'nama' => 'required',
                'tgl_lahir' => 'required',
                'telepon' => 'required',
                'gender' => 'required',
                'pendidikan' => 'required',
                'unit_kerja' => 'required',
                'jabatan' => 'required',
                'foto' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:10000',
            ],
            [
                'nama.required' => 'Kolom Nama tidak boleh kosong',
                'tgl_lahir.required' => 'Kolom Tanggal Lahir tidak boleh kosong',
                'telepon.required' => 'Kolom No. Telepon tidak boleh kosong',
                'gender.required' => 'Gender tidak boleh kosong',
                'pendidikan.required' => 'Pilihan Pendidikan tidak boleh kosong',
                'unit_kerja.required' => 'Unit Kerja tidak boleh kosong',
                'jabatan.required' => 'Kolom Jabatan tidak boleh kosong',
                'foto.required' => 'Silahkan pilih file foto',
                'foto.mimes' => 'Tipe File harus JPG/JPEG/PNG/GIF/SVG',
                'foto.max' => 'Ukuran file tidak boleh dari 10 MB',
            ]
        );

        if ($request->hasFile('foto')) {
            $foto = $request->file('foto');
            $filename = 'foto' . date('Ymd') . '.' . $foto->getClientOriginalExtension();
            $foto->storeAs('public/foto/' . $filename);
        }

        Dosen::create([
            'nama' => $request->nama,
            'tgl_lahir' => $request->tgl_lahir,
            'telepon' => $request->telepon,
            'gender' => $request->gender,
            'pendidikan' => $request->pendidikan,
            'unit_kerja' => $request->unit_kerja,
            'jabatan' => $request->jabatan,
            'foto' => $filename,
        ]);

        return redirect()
            ->route('dosen.index')
            ->with('success', 'Data Dosen sudah berhasil disimpan');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $dosen = Dosen::findOrFail($id);
        return view('dosen.detail', compact('dosen'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $dosen = Dosen::findOrFail($id);
        return view('dosen.edit', compact('dosen'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Dosen $dosen)
    {
        $request->validate(
            [
                'nama' => 'required',
                'tgl_lahir' => 'required',
                'telepon' => 'required',
                'gender' => 'required',
                'pendidikan' => 'required',
                'unit_kerja' => 'required',
                'jabatan' => 'required',
                'foto' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:10000',
            ],
            [
                'nama.required' => 'Kolom Nama tidak boleh kosong',
                'tgl_lahir.required' => 'Kolom Tanggal Lahir tidak boleh kosong',
                'telepon.required' => 'Kolom No. Telepon tidak boleh kosong',
                'gender.required' => 'Gender tidak boleh kosong',
                'pendidikan.required' => 'Pilihan Pendidikan tidak boleh kosong',
                'unit_kerja.required' => 'Unit Kerja tidak boleh kosong',
                'jabatan.required' => 'Kolom Jabatan tidak boleh kosong',
                'foto.required' => 'Silahkan pilih file foto',
                'foto.mimes' => 'Tipe File harus JPG/JPEG/PNG/GIF/SVG',
                'foto.max' => 'Ukuran file tidak boleh dari 10 MB',
            ]
        );

        if ($request->hasFile('foto')) {
            Storage::delete('public/foto/' . $dosen->foto);
            $foto = $request->file('foto');
            $filename = 'foto' . date('Ymd') . '.' . $foto->getClientOriginalExtension();
            $foto->storeAs('public/foto/' . $filename);

            $dosen->update([
                'nama' => $request->nama,
                'tgl_lahir' => $request->tgl_lahir,
                'telepon' => $request->telepon,
                'gender' => $request->gender,
                'pendidikan' => $request->pendidikan,
                'unit_kerja' => $request->unit_kerja,
                'jabatan' => $request->jabatan,
                'foto' => $filename,
            ]);
        } else {
            $dosen->update([
                'nama' => $request->nama,
                'tgl_lahir' => $request->tgl_lahir,
                'telepon' => $request->telepon,
                'gender' => $request->gender,
                'pendidikan' => $request->pendidikan,
                'unit_kerja' => $request->unit_kerja,
                'jabatan' => $request->jabatan,
            ]);
        }

        return redirect()
            ->route('dosen.index')
            ->with('success', 'Data Dosen Berhasil diUpdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Dosen $dosen)
    {
        $dosen->delete();

        Storage::delete('public/foto/' . $dosen->foto);

        return redirect()
            ->route('dosen.index')
            ->with('success', 'Data Dosen berhasil dihapus');
    }
}
