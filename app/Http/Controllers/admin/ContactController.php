<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\ContactUs;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function index()
    {
        $items = ContactUs::latest()->paginate(20);
        return view('admin.contact.index', compact('items'));
    }

    public function destroy($id)
    {
        $item = ContactUs::findOrFail($id);
        $item->delete();
        return redirect()->route('admin.contact.index');
    }
}
