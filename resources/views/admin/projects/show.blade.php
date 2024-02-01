@extends('layouts.admin')

@section('content')
    <div class="container mt-3 mb-5">
        <h2 class="fs-1 mb-3">{{ $project->title }}</h2>

        @if ($project->cover_image)
            <div>
                <img src="{{ asset('storage/' . $project->cover_image) }}" alt="">
            </div>
        @else
            <div>
                <img src="{{ Vite::asset('resources/images/image_not_available.jpg') }}" alt="">
            </div>
        @endif

        <hr>

        <ul>
            <li class="mt-5 fs-5">
                <span class="fw-bold ">Technologies:
                </span>
                @foreach ( $project->technologies as $technology)
                <span class="badge bg-light text-dark fs-5" > {{ $technology->name }} </span>
           
                @endforeach
           </li>

            <li class="mt-2 fs-5">
                <span class="fw-bold ">Type:
                </span>{{ $project->type ? $project->type->name : 'No category for this project' }}
            </li>

            <li class="mt-2 fs-5">
                <span class="fw-bold ">Description: </span> {{ $project->description }}
            </li>

            <li class="mt-2 fs-5">
                <span class="fw-bold">Added: </span> {{ date('d-m-Y', strtotime($project->created_at)) }}
            </li>
        </ul>


        <a href="{{ route('admin.projects.edit', ['project' => $project->slug]) }}" class="btn btn-warning">Edit You
            Project
        </a>

        <form action="{{ route('admin.projects.destroy', ['project' => $project->slug]) }}" class="d-inline-block"
            method="POST">

            @csrf
            @method('DELETE')

            <button class="btn btn-danger btn-delete" type="submit" data-title="{{ $project->title }}">
                Delete
            </button>

        </form>
    </div>

    @include('partials.delete-modal')
@endsection

@section('scripts')
    @vite(['resources/js/image-preview.js'])
@endsection
