<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateContactRequest;
use App\Http\Requests\updateContactRequest;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $sortBy = $request->input('sortBy');
        $search = $request->input('search');

        if($sortBy){
            $contacts = Contact::orderBy($sortBy)->get();
        }elseif($search){
            $contacts = Contact::where(function($query) use($search){
                $query->where('name', 'like', '%' . $search . '%');
                $query->orWhere('email', 'like', '%' . $search . '%');
            })->get();
        }else{
            $contacts = Contact::all();
        }
        return view('contact.index', compact('contacts', 'sortBy', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('contact.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateContactRequest $request)
    {
        $requestData = $request->validated();
        Contact::create($requestData);
        return back()->with([
            'message' => 'Contact created successfully'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $contact = Contact::findOrFail($id);
        return view('contact.show', compact('contact'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $contact = Contact::findOrFail($id);
        return view('contact.edit', compact('contact'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(updateContactRequest $request, Contact $contact)
    {
        $updateData = $request->validated();

        $contact->update($updateData);

        return redirect()->route('contacts.index')->with([
            'message' => 'Contact updated successfully'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Contact $contact)
    {
        $contact->delete();
        return back()->with([
            'message' => 'Contact deleted successfully'
        ]);
    }
}
