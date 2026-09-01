<?php

namespace App\Http\Controllers;
use App\Models\Anabul;
use Illuminate\Http\Request;

class AnabulController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $anabuls = Anabul::latest()->get();
        return view('anabul.index', compact('anabuls'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view ('anabul.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:128',
            'ras' => 'required|string|max:128',
            'jenis_kelamin' => 'required|string|max:128',
            'umur' => 'required|integer|min:0',
            'warna' => 'required|string|max:50',
            'harga' => 'required|numeric|min:0',
            'foto' => 'required|string|max:255',
            'kondisi' => 'required|string',
            'status_ketersediaan' => 'required|string|max:28',
        ]);

        Anabul::create($validated);

        return redirect()
            ->route('owner.anabul.index')
            ->with('success', 'Data anabul berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    
        public function show(Anabul $anabul)
    {
        return view('anabul.show', compact('anabul'));
    }
    

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Anabul $anabul)
    {
        return view('anabul.edit', compact('anabul'));
    }
    

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Anabul $anabul)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:128',
            'ras' => 'required|string|max:128',
            'jenis_kelamin' => 'required|string|max:128',
            'umur' => 'required|integer|min:0',
            'warna' => 'required|string|max:50',
            'harga' => 'required|numeric|min:0',
            'foto' => 'required|string|max:255',
            'kondisi' => 'required|string',
            'status_ketersediaan' => 'required|string|max:28',
        ]);

        $anabul->update($validated);

        return redirect()
            ->route('owner.anabul.index')
            ->with('success', 'Data anabul berhasil diperbarui.');
    }

    public function ownerIndex()
    {
        $anabuls = Anabul::latest()->get();
        return view('owner.anabul.index', compact('anabuls'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Anabul $anabul)
    {
        $anabul->delete();
        return redirect()
            ->route('owner.anabul.index')
            ->with('success', 'Data anabul berhasil dihapus.');
    }
}
