<?php

namespace App\Http\Controllers;

use App\Models\Kopdes;
use Illuminate\Http\Request;

class KopdesController extends Controller
{
    public function index()
    {
        $kopdes = Kopdes::with('manager')->latest()->get();
        return view('kopdes.index', compact('kopdes'));
    }

    public function create()
    {
        $managers = \App\Models\Manager::all();
        return view('kopdes.create', compact('managers'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'foto_kopdes'           => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'nama_kopdes'           => 'required|string|max:255',
            'alamat_kopdes'         => 'required|string',
            'tgl_berdiri'           => 'required|date',
            'manager_id'            => 'required|exists:manager,id',
        ]);

        $fotoKopdes = null;
        if ($request->hasFile('foto_kopdes')) {
            $fotoKopdes = $request->file('foto_kopdes')->store('public/foto_kopdes');
        }

        Kopdes::create(array_merge($validated, ['foto_kopdes' => $fotoKopdes]));

        return redirect()->route('kopdes.index')->with('success', 'Data Kopdes berhasil disimpan!');
    }

    public function edit(string $id)
    {
        $kopdes = Kopdes::findOrFail($id);
        return view('kopdes.edit', compact('kopdes'));
    }

    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'foto_kopdes'           => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'nama_kopdes'           => 'required|string|max:255',
            'alamat_kopdes'         => 'required|string',
            'tgl_berdiri'           => 'required|date',
            'manager_id'            => 'required|exists:managers,id',
        ]);

        // Handle file upload if a new file is provided
        if ($request->hasFile('foto_kopdes')) {
            // Delete the old file if it exists
            if ($kopdes->foto_kopdes) {
                Storage::delete($kopdes->foto_kopdes);
            }
            $fotoKopdes = $request->file('foto_kopdes')->store('public/foto_kopdes');
        }

        $kopdes = Kopdes::findOrFail($id);
        $kopdes->update(array_merge($request->all(), ['foto_kopdes' => $fotoKopdes]));

        return redirect()->route('kopdes.index')->with('success', 'Data Kopdes berhasil diperbarui!');
    }

    public function show(string $id)
    {
        $kopdes = Kopdes::with('manager')->findOrFail($id);
        return view('kopdes.show', compact('kopdes'));
    }

    public function destroy(string $id)
    {
        $kopdes = Kopdes::findOrFail($id);

        if ($kopdes->foto_kopdes) {
            Storage::delete($kopdes->foto_kopdes);
        }
        
        $kopdes->delete();

        return redirect()->route('kopdes.index')->with('success', 'Data Kopdes berhasil dihapus!');
    }
}