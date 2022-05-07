<?php

namespace App\Http\Controllers;

use App\Models\Animal;
use Illuminate\Http\Request;

class AnimalController extends Controller
{
    public function index() {
        $animals = Animal::latest()->paginate(10);

        return view('animals.index', compact('animals'));
    }
}
