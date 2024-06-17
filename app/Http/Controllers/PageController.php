<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class PageController extends Controller
{
    //
    public function index()
    {


        return view('home',['bg' => 'bg_home']);
    }

    public function weapon()
    {
        $items = Item::all();
        return view('admin.weapon',['bg' => 'bg_weapons'], compact('items'));
    }
}
