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

                    <div class="card-header d-flex flex-row justify-content-between border-0">
                        <h4>{{ __('November') }} 2020</h4>

                        <div class="btn-group" role="group" aria-label="Navigation by weeks">
                            <button type="button" class="btn btn-outline-secondary">
                                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-caret-left-fill"
                                     fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M3.86 8.753l5.482 4.796c.646.566 1.658.106 1.658-.753V3.204a1 1 0 0 0-1.659-.753l-5.48 4.796a1 1 0 0 0 0 1.506z"/>
                                </svg>
                            </button>
                            <button type="button" class="btn btn-outline-secondary">
                                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-calendar-check-fill"
                                     fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                          d="M4 .5a.5.5 0 0 0-1 0V1H2a2 2 0 0 0-2 2v1h16V3a2 2 0 0 0-2-2h-1V.5a.5.5 0 0 0-1 0V1H4V.5zM16 14V5H0v9a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2zm-5.146-5.146a.5.5 0 0 0-.708-.708L7.5 10.793 6.354 9.646a.5.5 0 1 0-.708.708l1.5 1.5a.5.5 0 0 0 .708 0l3-3z"/>
                                </svg>
                            </button>
                            <button type="button" class="btn btn-outline-secondary">
                                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-caret-right-fill"
                                     fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M12.14 8.753l-5.482 4.796c-.646.566-1.658.106-1.658-.753V3.204a1 1 0 0 1 1.659-.753l5.48 4.796a1 1 0 0 1 0 1.506z"/>
                                </svg>
                            </button>
                        </div>
                    </div>

                    <div class="card-header">

                        <ul class="nav nav-tabs card-header-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link text-dark active" data-toggle="tab" href="#monday" role="tab" aria-controls="monday" aria-selected="true">Monday</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-dark" data-toggle="tab" href="#tuesday" role="tab" aria-controls="tuesday" aria-selected="false">Tuesday</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-dark" data-toggle="tab" href="#wednesday" role="tab" aria-controls="wednesday" aria-selected="false">Wednesday</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-dark" data-toggle="tab" href="#thursday" role="tab" aria-controls="thursday" aria-selected="false">Thursday</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-dark" data-toggle="tab" href="#friday" role="tab" aria-controls="friday" aria-selected="false">Friday</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-dark" data-toggle="tab" href="#saturday" role="tab" aria-controls="saturday" aria-selected="false">Saturday</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-dark" data-toggle="tab" href="#sunday" role="tab" aria-controls="sunday" aria-selected="false">Sunday</a>
                            </li>
                        </ul>

                    </div>

                    <div class="card-body">

                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <div class="tab-content">

                            <div class="tab-pane fade show active" id="monday" role="tabpanel" aria-labelledby="monday-tab">

                                <div class="row py-2">

                                    <div class="col-4 col-lg-2">
                                        <span class="font-weight-bold">08:00 - 09:00</span>
                                    </div>

                                    <div class="col-4 col-lg-5">
                                        <button class="btn btn-outline-secondary w-100" data-toggle="modal" data-target="#confirmation-modal">Sign up</button>
                                    </div>

                                    <div class="col-4 col-lg-5">
                                        <button class="btn btn-success w-100" data-toggle="modal" data-target="#confirmation-modal">Andrew Petryk</button>
                                    </div>

                                </div>

                                <div class="row py-2">

                                    <div class="col-4 col-lg-2">
                                        <span class="font-weight-bold">09:00 - 10:00</span>
                                    </div>

                                    <div class="col-4 col-lg-5">
                                        <button class="btn btn-outline-secondary w-100">Sign up</button>
                                    </div>

                                    <div class="col-4 col-lg-5">
                                        <button class="btn btn-outline-secondary w-100">Sign up</button>
                                    </div>

                                </div>

                                <div class="row py-2">

                                    <div class="col-4 col-lg-2">
                                        <span class="font-weight-bold">10:00 - 11:00</span>
                                    </div>

                                    <div class="col-4 col-lg-5">
                                        <button class="btn btn-outline-secondary w-100">Sign up</button>
                                    </div>

                                    <div class="col-4 col-lg-5">
                                        <button class="btn btn-outline-secondary w-100">Sign up</button>
                                    </div>

                                </div>

                                <div class="row py-2">

                                    <div class="col-4 col-lg-2">
                                        <span class="font-weight-bold">11:00 - 12:00</span>
                                    </div>

                                    <div class="col-4 col-lg-5">
                                        <button class="btn btn-outline-secondary w-100">Sign up</button>
                                    </div>

                                    <div class="col-4 col-lg-5">
                                        <button class="btn btn-outline-secondary w-100">Sign up</button>
                                    </div>

                                </div>

                                <div class="row py-2">

                                    <div class="col-4 col-lg-2">
                                        <span class="font-weight-bold">12:00 - 13:00</span>
                                    </div>

                                    <div class="col-4 col-lg-5">
                                        <button class="btn btn-outline-secondary w-100">Sign up</button>
                                    </div>

                                    <div class="col-4 col-lg-5">
                                        <button class="btn btn-outline-secondary w-100">Sign up</button>
                                    </div>

                                </div>

                                <div class="row py-2">

                                    <div class="col-4 col-lg-2">
                                        <span class="font-weight-bold">13:00 - 14:00</span>
                                    </div>

                                    <div class="col-4 col-lg-5">
                                        <button class="btn btn-outline-secondary w-100">Sign up</button>
                                    </div>

                                    <div class="col-4 col-lg-5">
                                        <button class="btn btn-outline-secondary w-100">Sign up</button>
                                    </div>

                                </div>

                                <div class="row py-2">

                                    <div class="col-4 col-lg-2">
                                        <span class="font-weight-bold">14:00 - 15:00</span>
                                    </div>

                                    <div class="col-4 col-lg-5">
                                        <button class="btn btn-outline-secondary w-100">Sign up</button>
                                    </div>

                                    <div class="col-4 col-lg-5">
                                        <button class="btn btn-outline-secondary w-100">Sign up</button>
                                    </div>

                                </div>

                                <div class="row py-2">

                                    <div class="col-4 col-lg-2">
                                        <span class="font-weight-bold">15:00 - 16:00</span>
                                    </div>

                                    <div class="col-4 col-lg-5">
                                        <button class="btn btn-outline-secondary w-100">Sign up</button>
                                    </div>

                                    <div class="col-4 col-lg-5">
                                        <button class="btn btn-outline-secondary w-100">Sign up</button>
                                    </div>

                                </div>

                                <div class="row py-2">

                                    <div class="col-4 col-lg-2">
                                        <span class="font-weight-bold">16:00 - 17:00</span>
                                    </div>

                                    <div class="col-4 col-lg-5">
                                        <button class="btn btn-outline-secondary w-100">Sign up</button>
                                    </div>

                                    <div class="col-4 col-lg-5">
                                        <button class="btn btn-outline-secondary w-100">Sign up</button>
                                    </div>

                                </div>

                                <div class="row py-2">

                                    <div class="col-4 col-lg-2">
                                        <span class="font-weight-bold">17:00 - 18:00</span>
                                    </div>

                                    <div class="col-4 col-lg-5">
                                        <button class="btn btn-outline-secondary w-100">Sign up</button>
                                    </div>

                                    <div class="col-4 col-lg-5">
                                        <button class="btn btn-outline-secondary w-100">Sign up</button>
                                    </div>

                                </div>

                                <div class="row py-2">

                                    <div class="col-4 col-lg-2">
                                        <span class="font-weight-bold">18:00 - 19:00</span>
                                    </div>

                                    <div class="col-4 col-lg-5">
                                        <button class="btn btn-outline-secondary w-100">Sign up</button>
                                    </div>

                                    <div class="col-4 col-lg-5">
                                        <button class="btn btn-outline-secondary w-100">Sign up</button>
                                    </div>

                                </div>

                            </div>

                            <div class="tab-pane fade" id="tuesday" role="tabpanel" aria-labelledby="tuesday-tab">

                                <div class="row py-2">

                                    <div class="col-4 col-lg-2">
                                        <span class="font-weight-bold">08:00 - 09:00</span>
                                    </div>

                                    <div class="col-4 col-lg-5">
                                        <button class="btn btn-outline-secondary w-100">Sign up</button>
                                    </div>

                                    <div class="col-4 col-lg-5">
                                        <button class="btn btn-outline-secondary w-100">Sign up</button>
                                    </div>

                                </div>

                                <div class="row py-2">

                                    <div class="col-4 col-lg-2">
                                        <span class="font-weight-bold">09:00 - 10:00</span>
                                    </div>

                                    <div class="col-4 col-lg-5">
                                        <button class="btn btn-outline-secondary w-100">Sign up</button>
                                    </div>

                                    <div class="col-4 col-lg-5">
                                        <button class="btn btn-outline-secondary w-100">Sign up</button>
                                    </div>

                                </div>

                                <div class="row py-2">

                                    <div class="col-4 col-lg-2">
                                        <span class="font-weight-bold">10:00 - 11:00</span>
                                    </div>

                                    <div class="col-4 col-lg-5">
                                        <button class="btn btn-outline-secondary w-100">Sign up</button>
                                    </div>

                                    <div class="col-4 col-lg-5">
                                        <button class="btn btn-outline-secondary w-100">Sign up</button>
                                    </div>

                                </div>

                                <div class="row py-2">

                                    <div class="col-4 col-lg-2">
                                        <span class="font-weight-bold">11:00 - 12:00</span>
                                    </div>

                                    <div class="col-4 col-lg-5">
                                        <button class="btn btn-outline-secondary w-100">Sign up</button>
                                    </div>

                                    <div class="col-4 col-lg-5">
                                        <button class="btn btn-outline-secondary w-100">Sign up</button>
                                    </div>

                                </div>

                                <div class="row py-2">

                                    <div class="col-4 col-lg-2">
                                        <span class="font-weight-bold">12:00 - 13:00</span>
                                    </div>

                                    <div class="col-4 col-lg-5">
                                        <button class="btn btn-outline-secondary w-100">Sign up</button>
                                    </div>

                                    <div class="col-4 col-lg-5">
                                        <button class="btn btn-outline-secondary w-100">Sign up</button>
                                    </div>

                                </div>

                                <div class="row py-2">

                                    <div class="col-4 col-lg-2">
                                        <span class="font-weight-bold">13:00 - 14:00</span>
                                    </div>

                                    <div class="col-4 col-lg-5">
                                        <button class="btn btn-outline-secondary w-100">Sign up</button>
                                    </div>

                                    <div class="col-4 col-lg-5">
                                        <button class="btn btn-outline-secondary w-100">Sign up</button>
                                    </div>

                                </div>

                                <div class="row py-2">

                                    <div class="col-4 col-lg-2">
                                        <span class="font-weight-bold">14:00 - 15:00</span>
                                    </div>

                                    <div class="col-4 col-lg-5">
                                        <button class="btn btn-outline-secondary w-100">Sign up</button>
                                    </div>

                                    <div class="col-4 col-lg-5">
                                        <button class="btn btn-outline-secondary w-100">Sign up</button>
                                    </div>

                                </div>

                                <div class="row py-2">

                                    <div class="col-4 col-lg-2">
                                        <span class="font-weight-bold">15:00 - 16:00</span>
                                    </div>

                                    <div class="col-4 col-lg-5">
                                        <button class="btn btn-outline-secondary w-100">Sign up</button>
                                    </div>

                                    <div class="col-4 col-lg-5">
                                        <button class="btn btn-outline-secondary w-100">Sign up</button>
                                    </div>

                                </div>

                                <div class="row py-2">

                                    <div class="col-4 col-lg-2">
                                        <span class="font-weight-bold">16:00 - 17:00</span>
                                    </div>

                                    <div class="col-4 col-lg-5">
                                        <button class="btn btn-outline-secondary w-100">Sign up</button>
                                    </div>

                                    <div class="col-4 col-lg-5">
                                        <button class="btn btn-outline-secondary w-100">Sign up</button>
                                    </div>

                                </div>

                                <div class="row py-2">

                                    <div class="col-4 col-lg-2">
                                        <span class="font-weight-bold">17:00 - 18:00</span>
                                    </div>

                                    <div class="col-4 col-lg-5">
                                        <button class="btn btn-outline-secondary w-100">Sign up</button>
                                    </div>

                                    <div class="col-4 col-lg-5">
                                        <button class="btn btn-outline-secondary w-100">Sign up</button>
                                    </div>

                                </div>

                                <div class="row py-2">

                                    <div class="col-4 col-lg-2">
                                        <span class="font-weight-bold">18:00 - 19:00</span>
                                    </div>

                                    <div class="col-4 col-lg-5">
                                        <button class="btn btn-outline-secondary w-100">Sign up</button>
                                    </div>

                                    <div class="col-4 col-lg-5">
                                        <button class="btn btn-outline-secondary w-100">Sign up</button>
                                    </div>

                                </div>

                            </div>

                            <div class="tab-pane fade" id="wednesday" role="tabpanel" aria-labelledby="wednesday-tab">

                                <div class="row py-2">

                                    <div class="col-4 col-lg-2">
                                        <span class="font-weight-bold">08:00 - 09:00</span>
                                    </div>

                                    <div class="col-4 col-lg-5">
                                        <button class="btn btn-outline-secondary w-100">Sign up</button>
                                    </div>

                                    <div class="col-4 col-lg-5">
                                        <button class="btn btn-outline-secondary w-100">Sign up</button>
                                    </div>

                                </div>

                                <div class="row py-2">

                                    <div class="col-4 col-lg-2">
                                        <span class="font-weight-bold">09:00 - 10:00</span>
                                    </div>

                                    <div class="col-4 col-lg-5">
                                        <button class="btn btn-outline-secondary w-100">Sign up</button>
                                    </div>

                                    <div class="col-4 col-lg-5">
                                        <button class="btn btn-outline-secondary w-100">Sign up</button>
                                    </div>

                                </div>

                                <div class="row py-2">

                                    <div class="col-4 col-lg-2">
                                        <span class="font-weight-bold">10:00 - 11:00</span>
                                    </div>

                                    <div class="col-4 col-lg-5">
                                        <button class="btn btn-outline-secondary w-100">Sign up</button>
                                    </div>

                                    <div class="col-4 col-lg-5">
                                        <button class="btn btn-outline-secondary w-100">Sign up</button>
                                    </div>

                                </div>

                                <div class="row py-2">

                                    <div class="col-4 col-lg-2">
                                        <span class="font-weight-bold">11:00 - 12:00</span>
                                    </div>

                                    <div class="col-4 col-lg-5">
                                        <button class="btn btn-outline-secondary w-100">Sign up</button>
                                    </div>

                                    <div class="col-4 col-lg-5">
                                        <button class="btn btn-outline-secondary w-100">Sign up</button>
                                    </div>

                                </div>

                                <div class="row py-2">

                                    <div class="col-4 col-lg-2">
                                        <span class="font-weight-bold">12:00 - 13:00</span>
                                    </div>

                                    <div class="col-4 col-lg-5">
                                        <button class="btn btn-outline-secondary w-100">Sign up</button>
                                    </div>

                                    <div class="col-4 col-lg-5">
                                        <button class="btn btn-outline-secondary w-100">Sign up</button>
                                    </div>

                                </div>

                                <div class="row py-2">

                                    <div class="col-4 col-lg-2">
                                        <span class="font-weight-bold">13:00 - 14:00</span>
                                    </div>

                                    <div class="col-4 col-lg-5">
                                        <button class="btn btn-outline-secondary w-100">Sign up</button>
                                    </div>

                                    <div class="col-4 col-lg-5">
                                        <button class="btn btn-outline-secondary w-100">Sign up</button>
                                    </div>

                                </div>

                                <div class="row py-2">

                                    <div class="col-4 col-lg-2">
                                        <span class="font-weight-bold">14:00 - 15:00</span>
                                    </div>

                                    <div class="col-4 col-lg-5">
                                        <button class="btn btn-outline-secondary w-100">Sign up</button>
                                    </div>

                                    <div class="col-4 col-lg-5">
                                        <button class="btn btn-outline-secondary w-100">Sign up</button>
                                    </div>

                                </div>

                                <div class="row py-2">

                                    <div class="col-4 col-lg-2">
                                        <span class="font-weight-bold">15:00 - 16:00</span>
                                    </div>

                                    <div class="col-4 col-lg-5">
                                        <button class="btn btn-outline-secondary w-100">Sign up</button>
                                    </div>

                                    <div class="col-4 col-lg-5">
                                        <button class="btn btn-outline-secondary w-100">Sign up</button>
                                    </div>

                                </div>

                                <div class="row py-2">

                                    <div class="col-4 col-lg-2">
                                        <span class="font-weight-bold">16:00 - 17:00</span>
                                    </div>

                                    <div class="col-4 col-lg-5">
                                        <button class="btn btn-outline-secondary w-100">Sign up</button>
                                    </div>

                                    <div class="col-4 col-lg-5">
                                        <button class="btn btn-outline-secondary w-100">Sign up</button>
                                    </div>

                                </div>

                                <div class="row py-2">

                                    <div class="col-4 col-lg-2">
                                        <span class="font-weight-bold">17:00 - 18:00</span>
                                    </div>

                                    <div class="col-4 col-lg-5">
                                        <button class="btn btn-outline-secondary w-100">Sign up</button>
                                    </div>

                                    <div class="col-4 col-lg-5">
                                        <button class="btn btn-outline-secondary w-100">Sign up</button>
                                    </div>

                                </div>

                                <div class="row py-2">

                                    <div class="col-4 col-lg-2">
                                        <span class="font-weight-bold">18:00 - 19:00</span>
                                    </div>

                                    <div class="col-4 col-lg-5">
                                        <button class="btn btn-outline-secondary w-100">Sign up</button>
                                    </div>

                                    <div class="col-4 col-lg-5">
                                        <button class="btn btn-outline-secondary w-100">Sign up</button>
                                    </div>

                                </div>

                            </div>

                            <div class="tab-pane fade" id="thursday" role="tabpanel" aria-labelledby="thursday-tab">

                                <div class="row py-2">

                                    <div class="col-4 col-lg-2">
                                        <span class="font-weight-bold">08:00 - 09:00</span>
                                    </div>

                                    <div class="col-4 col-lg-5">
                                        <button class="btn btn-outline-secondary w-100">Sign up</button>
                                    </div>

                                    <div class="col-4 col-lg-5">
                                        <button class="btn btn-outline-secondary w-100">Sign up</button>
                                    </div>

                                </div>

                                <div class="row py-2">

                                    <div class="col-4 col-lg-2">
                                        <span class="font-weight-bold">09:00 - 10:00</span>
                                    </div>

                                    <div class="col-4 col-lg-5">
                                        <button class="btn btn-outline-secondary w-100">Sign up</button>
                                    </div>

                                    <div class="col-4 col-lg-5">
                                        <button class="btn btn-outline-secondary w-100">Sign up</button>
                                    </div>

                                </div>

                                <div class="row py-2">

                                    <div class="col-4 col-lg-2">
                                        <span class="font-weight-bold">10:00 - 11:00</span>
                                    </div>

                                    <div class="col-4 col-lg-5">
                                        <button class="btn btn-outline-secondary w-100">Sign up</button>
                                    </div>

                                    <div class="col-4 col-lg-5">
                                        <button class="btn btn-outline-secondary w-100">Sign up</button>
                                    </div>

                                </div>

                                <div class="row py-2">

                                    <div class="col-4 col-lg-2">
                                        <span class="font-weight-bold">11:00 - 12:00</span>
                                    </div>

                                    <div class="col-4 col-lg-5">
                                        <button class="btn btn-outline-secondary w-100">Sign up</button>
                                    </div>

                                    <div class="col-4 col-lg-5">
                                        <button class="btn btn-outline-secondary w-100">Sign up</button>
                                    </div>

                                </div>

                                <div class="row py-2">

                                    <div class="col-4 col-lg-2">
                                        <span class="font-weight-bold">12:00 - 13:00</span>
                                    </div>

                                    <div class="col-4 col-lg-5">
                                        <button class="btn btn-outline-secondary w-100">Sign up</button>
                                    </div>

                                    <div class="col-4 col-lg-5">
                                        <button class="btn btn-outline-secondary w-100">Sign up</button>
                                    </div>

                                </div>

                                <div class="row py-2">

                                    <div class="col-4 col-lg-2">
                                        <span class="font-weight-bold">13:00 - 14:00</span>
                                    </div>

                                    <div class="col-4 col-lg-5">
                                        <button class="btn btn-outline-secondary w-100">Sign up</button>
                                    </div>

                                    <div class="col-4 col-lg-5">
                                        <button class="btn btn-outline-secondary w-100">Sign up</button>
                                    </div>

                                </div>

                                <div class="row py-2">

                                    <div class="col-4 col-lg-2">
                                        <span class="font-weight-bold">14:00 - 15:00</span>
                                    </div>

                                    <div class="col-4 col-lg-5">
                                        <button class="btn btn-outline-secondary w-100">Sign up</button>
                                    </div>

                                    <div class="col-4 col-lg-5">
                                        <button class="btn btn-outline-secondary w-100">Sign up</button>
                                    </div>

                                </div>

                                <div class="row py-2">

                                    <div class="col-4 col-lg-2">
                                        <span class="font-weight-bold">15:00 - 16:00</span>
                                    </div>

                                    <div class="col-4 col-lg-5">
                                        <button class="btn btn-outline-secondary w-100">Sign up</button>
                                    </div>

                                    <div class="col-4 col-lg-5">
                                        <button class="btn btn-outline-secondary w-100">Sign up</button>
                                    </div>

                                </div>

                                <div class="row py-2">

                                    <div class="col-4 col-lg-2">
                                        <span class="font-weight-bold">16:00 - 17:00</span>
                                    </div>

                                    <div class="col-4 col-lg-5">
                                        <button class="btn btn-outline-secondary w-100">Sign up</button>
                                    </div>

                                    <div class="col-4 col-lg-5">
                                        <button class="btn btn-outline-secondary w-100">Sign up</button>
                                    </div>

                                </div>

                                <div class="row py-2">

                                    <div class="col-4 col-lg-2">
                                        <span class="font-weight-bold">17:00 - 18:00</span>
                                    </div>

                                    <div class="col-4 col-lg-5">
                                        <button class="btn btn-outline-secondary w-100">Sign up</button>
                                    </div>

                                    <div class="col-4 col-lg-5">
                                        <button class="btn btn-outline-secondary w-100">Sign up</button>
                                    </div>

                                </div>

                                <div class="row py-2">

                                    <div class="col-4 col-lg-2">
                                        <span class="font-weight-bold">18:00 - 19:00</span>
                                    </div>

                                    <div class="col-4 col-lg-5">
                                        <button class="btn btn-outline-secondary w-100">Sign up</button>
                                    </div>

                                    <div class="col-4 col-lg-5">
                                        <button class="btn btn-outline-secondary w-100">Sign up</button>
                                    </div>

                                </div>

                            </div>

                            <div class="tab-pane fade" id="friday" role="tabpanel" aria-labelledby="friday-tab">

                                <div class="row py-2">

                                    <div class="col-4 col-lg-2">
                                        <span class="font-weight-bold">08:00 - 09:00</span>
                                    </div>

                                    <div class="col-4 col-lg-5">
                                        <button class="btn btn-outline-secondary w-100">Sign up</button>
                                    </div>

                                    <div class="col-4 col-lg-5">
                                        <button class="btn btn-outline-secondary w-100">Sign up</button>
                                    </div>

                                </div>

                                <div class="row py-2">

                                    <div class="col-4 col-lg-2">
                                        <span class="font-weight-bold">09:00 - 10:00</span>
                                    </div>

                                    <div class="col-4 col-lg-5">
                                        <button class="btn btn-outline-secondary w-100">Sign up</button>
                                    </div>

                                    <div class="col-4 col-lg-5">
                                        <button class="btn btn-outline-secondary w-100">Sign up</button>
                                    </div>

                                </div>

                                <div class="row py-2">

                                    <div class="col-4 col-lg-2">
                                        <span class="font-weight-bold">10:00 - 11:00</span>
                                    </div>

                                    <div class="col-4 col-lg-5">
                                        <button class="btn btn-outline-secondary w-100">Sign up</button>
                                    </div>

                                    <div class="col-4 col-lg-5">
                                        <button class="btn btn-outline-secondary w-100">Sign up</button>
                                    </div>

                                </div>

                                <div class="row py-2">

                                    <div class="col-4 col-lg-2">
                                        <span class="font-weight-bold">11:00 - 12:00</span>
                                    </div>

                                    <div class="col-4 col-lg-5">
                                        <button class="btn btn-outline-secondary w-100">Sign up</button>
                                    </div>

                                    <div class="col-4 col-lg-5">
                                        <button class="btn btn-outline-secondary w-100">Sign up</button>
                                    </div>

                                </div>

                                <div class="row py-2">

                                    <div class="col-4 col-lg-2">
                                        <span class="font-weight-bold">12:00 - 13:00</span>
                                    </div>

                                    <div class="col-4 col-lg-5">
                                        <button class="btn btn-outline-secondary w-100">Sign up</button>
                                    </div>

                                    <div class="col-4 col-lg-5">
                                        <button class="btn btn-outline-secondary w-100">Sign up</button>
                                    </div>

                                </div>

                                <div class="row py-2">

                                    <div class="col-4 col-lg-2">
                                        <span class="font-weight-bold">13:00 - 14:00</span>
                                    </div>

                                    <div class="col-4 col-lg-5">
                                        <button class="btn btn-outline-secondary w-100">Sign up</button>
                                    </div>

                                    <div class="col-4 col-lg-5">
                                        <button class="btn btn-outline-secondary w-100">Sign up</button>
                                    </div>

                                </div>

                                <div class="row py-2">

                                    <div class="col-4 col-lg-2">
                                        <span class="font-weight-bold">14:00 - 15:00</span>
                                    </div>

                                    <div class="col-4 col-lg-5">
                                        <button class="btn btn-outline-secondary w-100">Sign up</button>
                                    </div>

                                    <div class="col-4 col-lg-5">
                                        <button class="btn btn-outline-secondary w-100">Sign up</button>
                                    </div>

                                </div>

                                <div class="row py-2">

                                    <div class="col-4 col-lg-2">
                                        <span class="font-weight-bold">15:00 - 16:00</span>
                                    </div>

                                    <div class="col-4 col-lg-5">
                                        <button class="btn btn-outline-secondary w-100">Sign up</button>
                                    </div>

                                    <div class="col-4 col-lg-5">
                                        <button class="btn btn-outline-secondary w-100">Sign up</button>
                                    </div>

                                </div>

                                <div class="row py-2">

                                    <div class="col-4 col-lg-2">
                                        <span class="font-weight-bold">16:00 - 17:00</span>
                                    </div>

                                    <div class="col-4 col-lg-5">
                                        <button class="btn btn-outline-secondary w-100">Sign up</button>
                                    </div>

                                    <div class="col-4 col-lg-5">
                                        <button class="btn btn-outline-secondary w-100">Sign up</button>
                                    </div>

                                </div>

                                <div class="row py-2">

                                    <div class="col-4 col-lg-2">
                                        <span class="font-weight-bold">17:00 - 18:00</span>
                                    </div>

                                    <div class="col-4 col-lg-5">
                                        <button class="btn btn-outline-secondary w-100">Sign up</button>
                                    </div>

                                    <div class="col-4 col-lg-5">
                                        <button class="btn btn-outline-secondary w-100">Sign up</button>
                                    </div>

                                </div>

                                <div class="row py-2">

                                    <div class="col-4 col-lg-2">
                                        <span class="font-weight-bold">18:00 - 19:00</span>
                                    </div>

                                    <div class="col-4 col-lg-5">
                                        <button class="btn btn-outline-secondary w-100">Sign up</button>
                                    </div>

                                    <div class="col-4 col-lg-5">
                                        <button class="btn btn-outline-secondary w-100">Sign up</button>
                                    </div>

                                </div>

                            </div>

                            <div class="tab-pane fade" id="saturday" role="tabpanel" aria-labelledby="saturday-tab">

                                <div class="row py-2">

                                    <div class="col-4 col-lg-2">
                                        <span class="font-weight-bold">08:00 - 09:00</span>
                                    </div>

                                    <div class="col-4 col-lg-5">
                                        <button class="btn btn-outline-secondary w-100">Sign up</button>
                                    </div>

                                    <div class="col-4 col-lg-5">
                                        <button class="btn btn-outline-secondary w-100">Sign up</button>
                                    </div>

                                </div>

                                <div class="row py-2">

                                    <div class="col-4 col-lg-2">
                                        <span class="font-weight-bold">09:00 - 10:00</span>
                                    </div>

                                    <div class="col-4 col-lg-5">
                                        <button class="btn btn-outline-secondary w-100">Sign up</button>
                                    </div>

                                    <div class="col-4 col-lg-5">
                                        <button class="btn btn-outline-secondary w-100">Sign up</button>
                                    </div>

                                </div>

                                <div class="row py-2">

                                    <div class="col-4 col-lg-2">
                                        <span class="font-weight-bold">10:00 - 11:00</span>
                                    </div>

                                    <div class="col-4 col-lg-5">
                                        <button class="btn btn-outline-secondary w-100">Sign up</button>
                                    </div>

                                    <div class="col-4 col-lg-5">
                                        <button class="btn btn-outline-secondary w-100">Sign up</button>
                                    </div>

                                </div>

                                <div class="row py-2">

                                    <div class="col-4 col-lg-2">
                                        <span class="font-weight-bold">11:00 - 12:00</span>
                                    </div>

                                    <div class="col-4 col-lg-5">
                                        <button class="btn btn-outline-secondary w-100">Sign up</button>
                                    </div>

                                    <div class="col-4 col-lg-5">
                                        <button class="btn btn-outline-secondary w-100">Sign up</button>
                                    </div>

                                </div>

                                <div class="row py-2">

                                    <div class="col-4 col-lg-2">
                                        <span class="font-weight-bold">12:00 - 13:00</span>
                                    </div>

                                    <div class="col-4 col-lg-5">
                                        <button class="btn btn-outline-secondary w-100">Sign up</button>
                                    </div>

                                    <div class="col-4 col-lg-5">
                                        <button class="btn btn-outline-secondary w-100">Sign up</button>
                                    </div>

                                </div>

                                <div class="row py-2">

                                    <div class="col-4 col-lg-2">
                                        <span class="font-weight-bold">13:00 - 14:00</span>
                                    </div>

                                    <div class="col-4 col-lg-5">
                                        <button class="btn btn-outline-secondary w-100">Sign up</button>
                                    </div>

                                    <div class="col-4 col-lg-5">
                                        <button class="btn btn-outline-secondary w-100">Sign up</button>
                                    </div>

                                </div>

                                <div class="row py-2">

                                    <div class="col-4 col-lg-2">
                                        <span class="font-weight-bold">14:00 - 15:00</span>
                                    </div>

                                    <div class="col-4 col-lg-5">
                                        <button class="btn btn-outline-secondary w-100">Sign up</button>
                                    </div>

                                    <div class="col-4 col-lg-5">
                                        <button class="btn btn-outline-secondary w-100">Sign up</button>
                                    </div>

                                </div>

                                <div class="row py-2">

                                    <div class="col-4 col-lg-2">
                                        <span class="font-weight-bold">15:00 - 16:00</span>
                                    </div>

                                    <div class="col-4 col-lg-5">
                                        <button class="btn btn-outline-secondary w-100">Sign up</button>
                                    </div>

                                    <div class="col-4 col-lg-5">
                                        <button class="btn btn-outline-secondary w-100">Sign up</button>
                                    </div>

                                </div>

                                <div class="row py-2">

                                    <div class="col-4 col-lg-2">
                                        <span class="font-weight-bold">16:00 - 17:00</span>
                                    </div>

                                    <div class="col-4 col-lg-5">
                                        <button class="btn btn-outline-secondary w-100">Sign up</button>
                                    </div>

                                    <div class="col-4 col-lg-5">
                                        <button class="btn btn-outline-secondary w-100">Sign up</button>
                                    </div>

                                </div>

                                <div class="row py-2">

                                    <div class="col-4 col-lg-2">
                                        <span class="font-weight-bold">17:00 - 18:00</span>
                                    </div>

                                    <div class="col-4 col-lg-5">
                                        <button class="btn btn-outline-secondary w-100">Sign up</button>
                                    </div>

                                    <div class="col-4 col-lg-5">
                                        <button class="btn btn-outline-secondary w-100">Sign up</button>
                                    </div>

                                </div>

                                <div class="row py-2">

                                    <div class="col-4 col-lg-2">
                                        <span class="font-weight-bold">18:00 - 19:00</span>
                                    </div>

                                    <div class="col-4 col-lg-5">
                                        <button class="btn btn-outline-secondary w-100">Sign up</button>
                                    </div>

                                    <div class="col-4 col-lg-5">
                                        <button class="btn btn-outline-secondary w-100">Sign up</button>
                                    </div>

                                </div>

                            </div>

                            <div class="tab-pane fade" id="sunday" role="tabpanel" aria-labelledby="sunday-tab">

                                <div class="row py-2">

                                    <div class="col-4 col-lg-2">
                                        <span class="font-weight-bold">08:00 - 09:00</span>
                                    </div>

                                    <div class="col-4 col-lg-5">
                                        <button class="btn btn-outline-secondary w-100">Sign up</button>
                                    </div>

                                    <div class="col-4 col-lg-5">
                                        <button class="btn btn-outline-secondary w-100">Sign up</button>
                                    </div>

                                </div>

                                <div class="row py-2">

                                    <div class="col-4 col-lg-2">
                                        <span class="font-weight-bold">09:00 - 10:00</span>
                                    </div>

                                    <div class="col-4 col-lg-5">
                                        <button class="btn btn-outline-secondary w-100">Sign up</button>
                                    </div>

                                    <div class="col-4 col-lg-5">
                                        <button class="btn btn-outline-secondary w-100">Sign up</button>
                                    </div>

                                </div>

                                <div class="row py-2">

                                    <div class="col-4 col-lg-2">
                                        <span class="font-weight-bold">10:00 - 11:00</span>
                                    </div>

                                    <div class="col-4 col-lg-5">
                                        <button class="btn btn-outline-secondary w-100">Sign up</button>
                                    </div>

                                    <div class="col-4 col-lg-5">
                                        <button class="btn btn-outline-secondary w-100">Sign up</button>
                                    </div>

                                </div>

                                <div class="row py-2">

                                    <div class="col-4 col-lg-2">
                                        <span class="font-weight-bold">11:00 - 12:00</span>
                                    </div>

                                    <div class="col-4 col-lg-5">
                                        <button class="btn btn-outline-secondary w-100">Sign up</button>
                                    </div>

                                    <div class="col-4 col-lg-5">
                                        <button class="btn btn-outline-secondary w-100">Sign up</button>
                                    </div>

                                </div>

                                <div class="row py-2">

                                    <div class="col-4 col-lg-2">
                                        <span class="font-weight-bold">12:00 - 13:00</span>
                                    </div>

                                    <div class="col-4 col-lg-5">
                                        <button class="btn btn-outline-secondary w-100">Sign up</button>
                                    </div>

                                    <div class="col-4 col-lg-5">
                                        <button class="btn btn-outline-secondary w-100">Sign up</button>
                                    </div>

                                </div>

                                <div class="row py-2">

                                    <div class="col-4 col-lg-2">
                                        <span class="font-weight-bold">13:00 - 14:00</span>
                                    </div>

                                    <div class="col-4 col-lg-5">
                                        <button class="btn btn-outline-secondary w-100">Sign up</button>
                                    </div>

                                    <div class="col-4 col-lg-5">
                                        <button class="btn btn-outline-secondary w-100">Sign up</button>
                                    </div>

                                </div>

                                <div class="row py-2">

                                    <div class="col-4 col-lg-2">
                                        <span class="font-weight-bold">14:00 - 15:00</span>
                                    </div>

                                    <div class="col-4 col-lg-5">
                                        <button class="btn btn-outline-secondary w-100">Sign up</button>
                                    </div>

                                    <div class="col-4 col-lg-5">
                                        <button class="btn btn-outline-secondary w-100">Sign up</button>
                                    </div>

                                </div>

                                <div class="row py-2">

                                    <div class="col-4 col-lg-2">
                                        <span class="font-weight-bold">15:00 - 16:00</span>
                                    </div>

                                    <div class="col-4 col-lg-5">
                                        <button class="btn btn-outline-secondary w-100">Sign up</button>
                                    </div>

                                    <div class="col-4 col-lg-5">
                                        <button class="btn btn-outline-secondary w-100">Sign up</button>
                                    </div>

                                </div>

                                <div class="row py-2">

                                    <div class="col-4 col-lg-2">
                                        <span class="font-weight-bold">16:00 - 17:00</span>
                                    </div>

                                    <div class="col-4 col-lg-5">
                                        <button class="btn btn-outline-secondary w-100">Sign up</button>
                                    </div>

                                    <div class="col-4 col-lg-5">
                                        <button class="btn btn-outline-secondary w-100">Sign up</button>
                                    </div>

                                </div>

                                <div class="row py-2">

                                    <div class="col-4 col-lg-2">
                                        <span class="font-weight-bold">17:00 - 18:00</span>
                                    </div>

                                    <div class="col-4 col-lg-5">
                                        <button class="btn btn-outline-secondary w-100">Sign up</button>
                                    </div>

                                    <div class="col-4 col-lg-5">
                                        <button class="btn btn-outline-secondary w-100">Sign up</button>
                                    </div>

                                </div>

                                <div class="row py-2">

                                    <div class="col-4 col-lg-2">
                                        <span class="font-weight-bold">18:00 - 19:00</span>
                                    </div>

                                    <div class="col-4 col-lg-5">
                                        <button class="btn btn-outline-secondary w-100">Sign up</button>
                                    </div>

                                    <div class="col-4 col-lg-5">
                                        <button class="btn btn-outline-secondary w-100">Sign up</button>
                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>


    <!-- Modal -->
    <div class="modal border-0 fade" id="confirmation-modal" tabindex="-1" role="dialog" aria-labelledby="confirmationModalTitle" aria-hidden="true">
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
