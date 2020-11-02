@extends('layouts.app')

@section('title')
    {{ __('Admin Panel') }}
@endsection

@section('description')
    {{ __('Admin panel page a ministry with stand.') }}
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4 col-lg-3">
                <div class="card mb-4 border-0 shadow">
                    <div class="card-header border-0">
                        <h5 class="m-0">{{ __('Admin menu') }}</h5>
                    </div>

                    <div class="card-body">

                        <ul class="nav flex-column">
                            <li class="nav-item mb-2">
                                <a class="text-dark" href="{{ route('admin.dashboard.index') }}">Dashboard</a>
                            </li>
                            <li class="nav-item mb-2">
                                <a class="text-dark" href="{{ route('user.stand.index') }}">Schedule</a>
                            </li>
                            <li class="nav-item mb-2">
                                <a class="text-dark" href="#">Link</a>
                            </li>
                            <li class="nav-item">
                                <a class="text-dark" href="#">Disabled</a>
                            </li>
                        </ul>

                    </div>
                </div>

                <div class="card mb-md-0 mb-5 border-0 shadow">
                    <div class="card-header border-0">
                        <h5 class="m-0">{{ __('User menu') }}</h5>
                    </div>

                    <div class="card-body">

                        <ul class="nav flex-column">
                            <li class="nav-item mb-2">
                                <a class="text-dark" href="{{ route('user.stand.index') }}">Schedule</a>
                            </li>
                        </ul>

                    </div>
                </div>
            </div>

            <div class="col-md-8 col-lg-9">
                <div class="card border-0 shadow">
                    <div class="card-header border-0">
                        <h5 class="m-0">{{ __('Users') }}</h5>
                    </div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <table class="table table-borderless table-striped">
                            <thead>
                            <tr>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Role</th>
                                <th scope="col" class="text-center">
                                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-pen-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M13.498.795l.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001z"/>
                                    </svg>
                                </th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($users as $user)

                                <tr>
                                    <td><a href="#" class="text-dark">{{ $user->name }}</a></td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->role->name }}</td>
                                    <td class="text-center"><a href="#" class="btn btn-sm btn-dark">Edit</a></td>
                                </tr>

                            @endforeach

                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
