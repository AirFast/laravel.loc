<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class Users extends Controller {


    public function __construct() {
        $this->middleware( 'user' );
    }


    public function index() {
        $users = User::all();


    }


    public function create() {
        //
    }


    public function store(Request $request) {
        //
    }


    public function show($id) {
        //
    }


    public function edit($id) {
        //
    }


    public function update(Request $request, $id) {
        //
    }


    public function destroy($id) {
        //
    }

}
