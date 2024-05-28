<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class PageController extends Controller
{
    //
    public function index()
    {
        $items = Item::all();

        return view('home', compact('items'));
    }
}
