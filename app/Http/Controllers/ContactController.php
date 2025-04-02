<?php

namespace App\Http\Controllers;

use App\Models\ContactUs;
use App\Models\Footer;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $data=Footer::first();

        return view('front.contact.index',
        [
            'email'=>$data->email,
            'phone'=>$data->phone,
            'facebook'=>'',
            'instagram'=>'',
            'youtube'=>'',
            'description'=>'',
            'address'=>$data->address
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'nullable|email',
            'phone' => 'required|numeric',
            'massage' => 'required|min:10',
        ]);

        $create = ContactUs::create($data);

        return redirect()->route('contact');
    }
}
