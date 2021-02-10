<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Mail\TerritoryMailSender;
use App\Models\Territory;
use App\Models\TerritoryPeriod;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

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

            if ( config( 'settings.territory_admin_email' ) ) {

                $details = [
                    'name'    => Auth::user()->name,
                    'number'  => $territory->number,
                    'address' => $territory->name,
                    'url'     => route( 'admin.territories.edit', [ app()->getLocale(), $territory->id ] ),
                ];

                Mail::to( 'airfast.88@gmail.com' )->send( new TerritoryMailSender( $details ) );

            }

            session()->flash( 'message', __( 'adminpanel.territories.message.territory-take' ) );

        }

        $territory->update( $data );

        return redirect( route( 'user.index', [ app()->getLocale() ] ) );
    }
}
