<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class Test1Controller extends Controller
{
    public function index(): View
    {
        // $contacts = Contact::cursor()->filter(function (Contact $contact) {
        //     return $contact->id > 2;
        // });
        $contacts = Contact::where('id', '>', 3)->cursorPaginate(5);
        // $contacts = DB::table('contacts')->simplePaginate(8);
        // dd($contacts);
        return view('test1.index', compact('contacts'));
        // return view('test1.index', ['contacts' => $contacts]);
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
     return redirect()->route('test1.index');
    }
}
