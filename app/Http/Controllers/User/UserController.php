<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Stand;
use App\Models\Territory;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller {

    public function __construct() {
        $this->middleware( [ 'auth', 'verified', 'user' ] );
    }


    public function index() {
        $dt = Carbon::create();
        $dt->timezone( 'Europe/Kiev' );

        $standsToday = Stand::orderBy( 'time', 'ASC' )->where( [
            [ 'date', $dt->now()->toDateString() ],
            [ 'user_id_1', Auth::user()->id ],
        ] )->orWhere( [
            [ 'date', $dt->now()->toDateString() ],
            [ 'user_id_2', Auth::user()->id ],
        ] )->get();

        $standsTomorrow = Stand::orderBy( 'time', 'ASC' )->where( [
            [ 'date', $dt->now()->addDay()->toDateString() ],
            [ 'user_id_1', Auth::user()->id ],
        ] )->orWhere( [
            [ 'date', $dt->now()->addDay()->toDateString() ],
            [ 'user_id_2', Auth::user()->id ],
        ] )->get();

        $territories = Territory::orderBy( 'number', 'ASC' )->where( [
            [ 'user_id', Auth::user()->id ],
            [ 'status', 1 ]
        ] )->orWhere( [
            [ 'user_id', Auth::user()->id ],
            [ 'status', 3 ]
        ] )->get();

        return view( 'user.index', compact( 'dt', 'standsToday', 'standsTomorrow', 'territories' ) );
    }

}
