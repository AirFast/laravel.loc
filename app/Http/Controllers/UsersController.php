<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller {


    public function __construct() {
        $this->middleware( 'admin' );
    }


    public function index() {
        $users = User::paginate( 5 );

        return view( 'admin.users.index', compact( 'users' ) );
    }


    public function create() {
        $roles = Role::all();

        return view( 'admin.users.create', compact( 'roles' ) );
    }


    public function store() {
        $data = request()->validate( [
            'name'     => 'required|string|max:255',
            'role_id'  => 'required|numeric',
            'email'    => 'required|string|email|max:255|unique:users',
            'phone'    => '',
            'password' => 'required|string|min:8|confirmed',
        ] );

        $data['password'] = Hash::make( $data['password'] );

        $user = User::create( $data );

        return redirect( route( 'admin.users.index', app()->getLocale() ) )->with( [ 'create' => 'User ' . $user->name . ' has been successfully added!' ] );
    }


    public function show( $locale, User $user ) {
        $id = $user->id;

        return view( 'admin.users.show', compact( 'id', 'user' ) );
    }


    public function edit( $locale, User $user ) {
        $id = $user->id;
        $roles = Role::all();

        return view( 'admin.users.edit', compact( 'id', 'user', 'roles' ) );
    }


    public function update( Request $request, $id ) {
        //
    }


    public function destroy( $id ) {
        //
    }

}
