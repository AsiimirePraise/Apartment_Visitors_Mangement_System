<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VisitorController extends Controller
{
    public function index()
    {
        return view('visitors.index', [
            'activePage' => 'visitors',
            'title' => 'Visitor Management'
        ]);
    }

    // Add other resource methods (create, store, show, edit, update, destroy) as needed
}
