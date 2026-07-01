<?php

namespace App\Http\Controllers;

use App\Models\Satpam;
use App\Http\Requests\StoreSatpamRequest;
use App\Http\Requests\UpdateSatpamRequest;

class SatpamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(\Illuminate\Http\Request $request)
    {
        $query = Satpam::query();
        if ($request->has('search')) {
            $search = $request->search;
            $query->where('nama', 'like', "%{$search}%")
                  ->orWhere('nik', 'like', "%{$search}%");
        }
        $satpams = $query->paginate(10);
        return view('satpams.index', compact('satpams'));
    }

    public function create()
    {
        return view('satpams.create');
    }

    public function store(StoreSatpamRequest $request)
    {
        $validated = $request->validated();
        if ($request->hasFile('foto')) {
            $validated['foto'] = $request->file('foto')->store('fotos', 'public');
        }
        Satpam::create($validated);
        return redirect()->route('satpams.index')->with('success', 'Data Satpam berhasil ditambahkan.');
    }

    public function show(Satpam $satpam)
    {
        return view('satpams.show', compact('satpam'));
    }

    public function edit(Satpam $satpam)
    {
        return view('satpams.edit', compact('satpam'));
    }

    public function update(UpdateSatpamRequest $request, Satpam $satpam)
    {
        $validated = $request->validated();
        if ($request->hasFile('foto')) {
            if ($satpam->foto) {
                \Illuminate\Support\Facades\Storage::disk('public')->delete($satpam->foto);
            }
            $validated['foto'] = $request->file('foto')->store('fotos', 'public');
        }
        $satpam->update($validated);
        return redirect()->route('satpams.index')->with('success', 'Data Satpam berhasil diperbarui.');
    }

    public function destroy(Satpam $satpam)
    {
        $satpam->delete();
        return redirect()->route('satpams.index')->with('success', 'Data Satpam berhasil dihapus (soft delete).');
    }

    public function trash()
    {
        $satpams = Satpam::onlyTrashed()->paginate(10);
        return view('satpams.trashed', compact('satpams'));
    }

    public function restore($id)
    {
        $satpam = Satpam::onlyTrashed()->findOrFail($id);
        $satpam->restore();
        return redirect()->route('satpams.trash')->with('success', 'Data Satpam berhasil dipulihkan.');
    }
}
