<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\Stand;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller {
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index() {
        $dt     = Carbon::now()->timezone( 'Europe/Kiev' );
        $stands = Stand::where( 'date', $dt->toDateString() )->get();

        return view( 'home', compact( 'dt', 'stands' ) );
    }
}
