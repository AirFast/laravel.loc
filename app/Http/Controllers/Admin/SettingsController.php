<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use App\Models\User;

class SettingsController extends Controller {

    public function __construct() {
        $this->middleware( [ 'auth', 'verified', 'admin' ] );
    }

    public function index() {
        $admins = User::where( 'role_id', 1 )->get();

        return view( 'admin.index', compact( 'admins' ) );
    }

    public function update() {

        $data = request()->validate( [
            'count_per_page'          => 'required|numeric|min:1|max:100',
            'stand_time_start'        => 'required|numeric|min:0|max:23',
            'stand_time_end'          => 'required|numeric|min:0|max:23',
            'global_admin_message'    => '',
            'territory_admin_email'   => '',
            'map_zoom'                => 'required|numeric|min:1|max:20',
            'map_zoom_control'        => 'boolean',
            'map_type_control'        => 'boolean',
            'map_street_view_control' => 'boolean',
            'map_full_screen_control' => 'boolean',
            'map_scroll_wheel'        => 'boolean',
        ] );

        $data['map_zoom_control']        = request()->has( 'map_zoom_control' );
        $data['map_type_control']        = request()->has( 'map_type_control' );
        $data['map_street_view_control'] = request()->has( 'map_street_view_control' );
        $data['map_full_screen_control'] = request()->has( 'map_full_screen_control' );
        $data['map_scroll_wheel']        = request()->has( 'map_scroll_wheel' );

        foreach ( $data as $key => $val ) {

            $setting        = Setting::where( 'name', $key )->first();
            $setting->value = $data[ $key ];
            $setting->update();

        }

        return back()->with( 'status', __( 'adminpanel.admin.settings.status' ) );

    }

}
