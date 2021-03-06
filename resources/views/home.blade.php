@extends('layouts.app')

@section('title'){{ __('stand.home') }}@endsection

@section('description'){{ __('Home page a ministry with stand.') }}@endsection

@section('content')

    <div class="container">
        <div class="row justify-content-center">

            <div class="col-md-12">

                <div class="card border-0 shadow">

                    @include('stand.calendar-header')

                    <div class="card-body">

                        @for($i = config('settings.stand_time_start'); $i <= config('settings.stand_time_end'); $i++)

                            <div class="row py-3 py-md-2">

                                <div class="col-2 d-flex text-center">
                                    <span
                                        class="{{ $dt->hour == $i ? 'btn btn-sm btn-secondary ml-n1 my-auto mx-sm-auto' : 'm-auto ' }}">{{ $i >= 10 ? $i : '0' . $i }}:00</span>
                                </div>

                                @if($stands->contains('time', $i))

                                    @foreach($stands as $stand)

                                        @if($stand->time == $i)

                                            @if(!empty($stand->user_id_1))

                                                <div class="col-10 col-md-5">
                                                    <button
                                                        class="btn btn-secondary btn-block">{{ $stand->userOne->name }}</button>
                                                </div>

                                            @else

                                                <div class="col-10 col-md-5">
                                                    <button
                                                        class="btn btn-outline-secondary btn-block">{{ __('stand.free') }}</button>
                                                </div>

                                            @endif

                                            @if(!empty($stand->user_id_2))

                                                <div class="col-10 col-md-5 offset-2 offset-md-0 mt-3 m-md-0">
                                                    <button
                                                        class="btn btn-secondary btn-block">{{ $stand->userTwo->name }}</button>
                                                </div>

                                            @else

                                                <div class="col-10 col-md-5 offset-2 offset-md-0 mt-3 m-md-0">
                                                    <button
                                                        class="btn btn-outline-secondary btn-block">{{ __('stand.free') }}</button>
                                                </div>

                                            @endif

                                        @endif

                                    @endforeach

                                @else

                                    <div class="col-10 col-md-5">
                                        <button
                                            class="btn btn-outline-secondary btn-block">{{ __('stand.free') }}</button>
                                    </div>

                                    <div class="col-10 col-md-5 offset-2 offset-md-0 mt-3 m-md-0">
                                        <button
                                            class="btn btn-outline-secondary btn-block">{{ __('stand.free') }}</button>
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
