<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Territory;
use App\Models\User;
use Illuminate\Http\Request;

class TerritoriesController extends Controller {

    public function __construct() {
        $this->middleware( 'admin' );
    }


    public function index() {

        if ( request()->has('status') ) {
            $territories = Territory::where( 'status', request()->query('status') )->paginate( config( 'settings.count_per_page' ) );
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

        Territory::create( $data );

        return redirect( route( 'admin.territories.index', app()->getLocale() ) );
    }


    protected function show( $locale, Territory $territory ) {
        $id = $territory->id;

        return view( 'admin.territories.show', compact( 'id', 'territory' ) );
    }
}
