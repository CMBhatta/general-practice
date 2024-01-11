<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class Test1Controller extends Controller
{
    public function index()
    {
        $contacts = Contact::where([
            'contact' => 9863084441,
     ])->get();
        return view('test1.index', compact('contacts'));
    }

    public function create(){
        return view('test1.create');
        
    }

    public function store(Request $request):RedirectResponse
    {
        // dd($request);
     $validated = $request->validate([
        'name' => 'required',
        'contact' =>'required|regex:/[0-9]{10}/', 
        'email' => 'required',
     ]);
    //  dd($validated);
     Contact::create($validated);
     return redirect()->route('test1.create');
    }
}
