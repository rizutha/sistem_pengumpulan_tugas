<?php

namespace App\Http\Controllers;

use App\Models\Dosen; // Changed from Employee to Dosen
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DosenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $query = Dosen::all(); // Changed from Employee to Dosen
        return view('dosen.index', compact('query')); // Changed from employee.index to dosen.index
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dosen.create'); // Changed from employee.create to dosen.create
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate(
            [
                'nip' => 'required|integer', // Changed from telepon to nip
                'nama' => 'required',
                'codename' => 'required',
                'tgl_lahir' => 'required|date',
                'alamat' => 'required',
                'kontak' => 'required',
                'email' => 'required|email',
                'keilmuan' => 'required',
                'foto' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:10000',
            ],
            [
                'nip.required' => 'Kolom NIP tidak boleh kosong',
                'nip.integer' => 'NIP harus berupa angka',
                'codename' => 'Kode Dosen tidak boleh kosong',
                'nama.required' => 'Kolom Nama tidak boleh kosong',
                'tgl_lahir.required' => 'Kolom Tanggal Lahir tidak boleh kosong',
                'alamat.required' => 'Kolom Alamat tidak boleh kosong',
                'kontak.required' => 'Kolom Kontak tidak boleh kosong',
                'email.required' => 'Kolom Email tidak boleh kosong',
                'email.email' => 'Format Email tidak valid',
                'keilmuan.required' => 'Kolom Dosen Mata Kuliah tidak boleh kosong',
                'foto.required' => 'Silahkan pilih file foto',
                'foto.mimes' => 'Tipe File harus JPG/JPEG/PNG/GIF/SVG',
                'foto.max' => 'Ukuran file tidak boleh dari 10 MB',
            ],
        );

        if ($request->hasFile('foto')) {
            $foto = $request->file('foto');
            $filename = 'FTO' . date('Ymd') . rand() . '.' . $foto->getClientOriginalExtension();
            $foto->storeAs('public/dosen/' . $filename);
        }

        Dosen::create([
            'nip' => $request->nip, // Changed from telepon to nip
            'nama' => $request->nama,
            'codename' => $request->codename,
            'tgl_lahir' => $request->tgl_lahir,
            'alamat' => $request->alamat,
            'kontak' => $request->kontak,
            'email' => $request->email,
            'keilmuan' => $request->keilmuan,
            'foto' => $filename,
        ]);

        return redirect()
            ->route('dosen.index') // Changed from employee.index to dosen.index
            ->with('success', 'Data Dosen sudah berhasil disimpan');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $dosen = Dosen::findOrFail($id); // Changed from Employee to Dosen
        return view('dosen.detail', compact('dosen')); // Changed from employee.detail to dosen.detail
    }

    public function profil()
    {
        $auth = auth()->user()->id;
        $dosen = Dosen::where('users_id', $auth)->first();
        return view('dosen.profil', compact('dosen')); // Changed from employee.detail to dosen.detail
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $dosen = Dosen::findOrFail($id); // Changed from Employee to Dosen
        return view('dosen.edit', compact('dosen')); // Changed from employee.edit to dosen.edit
    }

    public function update(Request $request,  $id)
    {
        $dosen = Dosen::find($id);
        $request->validate(
            [
                'nip' => 'required|integer',
                'nama' => 'required',
                'codename' => 'required',
                'tgl_lahir' => 'required|date',
                'alamat' => 'required',
                'kontak' => 'required',
                'email' => 'required|email',
                'keilmuan' => 'required',
                'foto' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:10000',
            ],
            [
                'nip.required' => 'Kolom NIP tidak boleh kosong',
                'nip.integer' => 'NIP harus berupa angka',
                'codename' => 'Kode Dosen tidak boleh kosong',
                'nama.required' => 'Kolom Nama tidak boleh kosong',
                'tgl_lahir.required' => 'Kolom Tanggal Lahir tidak boleh kosong',
                'alamat.required' => 'Kolom Alamat tidak boleh kosong',
                'kontak.required' => 'Kolom Kontak tidak boleh kosong',
                'email.required' => 'Kolom Email tidak boleh kosong',
                'email.email' => 'Format Email tidak valid',
                'keilmuan.required' => 'Kolom Dosen Mata Kuliah tidak boleh kosong',
                'foto.required' => 'Silahkan pilih file foto',
                'foto.mimes' => 'Tipe File harus JPG/JPEG/PNG/GIF/SVG',
                'foto.max' => 'Ukuran file tidak boleh dari 10 MB',
            ],
        );

        if ($request->hasFile('foto')) {
            Storage::delete('public/dosen/' . $dosen->foto);
            $foto = $request->file('foto');
            $filename = 'FTO' . date('Ymd') . rand() . '.' . $foto->getClientOriginalExtension();
            $foto->storeAs('public/dosen/' . $filename);

            $dosen->update([
                'nip' => $request->nip, // Changed from telepon to nip
                'nama' => $request->nama,
                'codename' => $request->codename,
                'tgl_lahir' => $request->tgl_lahir,
                'alamat' => $request->alamat,
                'kontak' => $request->kontak,
                'email' => $request->email,
                'keilmuan' => $request->keilmuan,
                'foto' => $filename,
            ]);
        } else {
            $dosen->update([
                'nip' => $request->nip, // Changed from telepon to nip
                'nama' => $request->nama,
                'codename' => $request->codename,
                'tgl_lahir' => $request->tgl_lahir,
                'alamat' => $request->alamat,
                'kontak' => $request->kontak,
                'email' => $request->email,
                'keilmuan' => $request->keilmuan,
            ]);
        }

        return redirect()
            ->route('dosen.index') // Changed from employee.index to dosen.index
            ->with('success', 'Data Dosen Berhasil diUpdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Dosen $dosen)
    {
        $dosen->delete();

        Storage::delete('public/dosen/' . $dosen->foto);

        return redirect()
            ->route('dosen.index') // Changed from employee.index to dosen.index
            ->with('success', 'Data Dosen berhasil dihapus');
    }
}
