<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller {

    public function __construct() {
        $this->middleware( 'admin' );
    }


    public function index() {
        $users = User::paginate( config('settings.count_per_page') );

        return view( 'admin.users.index', compact( 'users' ) );
    }


    public function create() {
        $user  = new User();
        $roles = Role::all();

        return view( 'admin.users.create', compact( 'user', 'roles' ) );
    }


    public function store() {
        $data = request()->validate( [
            'name'     => 'required|string|max:255',
            'role_id'  => 'required|numeric',
            'email'    => 'required|string|email|max:255|unique:users',
            'address'  => '',
            'phone'    => '',
            'password' => 'required|string|min:8|confirmed',
        ] );

        $data['password'] = Hash::make( $data['password'] );

        if ( request()->hasFile( 'img_src' ) ) {
            request()->validate( [
                'img_src' => 'file|image|max:5000',
            ] );
        }

        $user = User::create( $data );
        $this->storeImage( $user );

        return redirect( route( 'admin.users.index', app()->getLocale() ) )->with( [ 'create' => __( 'adminpanel.user.alert.create', [ 'name' => $user->name ] ) ] );
    }


    public function show( $locale, User $user ) {
        $id = $user->id;

        return view( 'admin.users.show', compact( 'id', 'user' ) );
    }


    public function edit( $locale, User $user ) {
        $id    = $user->id;
        $roles = Role::all();

        return view( 'admin.users.edit', compact( 'id', 'user', 'roles' ) );
    }


    public function update( $locale, User $user ) {

        $data = request()->validate( [
            'name'    => '',
            'role_id' => 'required|numeric',
            'email'   => '',
            'address' => '',
            'phone'   => '',
        ] );

        if ( request()->hasFile( 'img_src' ) ) {
            request()->validate( [
                'img_src' => 'file|image|max:5000',
            ] );
        }

        $user->update( $data );
        $this->storeImage( $user );

        return redirect( route( 'admin.users.show', [ app()->getLocale(), $user ] ) );

    }


    public function destroy( $locale, User $user ) {
        $user->delete();

        return back()->with( [ 'delete' => __( 'adminpanel.user.alert.delete' ) ] );
    }


    private function storeImage( $user ) {
        if ( request()->hasFile( 'img_src' ) ) {
            $user->update( [
                'img_src' => request()->img_src->store( 'uploads', 'public' ),
            ] );
        }
    }

}
