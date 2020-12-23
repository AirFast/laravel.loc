<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Territory;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller {

    public function __construct() {
        $this->middleware( 'user' );
    }


    public function index() {
        $dt = Carbon::create();
        $dt->timezone( 'Europe/Kiev' );

        $territories = Territory::where( [ [ 'user_id', Auth::user()->id ], [ 'status', 1 ] ] )->get();

        return view( 'user.index', compact( 'dt', 'territories' ) );
    }


    public function getEndTime( $currentTime ) {
        $dt = Carbon::createFromDate( $currentTime )->timezone( 'Europe/Kiev' );

        return $dt->addMonth( 4 );
    }

}
