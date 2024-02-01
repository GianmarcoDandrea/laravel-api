@extends('layouts.admin')

@section('content')
    <div class="container w-50 mt-3 mb-5">
        <h2 class="text-center">Edit Your Project</h2>


        <form class="mt-5" action="{{ route('admin.projects.update', ['project' => $project->slug]) }}" method="POST"
            enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-4 has-validation">
                <label for="title" class="form-label fw-bold">Title</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title"
                    value="{{ old('title', $project->title) }}">

                @error('title')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3 has-validation">
                <label class="description-box form-label fw-bold" for="description" >Description</label>
                <textarea class="form-control @error('description') is-invalid @enderror" id="description" rows="3"
                    name="description">{{ old('description', $project->description) }}</textarea>

                @error('description')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3 has-validation">
                <label for="type" class="fw-bold">Select type of your project:</label>
                <select class="form-select @error('type') is-invalid @enderror" name="type_id" id="type">
                    <option @selected(!old('type_id', $project->type_id)) value="">No type</option>
                    @foreach ($types as $type)
                        <option @selected(old('type_id', $project->type_id) == $type->id) value="{{ $type->id }}">{{ $type->name }}</option>
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
                        <input @checked($errors->any() ? in_array($technologies->id, old('roles', [])) : $project->technologies->contains($technology))
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

            <div class="mb-3">
                <label for="cover_image" class="fw-bold">Image</label>
                <input type="file" class="form-control" id="cover_image" name="cover_image">
            </div>

            <div class="mb-2 mx-auto w-100">
                <img id="preview-img" src="{{ asset('storage/' . $project->cover_image) }}" alt="">
            </div>

            <button class="btn btn-success" type="submit">Save</button>

        </form>
    </div>
@endsection

@section('scripts')
    @vite(['resources/js/image-preview.js'])
@endsection
