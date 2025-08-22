<?php

// app/Http/Controllers/DonController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Don;

class DonController extends Controller
{

public function index()
{
    $dons = Don::with('user', 'project')->get();
    return view('dons.index', compact('dons'));
}
    public function store(Request $request)
    {
        $request->validate([
            'amount' => 'required|numeric',
            'project_id' => 'required|exists:projects,id',
        ]);

        $don = new Don();
        $don->amount = $request->amount;
        $don->project_id = $request->project_id;
        $don->user_id = auth()->id();
        $don->save();

        return redirect()->back()->with('success', 'Don effectué avec succès');
    }
}