<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;

class SettingsController extends Controller {

    public function __construct() {
        $this->middleware( 'admin' );
    }

    public function index() {
        $users = User::all();

        return view( 'admin.index', compact( 'users' ) );
    }

}
