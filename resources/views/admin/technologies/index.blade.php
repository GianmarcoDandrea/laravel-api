@extends('layouts.admin')

@section('content')
    <div class="container mt-5" >

        <div class="w-100 d-flex justify-content-between gap-5" >
            <div class="list-type-section w-50">
                <h2 class="mb-5">List of Technologies </h2>
                @if (count($technologies) > 0)
                    <table class="table table-striped mt-5 w-100">
                        <thead>
                            <tr>
                                <th scope="col" class="type-name-column fs-5">Name</th>
                                <th scope="col" class="type-action-column fs-5">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="w-100">
                            @foreach ($technologies as $technology)
                                <tr>
                                    <td scope="row" class="fw-bold">{{ $technology->name }}</td>
                                    <td>
                                        <a class="btn btn-success" href="{{ route('admin.technologies.show', ['technology' => $technology->slug]) }}">
                                            Details
                                        </a>

                                        <form action="{{ route('admin.technologies.destroy', ['technology' => $technology->slug]) }}" class="d-inline-block" method="POST">

                                            @csrf
                                            @method('DELETE')

                                            <button class="btn btn-danger btn-delete" type="submit"
                                                data-title="{{ $technology->name }}">
                                                Delete
                                            </button>

                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <div class="alert alert-warning w-50 mx-auto text-center">
                        There's nothing here yet. Add your first project technology.
                    </div>
                @endif
            </div>

            {{-- CREATE FORM FOR TYPE --}}
            <div class="add-type-section w-50">
                <h2 class="mb-5">Add a New Technology </h2>

                <form class="d-flex flex-column" action="{{ route('admin.technologies.store') }}" method="POST">
                    @csrf

                    <div class="mb-3 has-validation align-self-end" style="width: 90%">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}">
                        
                        @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <button class="btn btn-success align-self-end" type="submit" style="width: fit-content">Save</button>
                </form>

            </div>

        </div>
    </div>

    @include('partials.delete-modal')
@endsection
