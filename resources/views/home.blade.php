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

                    @include('stand.calendar-header')

                    <div class="card-body">

                        @for($i = 8; $i <= 20; $i++)

                            <div class="row py-2">

                                <div class="col-2 d-flex">
                                    <span class="m-auto {{ $dt->hour == $i ? 'btn btn-secondary' : '' }}">{{ $i >= 10 ? $i : '0' . $i }}:00</span>
                                </div>

                                @if($stands->contains('time', $i))

                                    @foreach($stands as $stand)

                                        @if($stand->time == $i)

                                            @if(!empty($stand->user_id_1))

                                                <div class="col-5">
                                                    <button class="btn btn-secondary w-100" role="button">{{ $stand->userOne->name }}</button>
                                                </div>

                                            @else

                                                <div class="col-5">
                                                    <button class="btn btn-outline-secondary w-100" role="button">Sign up</button>
                                                </div>

                                            @endif

                                            @if(!empty($stand->user_id_2))

                                                <div class="col-5">
                                                    <button class="btn btn-secondary w-100" role="button">{{ $stand->userTwo->name }}</button>
                                                </div>

                                            @else

                                                <div class="col-5">
                                                    <button class="btn btn-outline-secondary w-100" role="button">Sign up</button>
                                                </div>

                                            @endif

                                        @endif

                                    @endforeach

                                @else

                                    <div class="col-5">
                                        <button class="btn btn-outline-secondary w-100" role="button">Sign up</button>
                                    </div>

                                    <div class="col-5">
                                        <button class="btn btn-outline-secondary w-100" role="button">Sign up</button>
                                    </div>

                                @endif

                            </div>

                        @endfor

                    </div>

                </div>

            </div>

        </div>
    </div>

@endsection
