<?php

namespace App\Http\Controllers;

use App\Models\Stand;
use Carbon\Carbon;

class HomeController extends Controller {

    public function __construct() {
        $this->middleware(['auth','verified']);
    }

    public function index() {
        $dt     = Carbon::now()->timezone( 'Europe/Kiev' );
        $stands = Stand::where( 'date', $dt->toDateString() )->get();

        return view( 'home', compact( 'dt', 'stands' ) );
    }

}
