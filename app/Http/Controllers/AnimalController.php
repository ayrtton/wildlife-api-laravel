<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAnimalRequest;
use App\Http\Requests\UpdateAnimalRequest;
use App\Models\Animal;
use App\Models\AnimalClass;
use Illuminate\Http\Request;

class AnimalController extends Controller
{
    public function index() {
        $animals = Animal::latest()->paginate(10);

        return view('animals.index', compact('animals'));
    }

    public function create() {
        $animalClasses = AnimalClass::all();

        return view('animals.create', compact('animalClasses'));
    }

    public function store(StoreAnimalRequest $request) {
        Animal::create($request->validated());

        return redirect()->route('animals.index')->with('success', 'Animal inserted successfully.');
    }

    public function edit(Animal $animal) {
        $animalClasses = AnimalClass::all();

        return view('animals.edit', compact('animal', 'animalClasses'));
    }

    public function update(UpdateAnimalRequest $request, Animal $animal) {
        $animal->update($request->validated());

        return redirect()->route('animals.index')->with('success', 'Animal updated successfully.');
    }

    public function destroy(Animal $animal) {
        $animal->delete();

        return redirect()->route('animals.index')->with('success', 'Animal deleted successfully.');
    }
}
