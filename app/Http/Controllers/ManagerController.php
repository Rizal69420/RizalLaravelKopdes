<?php

namespace App\Http\Controllers;

use App\Models\Manager;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
        $validated = $request->validate([
            'foto_manager'          => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'nama_manager'          => 'required|string|max:255',
            'tanggal_lahir'         => 'required|date',
            'jenis_kelamin'         => 'required|in:Pria,Wanita',
            'alamat_manager'        => 'required|string',
            'pendidikan_terakhir'   => 'required|string|max:255',
        ]);

        if ($request->hasFile('foto_manager')) {
            $validated['foto_manager'] = $request->file('foto_manager')->store('managers', 'public');
        }
        Manager::create($validated);

        return redirect()->route('manager.index')->with('success', 'Data Manager berhasil disimpan!');
    }
    public function show(string $id)
    {
        //
        $manager = Manager::with('managers')->findOrFail($id);
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

        $validated = $request->validate([
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
                Storage::disk('public')->delete($manager->foto_manager);
            }
            $validated['foto_manager'] = $request->file('foto_manager')->store('managers', 'public');
        } else {
            // If no new file is provided, keep the old file path
            unset($validated['foto_manager']);
        }

        $manager->update($validated);

        return redirect()->route('manager.index')->with('success', 'Data Manager berhasil diperbarui!');
    }
    public function destroy(string $id)
    {
        //
        $manager = Manager::findOrFail($id);

        if ($manager->foto_manager) {
            Storage::disk('public')->delete($manager->foto_manager);
        }

        $manager->delete();

        return redirect()->route('manager.index')->with('success', 'Data Manager berhasil dihapus!');
    }
}