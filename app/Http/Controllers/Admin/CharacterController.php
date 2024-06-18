<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCharacterRequest;
use App\Http\Requests\UpdateCharacterRequest;
use App\Models\Character;
use App\Models\Item;
use App\Models\Type;
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
        return view('admin.characters.index', ['bg' => 'bg_index'], compact('characters'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $types = Type::all();

        $items = Item::all();


        return view('admin.characters.create', ['bg' => 'bg_create'], compact('items', 'types'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCharacterRequest $request)
    {

        $form_data = $request->validated();
        $new_character = Character::create($form_data);


        /**
         * items = [
         *  [
         *      id => 1,
         *      qty => 10
         *  ]
         * ]
         */

        if ($request->has('items')) {

            $new_character->items()->attach($request->items);
        }

        return to_route('admin.characters.show', $new_character);
    }

    /**
     * Display the specified resource.
     */
    public function show(Character $character)
    {
        //
        return view('admin.characters.show', ['bg' => 'bg_show'], compact('character'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Character $character)
    {
        //
        // $character->load(['items']);
        $types = Type::all();
        $items = Item::all();

        return view('admin.characters.edit', ['bg' => 'bg_edit'], compact('character', 'types', 'items'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCharacterRequest $request, Character $character)
    {

        $form_data = $request->validated();
        $character->update($form_data);

        if ($request->has('items')) {

            $character->items()->sync($request->items);
        } else {
            $character->items()->detach();
        }


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
