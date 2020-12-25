<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Territory;
use App\Models\TerritoryPeriod;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TerritoriesController extends Controller {

    public function __construct() {
        $this->middleware( 'admin' );
    }


    public function index() {
        if ( request()->has( 'status' ) ) {
            $territories = Territory::where( 'status', request()->query( 'status' ) )->paginate( config( 'settings.count_per_page' ) );
        } else {
            $territories = Territory::paginate( config( 'settings.count_per_page' ) );
        }

        $territory = new Territory();

        return view( 'admin.territories.index', compact( 'territories', 'territory' ) );
    }


    public function create() {
        $users     = User::all();
        $territory = new Territory();

        return view( 'admin.territories.create', compact( 'users', 'territory' ) );
    }


    public function store() {
        $data = request()->validate( [
            'number'      => 'required|numeric|unique:territories',
            'name'        => 'required|string|max:255',
            'map_lat_lng' => 'required|string',
            'description' => '',
            'status'      => 'required',
            'user_id'     => '',
        ] );

        $territory = Territory::create( $data );

        return redirect( route( 'admin.territories.index', app()->getLocale() ) )->with( [ 'create' => __( 'adminpanel.territories.alert.create', [ 'name' => $territory->name ] ) ] );
    }


    public function show( $locale, Territory $territory ) {
        $id = $territory->id;
        $dt = Carbon::create();
        $dt->timezone( 'Europe/Kiev' );

        return view( 'admin.territories.show', compact( 'id', 'territory', 'dt' ) );
    }


    public function edit( $locale, Territory $territory ) {
        $id    = $territory->id;
        $users = User::all();

        return view( 'admin.territories.edit', compact( 'id', 'territory', 'users' ) );
    }

    public function update( $locale, Territory $territory ) {
        $data = request()->validate( [
            'number'      => 'required|numeric|exclude_if:number,' . $territory->number . '|unique:territories',
            'name'        => 'required|string|max:255',
            'map_lat_lng' => 'required|string',
            'description' => '',
            'status'      => 'required',
            'user_id'     => '',
        ] );

        if ( $data['status'] == 1 && $data['user_id'] != 0 ) {

            TerritoryPeriod::create( [
                'user_id'      => $data['user_id'],
                'territory_id' => $territory->id,
                'in_process'   => 1,
                'time_start'   => now()->toDateString(),
            ] );

            session()->flash( 'update', __( 'adminpanel.territories.alert.update' ) );

        } else {

            if ( $data['status'] == 2 || $data['status'] == 3 ) {

                $data['user_id'] = 0;

                $territoryPeriods = TerritoryPeriod::where( [
                    [ 'territory_id', $territory->id ],
                    [ 'in_process', 1 ]
                ] )->get();

                foreach ( $territoryPeriods as $territoryPeriod ) {
                    $territoryPeriod->in_process = 0;
                    $territoryPeriod->time_end   = now()->toDateString();
                    $territoryPeriod->save();
                }

                session()->flash( 'update', __( 'adminpanel.territories.alert.update' ) );

            } else {

                $data['status'] = 2;

                session()->flash( 'update', __( 'Територія не може бути опрацьована ніким' ) );

            }

        }

        $territory->update( $data );

        return redirect( route( 'admin.territories.show', [
            app()->getLocale(),
            $territory
        ] ) );
    }


    public function destroy( $locale, Territory $territory ) {
        $territory->delete();

        return back()->with( [ 'delete' => __( 'adminpanel.territories.alert.delete' ) ] );
    }
}
