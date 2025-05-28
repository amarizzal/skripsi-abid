<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    // Display a listing of contacts
    public function index()
    {
        $contacts = Contact::all();
        return view('contact.index', compact('contacts'));
    }

    // Show the form for creating a new contact
    public function create()
    {
        return view('contact.create');
    }

    // Store a newly created contact
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'nullable|string|max:20',
        ]);

        $contact = Contact::create($validated);
        return redirect()->route('contact.index')->with('success', 'Contact created successfully.');
    }

    // Display the specified contact
    public function show($id)
    {
        $contact = Contact::findOrFail($id);
        return view('contact.show', compact('contact'));
    }

    // Show the form for editing the specified contact
    public function edit($id)
    {
        $contact = Contact::findOrFail($id);
        return view('contact.edit', compact('contact'));
    }

    // Update the specified contact
    public function update(Request $request, $id)
    {
        $contact = Contact::findOrFail($id);

        $validated = $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'phone' => 'nullable|string|max:20',
        ]);

        $contact->update($validated);
        return redirect()->route('contact.index')->with('success', 'Contact updated successfully.');
    }

    // Remove the specified contact
    public function destroy($id)
    {
        $contact = Contact::findOrFail($id);
        $contact->delete();

        return redirect()->route('contact.index')->with('success', 'Contact deleted successfully.');
    }
}
