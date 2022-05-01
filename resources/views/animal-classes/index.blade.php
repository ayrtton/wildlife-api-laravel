<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Animal Classes
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="py-12">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-8">
                                @if (session('success'))
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        <strong>{{ session('success') }}</strong>
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                    @elseif (session('error'))
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        <strong>{{ session('error') }}</strong>
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                @endif

                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col"></th>
                                            <th scope="col">Title</th>
                                            <th scope="col">Created at</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($animalClasses as $animalClass)
                                            <tr>
                                                <th valign="middle" scope="row">{{ $animalClasses->firstItem() + $loop->index }}</th>
                                                <td valign="middle">{{ $animalClass->title }}</td>
                                                <td valign="middle">
                                                    @if ($animalClass->created_at == null)
                                                        <span class="text-danger">Not defined</span>
                                                    @else
                                                        {{ Carbon\Carbon::parse($animalClass->created_at)->diffForHumans() }}
                                                    @endif
                                                </td>
                                                <td valign="middle">
                                                    <div class="flex items-center justify-end">
                                                        <a href="{{ route('animal-classes.edit', $animalClass->id) }}"" class="btn btn-info">Editar</a> &ensp;
                                                        <form class="inline-block" action="{{ route('animal-classes.destroy', $animalClass->id) }}" 
                                                            method="POST" onsubmit="return confirm('Are you sure you want to delete this animal class?');">
                                                            <input type="hidden" name="_method" value="DELETE">
                                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                            <input type="submit" class="btn btn-danger" value="Apagar">
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>

                            <div class="col-md-4">
                                <div class="card">
                                    <div class="card-header">Add Animal Class</div>
                                    <div class="card-body">
                                        <form action="{{ route('animal-classes.store') }}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <div class="mb-3">
                                                <label for="title">Title</label>
                                                <input type="text" name="title" class="form-control" id="title" aria-describedby="title">

                                                @error('title')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <button type="submit" class="btn btn-primary">Save</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>