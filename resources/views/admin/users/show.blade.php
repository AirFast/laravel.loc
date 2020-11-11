@extends('layouts.app')

@section('title')
    {{ $user->name }}
@endsection

@section('description')
    {{ __('Admin panel page a ministry with stand.') }}
@endsection

@section('content')

    <div class="container">
        <div class="row justify-content-center">

            @include('admin.nav')

            <div class="col-md-8 col-lg-9">

                <div class="card border-0 shadow">

                    <div class="card-header d-flex flex-row justify-content-between border-0">
                        <h5 class="m-0 align-self-center">{{ $user->name }}</h5>
                        <a href="{{ route( 'admin.users.edit', [app()->getLocale(), $user->id] ) }}"
                           class="btn btn-dark">
                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-pen-fill" fill="currentColor"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                      d="M13.498.795l.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001z"/>
                            </svg>
                        </a>
                    </div>

                    <div class="card-body">

                        <div class="row">

                            <div class="col-lg-4 d-flex mb-4 mb-lg-0">

                                @if($user->img_src)
                                    <div class="user-avatar shadow m-auto">
                                        <img src="{{ asset( 'storage/' . $user->img_src ) }}" alt="{{ $user->name }}">
                                    </div>
                                @else
                                    <span class="m-auto text-secondary">
                                        <svg width="100" height="100" viewBox="0 0 16 16" class="bi bi-person-circle"
                                             fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                          <path
                                              d="M13.468 12.37C12.758 11.226 11.195 10 8 10s-4.757 1.225-5.468 2.37A6.987 6.987 0 0 0 8 15a6.987 6.987 0 0 0 5.468-2.63z"/>
                                          <path fill-rule="evenodd" d="M8 9a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                                          <path fill-rule="evenodd"
                                                d="M8 1a7 7 0 1 0 0 14A7 7 0 0 0 8 1zM0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8z"/>
                                        </svg>
                                    </span>
                                @endif

                            </div>

                            <div class="col-lg-8">

                                <p>
                                    <span class="pr-3 text-secondary">
                                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-person-fill"
                                             fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd"
                                                  d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                                        </svg>
                                    </span>
                                    {{ $user->name ? $user->name : 'N/A' }}
                                </p>
                                <p>
                                    <span class="pr-3 text-secondary">
                                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-envelope-fill"
                                             fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd"
                                                  d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414.05 3.555zM0 4.697v7.104l5.803-3.558L0 4.697zM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586l-1.239-.757zm3.436-.586L16 11.801V4.697l-5.803 3.546z"/>
                                        </svg>
                                    </span>
                                    @if($user->email)
                                        <a class="text-dark" href="mailto:{{ $user->email }}">{{ $user->email }}</a>
                                    @else
                                        N/A
                                    @endif
                                </p>
                                <p>
                                    <span class="pr-3 text-secondary">
                                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-house-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                          <path fill-rule="evenodd" d="M8 3.293l6 6V13.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5V9.293l6-6zm5-.793V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z"/>
                                          <path fill-rule="evenodd" d="M7.293 1.5a1 1 0 0 1 1.414 0l6.647 6.646a.5.5 0 0 1-.708.708L8 2.207 1.354 8.854a.5.5 0 1 1-.708-.708L7.293 1.5z"/>
                                        </svg>
                                    </span>
                                    {{ $user->address ? $user->address : 'N/A' }}
                                </p>
                                <p>
                                    <span class="pr-3 text-secondary">
                                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-telephone-fill"
                                             fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd"
                                                  d="M2.267.98a1.636 1.636 0 0 1 2.448.152l1.681 2.162c.309.396.418.913.296 1.4l-.513 2.053a.636.636 0 0 0 .167.604L8.65 9.654a.636.636 0 0 0 .604.167l2.052-.513a1.636 1.636 0 0 1 1.401.296l2.162 1.681c.777.604.849 1.753.153 2.448l-.97.97c-.693.693-1.73.998-2.697.658a17.47 17.47 0 0 1-6.571-4.144A17.47 17.47 0 0 1 .639 4.646c-.34-.967-.035-2.004.658-2.698l.97-.969z"/>
                                        </svg>
                                    </span>
                                    @if($user->phone)
                                        <a class="text-dark" href="tel:{{ $user->phone }}">{{ $user->phone }}</a>
                                    @else
                                        N/A
                                    @endif
                                </p>
                                <p>
                                    <span class="pr-3 text-secondary">
                                        <svg width="1em" height="1em" viewBox="0 0 16 16"
                                             class="bi bi-person-check-fill" fill="currentColor"
                                             xmlns="http://www.w3.org/2000/svg">
                                          <path fill-rule="evenodd"
                                                d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm9.854-2.854a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 0 1 .708-.708L12.5 7.793l2.646-2.647a.5.5 0 0 1 .708 0z"/>
                                        </svg>
                                    </span>
                                    {{ $user->role->name ? Str::ucfirst( $user->role->name ) : 'N/A' }}
                                </p>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>
    </div>

@endsection
