@extends('layouts.admin')

@section('content')
    <div class="container mt-3 mb-5 w-50">
        <h2 class="text-center">Add New Project</h2>

        <form class="mt-5" action="{{ route('admin.projects.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-4 has-validation">
                <label for="title" class="form-label fw-bold">Title</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title"
                    value="{{ old('title') }}">

                @error('title')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-4 has-validation">
                <label class="description-box form-label fw-bold" for="description">Description</label>
                <textarea class="form-control @error('description') is-invalid @enderror" id="description" rows="3"
                    name="description">{{ old('description') }}</textarea>

                @error('description')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-4 has-validation">
                <label for="type" class="form-label fw-bold">Select type of your project:</label>
                <select class="form-select @error('type') is-invalid @enderror" name="type_id" id="type">
                    <option @selected(!old('type_id')) value="">No type</option>

                    @foreach ($types as $type)
                        <option value="{{ $type->id }}">{{ $type->name }}</option>
                    @endforeach

                </select>

                @error('type_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>


            <div class="mb-4 has-validation">
                <p class="form-label fw-bold">Select the technologies of your project:</p>

                @foreach ($technologies as $technology)
                    <div class="form-check">
                        <input @checked(in_array($technology->id, old('technologies', [])))
                            type="checkbox"
                            class="@error('technologies') is-invalid @enderror" 
                            id="technology-{{ $technology->id }}"
                            value="{{ $technology->id }}" 
                            name="technologies[]">

                        <label for="technology-{{ $technology->id }}"> {{ $technology->name }} </label>
                    </div>
                @endforeach


                @error('technologies')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>


            <div class="mb-4">
                <label for="cover_image" class="form-label fw-bold">Image</label>
                <input type="file" class="form-control @error('cover_image') is-invalid @enderror" id="cover_image" name="cover_image">

                @error('cover_image')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <img id="preview-img" src="" alt="" style="max-height: 250px">
            </div>

            <button class="btn btn-success" type="submit">Save</button>

        </form>
    </div>
@endsection

@section('scripts')
    @vite(['resources/js/image-preview.js'])
@endsection
