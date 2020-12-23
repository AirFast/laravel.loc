<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Territory;
use Illuminate\Http\Request;

class TerritoriesController extends Controller {

    public function __construct() {
        $this->middleware( 'user' );
    }


    public function show( $locale, Territory $territory ) {
        $id = $territory->id;

        return view( 'user.territories.show', compact( 'id', 'territory' ) );
    }

}
