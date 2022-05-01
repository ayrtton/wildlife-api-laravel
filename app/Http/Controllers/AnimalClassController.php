<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAnimalClassRequest;
use App\Http\Requests\UpdateAnimalClassRequest;
use App\Models\AnimalClass;

class AnimalClassController extends Controller
{
    public function index() {
        $animalClasses = AnimalClass::latest()->paginate(10);

        return view('animal-classes.index', compact('animalClasses'));
    }

    public function store(StoreAnimalClassRequest $request) {
        AnimalClass::create($request->validated());

        return redirect()->back()->with('success', 'Animal class inserted successfully.');
    }

    public function edit(AnimalClass $animalClass) {
        return view('animal-classes.edit', compact('animalClass'));
    }

    public function update(UpdateAnimalClassRequest $request, AnimalClass $animalClass) {
        $animalClass->update($request->validated());

        return redirect()->route('animal-classes.index')->with('success', 'Animal class updated successfully.');
    }

    public function destroy(AnimalClass $animalClass) {
        $animalClass->delete();

        return redirect()->back()->with('success', 'Animal class deleted successfully.');
    }
}
