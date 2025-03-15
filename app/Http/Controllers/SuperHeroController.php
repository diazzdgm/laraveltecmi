<?php

namespace App\Http\Controllers;

use App\Models\Gender;
use App\Models\SuperHero;
use App\Models\Universe;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;

class SuperHeroController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $superheroes = SuperHero::with(['gender', 'universe'])->get();
        return view('superheroes.index', compact('superheroes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $genders = Gender::select('id', 'name')->get();
        $universes = Universe::select('id', 'name')->get();
        return view('superheroes.create', compact('genders', 'universes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        // Validar los datos antes de guardarlos
        $validatedData = $request->validate([
            'gender_id' => 'required|exists:genders,id',
            'universe_id' => 'required|exists:universes,id',
            'name' => 'required|string|max:255',
            'real_name' => 'required|string|max:255',
            'picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Máximo 2MB
        ]);

        // Manejar la imagen
        $imagePath = $request->hasFile('picture')
            ? $request->file('picture')->store('superheroes', 'public')
            : null;

        // Crear el superhéroe
        SuperHero::create([
            'gender_id' => $validatedData['gender_id'],
            'universe_id' => $validatedData['universe_id'],
            'name' => $validatedData['name'],
            'real_name' => $validatedData['real_name'],
            'picture' => $imagePath,
        ]);

        return redirect()->route('superheroes.index')->with('success', 'Superhero created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): View
    {
        $superhero = SuperHero::with(['gender', 'universe'])->findOrFail($id);
        return view('superheroes.show', compact('superhero'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): View
    {
        $superhero = SuperHero::findOrFail($id);
        $genders = Gender::select('id', 'name')->get();
        $universes = Universe::select('id', 'name')->get();
        return view('superheroes.edit', compact('superhero', 'genders', 'universes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): RedirectResponse
    {
        $superhero = SuperHero::findOrFail($id);

        // Validar los datos antes de actualizar
        $validatedData = $request->validate([
            'gender_id' => 'required|exists:genders,id',
            'universe_id' => 'required|exists:universes,id',
            'name' => 'required|string|max:255',
            'real_name' => 'required|string|max:255',
            'picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Manejar la imagen
        if ($request->hasFile('picture')) {
            // Eliminar la imagen anterior si existe
            if ($superhero->picture) {
                Storage::disk('public')->delete($superhero->picture);
            }
            $imagePath = $request->file('picture')->store('superheroes', 'public');
        } else {
            $imagePath = $superhero->picture;
        }

        // Actualizar el superhéroe
        $superhero->update([
            'gender_id' => $validatedData['gender_id'],
            'universe_id' => $validatedData['universe_id'],
            'name' => $validatedData['name'],
            'real_name' => $validatedData['real_name'],
            'picture' => $imagePath,
        ]);

        return redirect()->route('superheroes.index')->with('success', 'Superhero updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        $superhero = SuperHero::findOrFail($id);

        // Eliminar la imagen si existe
        if ($superhero->picture) {
            Storage::disk('public')->delete($superhero->picture);
        }

        $superhero->delete();
        
        return redirect()->route('superheroes.index')->with('success', 'Superhero deleted successfully!');
    }
}
