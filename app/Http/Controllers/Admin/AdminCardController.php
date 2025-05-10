<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Card;

class AdminCardController extends Controller
{
    public function index()
{
    $cards = \App\Models\Card::all(); // Fetch all cards from the database
    return view('admin.cards.index', compact('cards')); // Send data to view
}

    public function create()
    {
        return view('admin.cards.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required',
            'description' => 'nullable',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('cards', 'public');
        }

        $card = Card::create($validated);

        return redirect()->route('admin.cards.show', $card->id);
    }

    public function show($id)
    {
        $card = Card::findOrFail($id);
        return view('admin.cards.show', compact('card'));
    }


        public function destroy($id)
        {
            $card = Card::findOrFail($id);
            $card->delete();

            return redirect()->route('admin.cards.index')->with('success', 'Item deleted successfully.');
        }

}
