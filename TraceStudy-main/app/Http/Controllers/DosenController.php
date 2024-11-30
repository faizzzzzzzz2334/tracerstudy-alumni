<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Alumni;
use App\Models\Institusi;
use Illuminate\Http\Request;

class DosenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Alumni::query();
    
        if ($request->has('search')) {
            $query->where(function($query) use ($request) {
                $query->where('nama', 'LIKE', '%' . $request->input('search') . '%')
                      ->orWhere('nim', 'LIKE', '%' . $request->input('search') . '%');
            });
        }
    
        // Paginate the results
        $alumni = $query->paginate(10);
                // Menghitung total alumni
                $totalAlumni = Alumni::count();

                // Menghitung alumni yang aktif bekerja
                $alumniBekerja = Alumni::where('status', 'bekerja')->count();
        
                // Menghitung lulusan per tahun
                $lulusanPerTahun = Alumni::selectRaw('angkatan, count(*) as total')
                    ->groupBy('angkatan')
                    ->pluck('total', 'angkatan');
        
                // Menghitung alumni bekerja dan tidak bekerja untuk chart pie
                $totalBekerja = Alumni::where('status', 'bekerja')->count();
                $totalTidakBekerja = Alumni::where('status', '!=', 'bekerja')->count();
        
                $totalInstitusi = Institusi::count(); // Menghitung total institusi
                $institusi = Institusi::take(3)->get(); // Mengambil 3 institusi
        
                return view('dosen.index', compact('alumni','request','totalAlumni', 'alumniBekerja', 'lulusanPerTahun', 'totalBekerja', 'totalTidakBekerja', 'totalInstitusi', 'institusi'));
    }

    public function alumni(Request $request)
    {
        $query = Alumni::query();
    
        if ($request->has('search')) {
            $query->where(function($query) use ($request) {
                $query->where('nama', 'LIKE', '%' . $request->input('search') . '%')
                      ->orWhere('nim', 'LIKE', '%' . $request->input('search') . '%');
            });
        }
    
        // Paginate the results
        $alumni = $query->paginate(5);
    
        return view('dosen.alumni', compact('alumni'));
    }

    public function agenda(){
        return view('dosen.agenda');
    }

    public function institusi(Request $request)
    {
        $query = Institusi::query();

        if ($request->has('search')) {
            $query->where('nama', 'LIKE', '%' . $request->input('search') . '%');
        }

        $institusi = $query->paginate(6);
        return view('dosen.institusi', compact('institusi'));
    }

    public function createInstitusi()
    {
        return view('dosen.create_institusi');
    }

    public function storeInstitusi(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'alamat' => 'required|string|max:255',
            'email' => 'required|email|unique:institusis,email',
        ]);

        $data = $request->all();

        if ($request->hasFile('logo')) {
            $file = $request->file('logo');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('dist/assets/images/institusi'), $filename);
            $data['logo'] = $filename;
        }

        Institusi::create($data);
        return redirect()->route('dosen.institusi')->with('success', 'Institusi berhasil ditambahkan.');
    }

    public function destroyInstitusi($id)
    {
        $institusi = Institusi::findOrFail($id);
        $institusi->delete();
        return response()->json(['success' => 'Data berhasil dihapus']);
    }

    public function loker(){
        return view('dosen.loker');
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
        $request->validate([
            'nama' => 'required|string|max:255',
            'nim' => 'required|string|max:20|unique:alumnis',
            'prodi' => 'required|string|max:100',
            'angkatan' => 'required|integer',
            'status' => 'required|in:bekerja,tidak bekerja',
            'institusi' => 'nullable|string|max:255',
        ]);
    
        Alumni::create($request->all());
    
        return redirect()->route('dosen.alumni')->with('success', 'Alumni berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $alumni = Alumni::findOrFail($id);
        return view('dosen.show', compact('alumni'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'nim' => 'required|string|max:20',
            'prodi' => 'required|string|max:100',
            'angkatan' => 'required|integer',
            'status' => 'required|in:bekerja,tidak bekerja',
            'institusi' => 'nullable|string|max:255',
        ]);

        $alumni = Alumni::findOrFail($id);
        $alumni->update($request->all());

        return redirect()->route('dosen.alumni')->with('success', 'Data alumni berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $alumni = Alumni::findOrFail($id);
        $alumni->delete();

        return response()->json(['success' => 'Data berhasil dihapus']);
    }

    public function showInstitusi($id)
    {
        $institusi = Institusi::findOrFail($id);
        return view('dosen.show_institusi', compact('institusi'));
    }

    public function editInstitusi($id)
    {
        $institusi = Institusi::findOrFail($id);
        return view('dosen.edit_institusi', compact('institusi'));
    }

    public function updateInstitusi(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'alamat' => 'required|string|max:255',
            'email' => 'required|email|unique:institusis,email,' . $id,
        ]);

        $institusi = Institusi::findOrFail($id);
        $institusi->nama = $request->nama;
        $institusi->alamat = $request->alamat;
        $institusi->email = $request->email;

        if ($request->hasFile('logo')) {
            $file = $request->file('logo');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('dist/assets/images/institusi'), $filename);
            $institusi->logo = $filename;
        }

        $institusi->save();
        return redirect()->route('dosen.institusi')->with('success', 'Institusi berhasil diperbarui.');
    }
}
