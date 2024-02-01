@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 mt-4">
                <div class="card text-bg-secondary mb-3">
                    <div class="card-header">
                        {{ __('Dashboard') }}
                    </div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <h2 class="text-center">Hello {{ $user->name }}! Welcome to your personal project portfolio</h2>
                        <h3 class="mt-5">Here's your details:</h3>

                        <ul class="list-group list-group-flush">
                            <li class="list-group-item text-bg-secondary mb-3">
                                <span class="fw-bold ">Skills: </span> 
                                @if (count($user->skills) > 0)

                                @foreach ( $user->skills as $skill)
                                <span class="badge bg-dark text-light fs-6" > {{ $skill->name }} </span>
                                @endforeach
                                    
                                @else

                                <span class="fs-6" > No skill available </span>

                                @endif
                                
                           </li>

                            <li class="list-group-item text-bg-secondary mb-3">
                                <span class="fw-bold ">Email: </span>{{ $user->email }}
                           </li>
                
                            <li class="list-group-item text-bg-secondary mb-3">
                                <span class="fw-bold ">Address: 
                                </span>{{ $user->userDetail ? $user->userDetail->address : 'No address available' }}
                            </li>
                 
                            <li class="list-group-item text-bg-secondary mb-3 ">
                                <span class="fw-bold">Phone Number: </span> {{ $user->userDetail ? $user->userDetail->phone : 'No phone available' }}
                            </li>

                            <li class="list-group-item text-bg-secondary mb-3 ">
                                <span class="fw-bold">Date Of Birth: </span> {{ $user->userDetail ? date('d-m-Y', strtotime(user->userDetail->date_of_birth)) : 'No date available' }}
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection