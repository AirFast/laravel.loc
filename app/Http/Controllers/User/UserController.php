<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Territory;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller {

    public function __construct() {
        $this->middleware( [ 'auth', 'verified', 'user' ] );
    }


    public function index() {
        $dt = Carbon::create();
        $dt->timezone( 'Europe/Kiev' );

        $territories = Territory::orderBy( 'number', 'ASC' )->where( [
            [ 'user_id', Auth::user()->id ],
            [ 'status', 1 ]
        ] )->orWhere( [
            [ 'user_id', Auth::user()->id ],
            [ 'status', 3 ]
        ] )->get();

        return view( 'user.index', compact( 'dt', 'territories' ) );
    }

}
