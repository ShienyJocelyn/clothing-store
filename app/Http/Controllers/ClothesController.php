<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClothesRequest;
use App\Models\Category;
use App\Models\Clothes;
use App\Models\User;
use Illuminate\Http\Request;

class ClothesController extends Controller
{
    public function index()
    {
        $clothes = Clothes::paginate(5);

        return view("pages.clothes.index", compact("clothes"));

    }

    public function create()
    {
        
        $users = User::all();
        $categories = Category::all();

        return view('pages.clothes.create', compact('users', 'categories'));
    }

    public function store(ClothesRequest $request)
    {
        $data = $request->all();
        Clothes::create($request->all());

        return redirect()->route('clothes.index')->with('success','Sucessfully create a product!');
    }

    public function show()
    {

    }

    public function edit(Clothes $cloth)
    {
        $users = User::all();
        $categories = Category::all();

        return view('pages.clothes.edit', compact('cloth','users', 'categories'));
    }

    public function update()
    {
        
    }

    public function destroy()
    {

    }
}
