<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Don;

class DonController extends Controller
{
    public function index()
    {
        return view('dons.index');
    }

    public function store(Request $request)
    {
        $request->validate([
            'amount' => 'required|numeric|min:1000',
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'nullable|string',
            'message' => 'nullable|string'
        ]);

        // Ici vous pouvez enregistrer le don dans la base de données
        // ou traiter le paiement selon votre système

        return redirect()->back()->with('success', 'Merci pour votre don !');
    }
}