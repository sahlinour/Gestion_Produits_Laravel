<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produit;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\ProduitRequest;

class ProduitController extends Controller
{
    public function index()
    {
        $produits = Produit::all();

        foreach ($produits as $produit) {
            $url = asset(Storage::url($produit->image));

            $produit->image = $url;
        }

        return view('produits.index', compact('produits'));
    }

    public function create()
    {
        return view('produits.create');
    }

    public function store(ProduitRequest $request)
    {
       
        $request->validated();

        $produit = new Produit($request->all());

        if ($request->hasFile('image')) {
            $produit->image = $request->file('image')->store('images', 'public');
        }

        $produit->save();

        return redirect()->route('produits.index')->with('success', 'Produit créé avec succès.');
    }

    public function show($id)
    {
        $produit = Produit::find($id);
     
        return view('produits.show', compact('produit'));
    }

    public function edit($produit)
    {
        $produit = Produit::find($produit);

        return view('produits.edit', compact('produit'));
    }

    public function update($produit, Request $request)
    {
        $produit = Produit::find($produit);

        $request->validate([
            'libelle' => 'required|string',
            'marque' => 'required|string',
            'prix' => 'required|numeric',
            'stock' => 'required|integer|min:1|max:9999',
            'image' => 'nullable|image|mimes:png,jpg,jpeg',
        ]);

        $produit->update($request->all());

        if ($request->hasFile('image')) {
            $produit->image = $request->file('image')->store('images', 'public');
            $produit->save();
        }

        return redirect()->route('produits.show', $produit->id)->with('success', 'Produit mis à jour avec succès.');
    }

    public function destroy($produit)
    {
        $produit = Produit::find($produit);

        $produit->delete();

        return redirect()->route('produits.index')->with('success', 'Produit supprimé avec succès.');
    }

}
