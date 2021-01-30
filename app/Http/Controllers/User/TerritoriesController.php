<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Territory;
use App\Models\TerritoryPeriod;
use Illuminate\Http\Request;

class TerritoriesController extends Controller {

    public function __construct() {
        $this->middleware( [ 'auth', 'verified', 'user' ] );
    }


    public function index() {
        $territories = Territory::orderBy( 'number', 'ASC' )->where( 'status', 2 )->paginate( config( 'settings.count_per_page' ) );

        return view( 'user.territories.index', compact( 'territories' ) );
    }


    public function show( $locale, Territory $territory ) {
        $id = $territory->id;

        return view( 'user.territories.show', compact( 'id', 'territory' ) );
    }


    public function update( $locale, Territory $territory ) {
        $data = request()->validate( [
            'status'  => 'required',
            'user_id' => 'required',
        ] );

        if ( $data['status'] == 2 ) {

            $data['user_id'] = 0;
            $data['status']  = 3;

            $territoryPeriods = TerritoryPeriod::where( [
                [ 'territory_id', $territory->id ],
                [ 'in_process', 1 ]
            ] )->get();

            foreach ( $territoryPeriods as $territoryPeriod ) {
                $territoryPeriod->in_process = 0;
                $territoryPeriod->time_end   = now()->toDateString();
                $territoryPeriod->save();
            }

            session()->flash( 'message', __( 'adminpanel.territories.message.territory-give' ) );

        } else {

            session()->flash( 'message', __( 'adminpanel.territories.message.territory-take' ) );

        }

        $territory->update( $data );

        return redirect( route( 'user.index', [ app()->getLocale(), $territory ] ) );
    }
}
