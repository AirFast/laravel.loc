@extends('layouts.app')

@section('title'){{ __('adminpanel.menu.users') }}@endsection

@section('description'){{ __('Admin panel page a ministry with stand.') }}@endsection

@section('content')

    <div class="container">
        <div class="row justify-content-center">

            @include('admin.nav')

            <div class="col-md-8 col-lg-9">

                <div class="card border-0 shadow">
                    <div class="card-header border-0">

                        <div class="d-flex flex-row justify-content-between">
                            <h5 class="m-0 align-self-center">{{ __('Території') }}</h5>

                            <a href="{{ route( 'admin.territories.create', app()->getLocale() ) }}" class="btn btn-dark">
                                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-plus" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                                </svg>
                            </a>
                        </div>

                        <div class="text-center mt-3 mb-2">
                            <a href="{{ route( 'admin.territories.index', app()->getLocale() ) }}" class="btn btn-sm btn-secondary">Всі</a>
                            <a href="{{ route( 'admin.territories.index', [app()->getLocale(), 'status' => 1] ) }}" class="btn btn-sm btn-secondary">Опрацьовується</a>
                            <a href="{{ route( 'admin.territories.index', [app()->getLocale(), 'status' => 2] ) }}" class="btn btn-sm btn-secondary">Вільна</a>
                            <a href="{{ route( 'admin.territories.index', [app()->getLocale(), 'status' => 3] ) }}" class="btn btn-sm btn-secondary">Очікує</a>
                        </div>

                    </div>

                    <div class="card-body">

                        @if (session('create'))
                            <div class="alert alert-success text-center" role="alert">
                                {{ session('create') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif

                        @if (session('delete'))
                            <div class="alert alert-danger text-center" role="alert">
                                {{ session('delete') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif

                        <table class="table table-borderless table-striped">
                            <thead>
                            <tr>
                                <th scope="col">№</th>
                                <th scope="col">{{ __('Адреса') }}</th>
                                <th scope="col">{{ __('Статус') }}</th>
                                <th scope="col"></th>
                            </tr>
                            </thead>
                            <tbody>

                            @forelse($territories as $territory)

                                <tr>
                                    <td>{{ $territory->number }}</td>
                                    <td>
                                        <a href="{{ route( 'admin.territories.show', [app()->getLocale(), $territory] ) }}"
                                           class="text-dark">{{ $territory->name }}</a>
                                    </td>
                                    <td>{{ $territory->status }}</td>
                                    <td class="text-right">
                                        <a href="#" class="btn btn-sm btn-dark">
                                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-pen-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" d="M13.498.795l.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001z"/>
                                            </svg>
                                        </a>
                                        <button class="btn btn-sm btn-danger" data-delete-url="#" data-user="#" data-toggle="modal" data-target="#delete-modal" role="button">
                                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-trash-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5a.5.5 0 0 0-1 0v7a.5.5 0 0 0 1 0v-7z"/>
                                            </svg>
                                        </button>
                                    </td>
                                </tr>

                            @empty

                                <p>Ще не існує територій</p>

                            @endforelse

                            </tbody>
                        </table>

                    </div>

                    {{ $territories->links() }}

                </div>

            </div>

        </div>
    </div>

    {{--    <div class="modal border-0 fade" id="delete-modal" tabindex="-1" role="dialog"--}}
    {{--         aria-labelledby="deleteModalTitle" aria-hidden="true">--}}
    {{--        <div class="modal-dialog modal-dialog-centered" role="document">--}}
    {{--            <div class="modal-content">--}}
    {{--                <div class="modal-header">--}}
    {{--                    <h5 class="modal-title">{{ Auth::user()->name }}</h5>--}}
    {{--                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">--}}
    {{--                        <span aria-hidden="true">&times;</span>--}}
    {{--                    </button>--}}
    {{--                </div>--}}
    {{--                <div class="modal-body">--}}
    {{--                    <p>{{ __('adminpanel.user.popup.delete') }} <span id="user-name">#</span>?</p>--}}
    {{--                </div>--}}
    {{--                <div class="modal-footer">--}}

    {{--                    <button type="button" class="btn btn-outline-secondary" data-dismiss="modal"--}}
    {{--                            role="button">{{ __('adminpanel.user.popup.btn-no') }}</button>--}}

    {{--                    <form id="delete-form" method="POST" action="#">--}}

    {{--                        @method('DELETE')--}}
    {{--                        @csrf--}}

    {{--                        <button type="submit" class="btn btn-dark"--}}
    {{--                                role="button">{{ __('adminpanel.user.popup.btn-yes') }}</button>--}}

    {{--                    </form>--}}

    {{--                </div>--}}
    {{--            </div>--}}
    {{--        </div>--}}
    {{--    </div>--}}

@endsection
