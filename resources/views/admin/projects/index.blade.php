@extends('layouts.admin')

@section('content')
    <div class="container mt-5">
        <h2>List of Projects</h2>

        <div class="text-end">
            <a class="btn btn-success" href="{{ route('admin.projects.create') }}">
                <i class="fa-regular fa-plus"></i>
            </a>
        </div>

        @if (Session::has('message'))
            <div class="alert alert-success w-50 mx-auto">
                {{ Session::get('message') }}
            </div>
        @endif


        @if (count($projects) > 0)
        <table class="table table-striped mt-5 w-100">
            <thead>
                <tr>
                    <th scope="col" class="title-column fs-5">Title</th>
                    <th scope="col" class="description-column fs-5">Description</th>
                    <th scope="col" class="action-column fs-5">Actions</th>
                </tr>
            </thead>
            <tbody class="w-100">
                @foreach ($projects as $project)
                    <tr>
                        <td scope="row">{{ $project->title }}</td>
                        <td>{{ $project->description }}</td>
                        <td>
                            <a class="btn btn-success"
                                href="{{ route('admin.projects.show', ['project' => $project->slug]) }}">
                                Details
                            </a>

                            <form action="{{ route('admin.projects.destroy', ['project' => $project->slug]) }}"
                                class="d-inline-block" method="POST">

                                @csrf
                                @method('DELETE')

                                <button class="btn btn-danger btn-delete" type="submit" data-title="{{ $project->title }}">
                                    Delete
                                </button>

                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
            
        @else
            <div class="alert alert-warning w-50 mx-auto">
                There's nothing here yet. Add your first project.
            </div>
        @endif
    </div>

    @include('partials.delete-modal')
@endsection

@section('scripts')
    @vite(['resources/js/image-preview.js'])
@endsection
