<?php

namespace App\Http\Controllers;

use App\Models\Gender;
use App\Models\SuperHero;
use App\Models\Universe;
use Illuminate\Http\Request;

class SuperHeroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $superheroes = SuperHero::all();
        return view('superheroes.index', compact('superheroes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $genders = Gender::select('id', 'name')->get();
        $universes = Universe::select('id', 'name')->get();
        return view('superheroes.create', compact('genders', 'universes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        SuperHero::create([
            'gender_id' => $request->gender_id,
            'real_name' => $request->real_name,    
            'universe_id' => $request->universe_id,
            'name' => $request->name,
            'picture' => $request->picture ?? '',
        ]);
        
        return to_route('superheroes.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(string $id)
    {
        $superhero = SuperHero::with(['gender', 'universe'])->find($id);
        return view('superheroes.show', compact('superhero'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $superhero = SuperHero::find($id);
        $genders = Gender::select('id', 'name')->get();
        $universes = Universe::select('id', 'name')->get();
        return view('superheroes.edit', compact('superhero', 'genders', 'universes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $superhero = SuperHero::find($id);
        $superhero->update([
            'gender_id' => $request->gender_id,
            'real_name' => $request->real_name,
            'universe_id' => $request->universe_id,
            'name' => $request->name,
            'picture' => $request->picture ?? $superhero->picture,
        ]);
        
        return to_route('superheroes.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $superhero = SuperHero::find($id);
        $superhero->delete();
        
        return to_route('superheroes.index');
    }
}