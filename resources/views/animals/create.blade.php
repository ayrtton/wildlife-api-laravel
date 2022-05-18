<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Add Animal
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="py-12">
                    <div class="container">
                        <form action="{{ route('animals.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div>
                                <label for="title">Specie:</label>
                                <input type="text" name="specie" class="form-control" id="specie"
                                    aria-describedby="specie" value="{{ old('specie') }}" />
                                @error('specie')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mt-4">
                                <label for="scientific_name">Scientific name:</label>
                                <input type="text" name="scientific_name" class="form-control" id="scientific_name"
                                    aria-describedby="scientific_name" value="{{ old('scientific_name') }}" />
                                @error('scientific_name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mt-4">
                                <label for="image_url">Image URL:</label>
                                <input type="url" name="image_url" class="form-control" id="image_url"
                                    aria-describedby="image_url" value="{{ old('image_url') }}" />
                                @error('image_url')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mt-4">
                                <label for="description">Description:</label>
                                <textarea name="description" class="form-control" id="description" aria-describedby="description"
                                    rows="9">{{ old('description') }}</textarea>
                                @error('description')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mt-4">
                                <label for="animal_class">Class:</label>
                                <select name="animal_class_id" id="animal_class">
                                    <option selected disabled>Select option</option>
                                    @foreach ($animalClasses as $animalClass)
                                        <option value="{{ $animalClass->id }}">{{ $animalClass->title }}</option>
                                    @endforeach
                                </select>

                                @error('animal_class_id')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mt-4">
                                <label for="references">References:</label>
                                <textarea name="references" class="form-control" id="references" aria-describedby="references"
                                    rows="3">{{ old('references') }}</textarea>
                                @error('references')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="flex items-center justify-end mt-4">
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
