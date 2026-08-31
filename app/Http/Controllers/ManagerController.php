<?php

namespace App\Http\Controllers;

use App\Models\Manager;
use Illuminate\Http\Request;

class ManagerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $managers = Manager::with('kopdes')->latest()->get();
        return view('manager.index', compact('managers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $managers = Manager::all();

        return view('manager.create', compact('managers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'foto_manager'          => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'nama_manager'          => 'required|string|max:255',
            'tanggal_lahir'         => 'required|date',
            'jenis_kelamin'         => 'required|in:Pria,Wanita',
            'alamat_manager'        => 'required|string',
            'pendidikan_terakhir'   => 'required|string|max:255',
        ]);

        $fotoManager = null;
        if ($request->hasFile('foto_manager')) {
            $fotoManager = $request->file('foto_manager')->store('public/foto_manager');
        }

        Manager::create(array_merge($request->all(), ['foto_manager' => $fotoManager]));

        return redirect()->route('manager.index')->with('success', 'Data Manager berhasil disimpan!');
    }
    public function show(string $id)
    {
        //
        $manager = Manager::with('guru')->findOrFail($id);
        return view('manager.show', compact('manager'));
    }
    public function edit(string $id)
    {
        //
        $manager = Manager::findOrFail($id);
        return view('manager.edit', compact('manager'));
    }
    public function update(Request $request, string $id)
    {
        //
        $manager = Manager::findOrFail($id);

        $request->validate([
            'foto_manager'          => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'nama_manager'          => 'required|string|max:255',
            'tanggal_lahir'         => 'required|date',
            'jenis_kelamin'         => 'required|in:Pria,Wanita',
            'alamat_manager'        => 'required|string',
            'pendidikan_terakhir'   => 'required|string|max:255',
        ]);

        // Handle file upload if a new file is provided
        if ($request->hasFile('foto_manager')) {
            // Delete the old file if it exists
            if ($manager->foto_manager) {
                Storage::delete($manager->foto_manager);
            }
            $fotoManager = $request->file('foto_manager')->store('public/foto_manager');
        }

        $manager->update(array_merge($request->all(), ['foto_manager' => $fotoManager]));

        return redirect()->route('manager.index')->with('success', 'Data Manager berhasil diperbarui!');
    }
    public function destroy(string $id)
    {
        //
        $manager = Manager::findOrFail($id);

        if ($manager->foto_manager) {
            Storage::delete($manager->foto_manager);
        }

        $manager->delete();

        return redirect()->route('manager.index')->with('success', 'Data Manager berhasil dihapus!');
    }
}