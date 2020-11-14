<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use App\Models\User;

class SettingsController extends Controller {

    public function __construct() {
        $this->middleware( 'admin' );
    }

    public function index() {
        $users = User::all();

        return view( 'admin.index', compact( 'users' ) );
    }

    public function update() {

        $data = request()->validate( [
            'count_per_page'       => 'required|numeric|min:1|max:100',
            'stand_time_start'     => 'required|numeric|min:0|max:23',
            'stand_time_end'       => 'required|numeric|min:0|max:23',
            'global_admin_message' => '',
        ] );


        foreach ( $data as $key => $val ) {

            $setting = Setting::where('name', $key)->first();
            $setting->value = $data[$key];
            $setting->update();

        }

        return back()->with( 'status', __('adminpanel.admin.settings.status') );

    }

}
