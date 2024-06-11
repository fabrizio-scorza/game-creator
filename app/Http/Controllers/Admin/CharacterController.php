<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCharacterRequest;
use App\Http\Requests\UpdateCharacterRequest;
use App\Models\Character;
use Illuminate\Http\Request;


class CharacterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $characters = Character::all();
        return view('admin.characters.index', compact('characters'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.characters.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCharacterRequest $request)
    {
        //
        // $request->validate([
        //     'name' => 'required|max:200|min:3',
        //     'description' => 'nullable|max:2000',
        //     'attack' => 'required|min:1|max:100',
        //     'defence' => 'required|min:1|max:100',
        //     'speed' => 'required|min:1|max:100',
        //     'life' => 'required|min:1|max:999',
        // ]);

        $form_data = $request->validated();
        $new_character = Character::create($form_data);

        return to_route('admin.characters.show', $new_character);
    }

    /**
     * Display the specified resource.
     */
    public function show(Character $character)
    {
        //
        return view('admin.characters.show', compact('character'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Character $character)
    {
        //
        return view('admin.characters.edit', compact('character'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCharacterRequest $request, Character $character)
    {
        //
        // $request->validate([
        //     'name' => 'required|max:200|min:3',
        //     'description' => 'nullable|max:2000',
        //     'attack' => 'required|min:1|max:100',
        //     'defence' => 'required|min:1|max:100',
        //     'speed' => 'required|min:1|max:100',
        //     'life' => 'required|min:1|max:999',
        // ]);

        $form_data = $request->validated();
        $character->update($form_data);

        return to_route('admin.characters.show', $character);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Character $character)
    {
        //
        $character->delete();

        return to_route('admin.characters.index');
    }
}
