<?php

namespace App\Http\Controllers;

use App\Models\Stand;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StandsController extends Controller {

    public function __construct() {
        $this->middleware( [ 'auth', 'verified', 'user' ] );
    }

    public function index( Request $request ) {
        $now = Carbon::now()->timezone( 'Europe/Kiev' );
        $dt  = Carbon::createFromDate( $request->query( 'date', $now->toDateString() ) )->timezone( 'Europe/Kiev' );

        $startOfWeek = $dt->clone()->startOfWeek();
        $endOfWeek   = $dt->clone()->endOfWeek();

        $stands = Stand::where( 'date', $dt->toDateString() )->get();

        return view( 'stand.index', compact( 'now', 'dt', 'startOfWeek', 'endOfWeek', 'stands' ) );
    }

    public function store() {
        $data = request()->validate( [
            'time'      => 'required|numeric',
            'date'      => 'required',
            'user_id_1' => 'required_if:user_id_2,null|required_if:user_id_1,' . Auth::user()->id,
            'user_id_2' => 'required_if:user_id_1,null|required_if:user_id_2,' . Auth::user()->id
        ] );

        $stand = Stand::where( [ [ 'date', $data['date'] ], [ 'time', $data['time'] ] ] );
        $dt    = $dt = Carbon::createFromDate( $data['date'] )->timezone( 'Europe/Kiev' )->locale( app()->getLocale() )->translatedFormat( 'l, d F Y' );

        if ( ! $stand->exists() ) {
            $stand = Stand::create( $data );

            session()->flash( 'create', __( 'stand.alert.create', [
                'user' => Auth::user()->name,
                'time' => $stand->time,
                'date' => $dt
            ] ) );
        } else if ( ! empty( $data['user_id_1'] ) && ( empty( $stand->first()->user_id_1 ) || empty( $stand->first()->user_id_2 ) ) ) {
            if ( empty( $stand->first()->user_id_2 ) ) {
                $data['user_id_2'] = $data['user_id_1'];
                unset( $data['user_id_1'] );
            } else {
                $data['user_id_2'] = $stand->first()->user_id_2;
            }

            $stand->first()->update( $data );

            session()->flash( 'create', __( 'stand.alert.create', [
                'user' => Auth::user()->name,
                'time' => $stand->first()->time,
                'date' => $dt
            ] ) );
        } else if ( ! empty( $data['user_id_2'] ) && ( empty( $stand->first()->user_id_1 ) || empty( $stand->first()->user_id_2 ) ) ) {
            if ( empty( $stand->first()->user_id_1 ) ) {
                $data['user_id_1'] = $data['user_id_2'];
                unset( $data['user_id_2'] );
            } else {
                $data['user_id_1'] = $stand->first()->user_id_1;
            }

            $stand->first()->update( $data );

            session()->flash( 'create', __( 'stand.alert.create', [
                'user' => Auth::user()->name,
                'time' => $stand->first()->time,
                'date' => $dt
            ] ) );
        } else {
            session()->flash( 'create', __( 'stand.alert.notice' ) );
        }

        return back();
    }

    public function update( $locale, Stand $stand ) {
        $data = request()->validate( [
            'user_id_1' => 'required_if:user_id_2,null|required_if:user_id_1,' . Auth::user()->id,
            'user_id_2' => 'required_if:user_id_1,null|required_if:user_id_2,' . Auth::user()->id
        ] );

        $dt = Carbon::createFromDate( $stand->date )->timezone( 'Europe/Kiev' )->locale( app()->getLocale() )->translatedFormat( 'l, d F Y' );

        if ( ! empty( $data['user_id_1'] ) ) {
            unset( $data['user_id_2'] );

            if ( ! empty( $stand->user_id_1 ) && $stand->user_id_1 == $data['user_id_1'] ) {
                $data['user_id_1'] = null;

                session()->flash( 'delete', __( 'stand.alert.delete', [
                    'user' => Auth::user()->name,
                    'time' => $stand->time,
                    'date' => $dt
                ] ) );
            } elseif ( empty( $stand->user_id_2 ) && ! empty( $stand->user_id_1 ) && $data['user_id_1'] != null ) {
                $data['user_id_2'] = $data['user_id_1'];
                unset($data['user_id_1']);

                session()->flash( 'create', __( 'stand.alert.create', [
                    'user' => Auth::user()->name,
                    'time' => $stand->time,
                    'date' => $dt
                ] ) );
            } else if ( ! empty( $stand->user_id_1 ) && $stand->user_id_1 != $data['user_id_1'] && $data['user_id_1'] != null ) {
                unset($data['user_id_1']);

                session()->flash( 'create', __( 'stand.alert.notice' ) );
            } else {
                session()->flash( 'create', __( 'stand.alert.create', [
                    'user' => Auth::user()->name,
                    'time' => $stand->time,
                    'date' => $dt
                ] ) );
            }

        }

        if ( ! empty( $data['user_id_2'] ) ) {
            unset( $data['user_id_1'] );

            if ( ! empty( $stand->user_id_2 ) && $stand->user_id_2 == $data['user_id_2'] ) {
                $data['user_id_2'] = null;

                session()->flash( 'delete', __( 'stand.alert.delete', [
                    'user' => Auth::user()->name,
                    'time' => $stand->time,
                    'date' => $dt
                ] ) );
            } else if ( ! empty( $stand->user_id_2 ) && empty( $stand->user_id_1 ) && $data['user_id_2'] != null ) {
                $data['user_id_1'] = $data['user_id_2'];
                unset($data['user_id_2']);

                session()->flash( 'create', __( 'stand.alert.create', [
                    'user' => Auth::user()->name,
                    'time' => $stand->time,
                    'date' => $dt
                ] ) );
            } else if ( ! empty( $stand->user_id_2 ) && $stand->user_id_2 != $data['user_id_2'] && $data['user_id_2'] != null ) {
                unset($data['user_id_2']);

                session()->flash( 'create', __( 'stand.alert.notice' ) );
            } else {
                session()->flash( 'create', __( 'stand.alert.create', [
                    'user' => Auth::user()->name,
                    'time' => $stand->time,
                    'date' => $dt
                ] ) );
            }

        }

        $stand->update( $data );

        return back();
    }

}
