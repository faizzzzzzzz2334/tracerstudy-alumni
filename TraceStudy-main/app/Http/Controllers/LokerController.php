<?php

namespace App\Http\Controllers;

use App\Models\Loker;
use Illuminate\Http\Request;

class LokerController extends Controller
{
    public function index(Request $request)
    {
        $query = Loker::query();

        if ($request->has('search')) {
            $query->where('nama_perusahaan', 'LIKE', '%' . $request->input('search') . '%');
        }

        $lowongan = $query->paginate(5);
        return view('dosen.loker', compact('lowongan'));
    }

    public function create()
    {
        return view('dosen.create_loker');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_perusahaan' => 'required|string|max:255',
            'posisi' => 'required|string|max:255',
            'persyaratan' => 'required|string',
            'lokasi' => 'required|string|max:255',
            'kontak' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'poster' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->except('_token');

        if ($request->hasFile('poster')) {
            $file = $request->file('poster');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('dist/assets/images/lowongan'), $filename);
            $data['poster'] = $filename;
        }

        Loker::create($data);
        return redirect()->route('dosen.loker')->with('success', 'Lowongan berhasil ditambahkan.');
    }

    public function show($id)
    {
        $loker = Loker::findOrFail($id);
        return view('dosen.show_loker', compact('loker'));
    }

    public function edit($id)
    {
        $loker = Loker::findOrFail($id);
        return view('dosen.edit_loker', compact('loker'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_perusahaan' => 'required|string|max:255',
            'posisi' => 'required|string|max:255',
            'persyaratan' => 'required|string',
            'lokasi' => 'required|string|max:255',
            'kontak' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'poster' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $loker = Loker::findOrFail($id);
        $data = $request->except('_token');

        if ($request->hasFile('poster')) {
            $file = $request->file('poster');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('dist/assets/images/lowongan'), $filename);
            $data['poster'] = $filename;
        }

        $loker->update($data);
        return redirect()->route('dosen.loker')->with('success', 'Lowongan berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $loker = Loker::findOrFail($id);
        $loker->delete();
        return redirect()->route('dosen.loker')->with('success', 'Lowongan berhasil dihapus.');
    }
}
