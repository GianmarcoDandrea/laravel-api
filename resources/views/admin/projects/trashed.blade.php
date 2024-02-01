@extends('layouts.admin')

@section('content')
    <div class="container mt-5">
        <h2>List of Deleted Projects</h2>

        @if (Session::has('message'))
            <div class="alert alert-success w-50 mx-auto">
                {{ Session::get('message') }}
            </div>
        @endif

    </div>


        @if (empty($projects))
        <div class="alert alert-warning w-50 mx-auto mt-5">
            There's no deleted project
        </div>
        
        @else
        <table class="table table-striped mt-5 w-100">
            <thead>
                <tr>
                    <th scope="col" class="title-column">Title</th>
                    <th scope="col" class="description-column">Description</th>
                    <th scope="col" class="action-column">Actions</th>
                </tr>
            </thead>
            <tbody class="w-100">
                @foreach ($projects as $project)
                    <tr>
                        <td scope="row">{{ $project->title }}</td>
                        <td>{{ $project->description }}</td>
                        <td>
                            <a class="btn btn-success"
                                href="{{ route('admin.restore', ['project' => $project->slug]) }}">
                                Restore
                            </a>

                            <form action="{{ route('admin.delete', ['project' => $project->slug]) }}"
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
        @endif
    </div>

    @include('partials.delete-modal')
@endsection
