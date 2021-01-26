<?php

namespace App\Providers;

use App\Models\Setting;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider {
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register() {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot() {

        if ( env( 'APP_ENV' ) !== 'local' ) {
            //URL::forceScheme( 'https' );
            $this->app['request']->server->set('HTTPS', true);
        }

        if ( Schema::hasTable( 'settings' ) ) {

            config( [
                'settings' => Setting::all( [ 'name', 'value' ] )->keyBy( 'name' )->transform( function ( $setting ) {
                    return $setting->value;
                } )->toArray()
            ] );

        }

        Paginator::defaultView( 'layouts.paginator' );
    }
}
