@extends('layouts.app')

@section('title')
    {{ __('Home') }}
@endsection

@section('description')
    {{ __('Home page a ministry with stand.') }}
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">

                <div class="card border-0 shadow">

                    @guest

                        <div class="card-header d-flex flex-row justify-content-between border-0">
                            <h4>{{ $dt->format('l, d F Y') }}</h4>
                        </div>

                    @else

                        @if (Auth::user()->isAdmin() || Auth::user()->isUser())

                            <div class="card-header d-flex flex-row justify-content-between border-0">
                                <h4>{{ $dt->format('d F Y') }}</h4>

                                <div class="btn-group" role="group" aria-label="Navigation by weeks">
                                    <a class="btn btn-outline-secondary"
                                       href="{{ url('/?date=' . $startOfWeek->subDay()->toDateString()) }}"
                                       role="button">
                                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-caret-left-fill"
                                             fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M3.86 8.753l5.482 4.796c.646.566 1.658.106 1.658-.753V3.204a1 1 0 0 0-1.659-.753l-5.48 4.796a1 1 0 0 0 0 1.506z"/>
                                        </svg>
                                    </a>
                                    <a class="btn btn-outline-secondary"
                                       href="{{ url('/?date=' . $today->toDateString()) }}" role="button">
                                        <svg width="1em" height="1em" viewBox="0 0 16 16"
                                             class="bi bi-calendar-check-fill"
                                             fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd"
                                                  d="M4 .5a.5.5 0 0 0-1 0V1H2a2 2 0 0 0-2 2v1h16V3a2 2 0 0 0-2-2h-1V.5a.5.5 0 0 0-1 0V1H4V.5zM16 14V5H0v9a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2zm-5.146-5.146a.5.5 0 0 0-.708-.708L7.5 10.793 6.354 9.646a.5.5 0 1 0-.708.708l1.5 1.5a.5.5 0 0 0 .708 0l3-3z"/>
                                        </svg>
                                    </a>
                                    <a type="button" class="btn btn-outline-secondary"
                                       href="{{ url('/?date=' . $endOfWeek->addDay()->toDateString()) }}" role="button">
                                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-caret-right-fill"
                                             fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M12.14 8.753l-5.482 4.796c-.646.566-1.658.106-1.658-.753V3.204a1 1 0 0 1 1.659-.753l5.48 4.796a1 1 0 0 1 0 1.506z"/>
                                        </svg>
                                    </a>
                                </div>
                            </div>

                            <div class="card-header">

                                <ul class="nav nav-tabs card-header-tabs">

                                    @for($i = 1; $i <= 7; $i++)

                                        <li class="nav-item">
                                            <a class="nav-link text-dark{{ ($dt->dayOfWeek == $i || (7 == $i && 0 == $dt->dayOfWeek)) ? ' active' : '' }}"
                                               href="{{ url('/?date=' . $startOfWeek->addDay()->toDateString()) }}">{{ $startOfWeek->dayName }}</a>
                                        </li>

                                    @endfor

                                </ul>

                            </div>
                        @else

                            <div class="card-header d-flex flex-row justify-content-between border-0">
                                <h4>{{ $dt->format('l, d F Y') }}</h4>
                            </div>

                        @endif

                    @endguest

                    <div class="card-body">

                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        @for($i = 8; $i <= 20; $i++)

                            <div class="row py-2">

                                <div class="col-2 d-flex">
                                    <span class="m-auto">{{ $i >= 10 ? $i : '0' . $i }}:00</span>
                                </div>

                                <div class="col-5">
                                    <button class="btn btn-outline-secondary w-100" data-toggle="modal"
                                            data-target="#confirmation-modal">Sign up
                                    </button>
                                </div>

                                <div class="col-5">
                                    <button class="btn btn-success w-100" data-toggle="modal"
                                            data-target="#confirmation-modal">Andrew Petryk
                                    </button>
                                </div>

                            </div>

                        @endfor

                    </div>

                </div>

            </div>
        </div>

    </div>
    </div>
    </div>


    <!-- Modal -->
    <div class="modal border-0 fade" id="confirmation-modal" tabindex="-1" role="dialog"
         aria-labelledby="confirmationModalTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="confirmationModalLongTitle">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Monday 08:00 - 09:00
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-dark">Save changes</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
@endsection
