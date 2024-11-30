<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Institusi;
use App\Models\Loker;
use App\Models\Alumni;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $user = $request->user(); // Get the authenticated user
        $query = Alumni::query();
    
        if ($request->has('search')) {
            $query->where(function($query) use ($request) {
                $query->where('nama', 'LIKE', '%' . $request->input('search') . '%')
                      ->orWhere('nim', 'LIKE', '%' . $request->input('search') . '%');
            });
        }
    
        // Paginate the results
        $alumni = $query->paginate(5);
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
        
                // Menghitung total lowongan
                $totalLoker = Loker::count(); // Count total job vacancies
                $loker = Loker::paginate(5); // Use paginate instead of all

                return view('mahasiswa.index', compact('alumni','request','totalAlumni', 'alumniBekerja', 'lulusanPerTahun', 'totalBekerja', 'totalTidakBekerja', 'totalInstitusi', 'institusi', 'totalLoker', 'loker'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function institusi(Request $request)
    {
        $institusi = Institusi::paginate(6);
        return view('mahasiswa.institusi', compact('institusi'));
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

        $alumni = $query->paginate(5);

        return view('mahasiswa.alumni', compact('alumni'));
    }

    public function loker(Request $request)
    {
        $lowongan = Loker::paginate(10); // Adjust the pagination as needed
        return view('mahasiswa.loker', compact('lowongan'));
    }

    public function showAlumni($id)
    {
        $alumni = Alumni::find($id); // Use find instead of findOrFail

        if (!$alumni) {
            return redirect()->route('mahasiswa.alumni')->with('error', 'Alumni not found.'); // Redirect with an error message
        }

        return view('mahasiswa.show_alumni', compact('alumni'));
    }

    public function showInstitusi($id)
    {
        $institusi = Institusi::findOrFail($id);
        return view('mahasiswa.show_institusi', compact('institusi'));
    }

    public function showLoker($id)
    {
        $loker = Loker::findOrFail($id);
        return view('mahasiswa.show_loker', compact('loker'));
    }
}
