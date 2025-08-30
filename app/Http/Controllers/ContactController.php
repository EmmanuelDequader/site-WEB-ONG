<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMessage;

class ContactController extends Controller
{
    /**
     * Affiche le formulaire de contact
     */
    public function show()
    {
        return view('contact');
    }

    /**
     * Traite l'envoi du formulaire de contact
     */
    public function send(Request $request)
    {
        // Validation des données
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'subject' => 'required|string|max:255',
            'message' => 'required|string'
        ]);

        try {
            // Envoi de l'email
            Mail::to('saahdel2@gmail.com')->send(new ContactMessage(
                $validated['name'],
                $validated['email'],
                $validated['subject'],
                $validated['message']
            ));

            return redirect()->route('contact')
                ->with('success', 'Votre message a été envoyé avec succès. Nous vous répondrons bientôt.');
                
        } catch (\Exception $e) {
            return redirect()->route('contact')
                ->with('error', 'Une erreur s\'est produite lors de l\'envoi de votre message. Veuillez réessayer.')
                ->withInput();
        }
    }
}