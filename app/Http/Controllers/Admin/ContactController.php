<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $contacts = Contact::latest()->paginate(10);
        return view('admin.contacts.index', compact('contacts'));
    }

    public function show(Contact $contact)
    {
        return view('admin.contacts.show', compact('contact'));
    }

    public function update(Request $request, Contact $contact)
    {
        $request->validate([
            'status' => 'required|in:pending,read,replied',
        ]);

        $contact->update(['status' => $request->status]);

        return redirect()->route('admin.contacts.index')->with('success', 'Holati muvaffaqiyatli yangilandi.');
    }

    public function destroy(Contact $contact)
    {
        $contact->delete();
        return redirect()->route('admin.contacts.index')->with('success', 'Xabar muvaffaqiyatli o‘chirildi.');
    }
}