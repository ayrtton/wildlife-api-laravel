<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Animals
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
                                        <button type="button" class="btn-close" data-bs-dismiss="alert"
                                            aria-label="Close"></button>
                                    </div>
                                @elseif (session('error'))
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        <strong>{{ session('error') }}</strong>
                                        <button type="button" class="btn-close" data-bs-dismiss="alert"
                                            aria-label="Close"></button>
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
                                        @foreach ($animals as $animal)
                                            <tr>
                                                <th valign="middle" scope="row">
                                                    {{ $animals->firstItem() + $loop->index }}</th>
                                                <td valign="middle">{{ $animal->title }}</td>
                                                <td valign="middle">
                                                    @if ($animal->created_at == null)
                                                        <span class="text-danger">Not defined</span>
                                                    @else
                                                        {{ Carbon\Carbon::parse($animal->created_at)->diffForHumans() }}
                                                    @endif
                                                </td>
                                                <td valign="middle">
                                                    <div class="flex items-center justify-end">
                                                        <a href="{{ route('animals.edit', $animal->id) }}"" class="
                                                            btn btn-info">Editar</a> &ensp;
                                                        <form class="inline-block"
                                                            action="{{ route('animals.destroy', $animal->id) }}"
                                                            method="POST"
                                                            onsubmit="return confirm('Are you sure you want to delete this animal?');">
                                                            <input type="hidden" name="_method" value="DELETE">
                                                            <input type="hidden" name="_token"
                                                                value="{{ csrf_token() }}">
                                                            <input type="submit" class="btn btn-danger" value="Apagar">
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
