<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller {


    public function __construct() {
        $this->middleware( 'admin' );
    }


    public function index() {
        $users = User::paginate(1);

        return view('admin.users.index', compact('users'));
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
