<?php

use Carbon\Carbon;
use Carbon\CarbonImmutable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get( '/', [ App\Http\Controllers\HomeController::class, 'index' ] );
Route::get( '/time', function (){

    echo $today = Carbon::today();

    $dayOfWeek = $today->dayOfWeek;

    echo $tempDate = $today->startOfWeek();

    for($i=1; $i <= 7; $i++) {

        if ($i == $dayOfWeek) {
            echo $tempDate->day . 'active';
            echo '</br>';
        }
        echo '</br>';
        echo $tempDate->day;
        echo '</br>';
        $tempDate->addDay();
    }

    echo '<h1 class="w3-text-teal"><center>' . $today->format('F Y') . '</center></h1>';

    $tempDate = Carbon::createFromDate($today->year, $today->month, 1);



    echo '<table border="1" class = "w3-table w3-boarder w3-striped">
           <thead><tr class="w3-theme">
           <th>Sun</th>
           <th>Mon</th>
           <th>Tue</th>
           <th>Wed</th>
           <th>Thu</th>
           <th>Fri</th>
           <th>Sat</th>
           </tr></thead>';

    $skip = $tempDate->dayOfWeek;

    for($i = 0; $i < $skip; $i++)
    {
        echo $tempDate->subDay();
        echo '</br>';
    }


    //loops through month
    do
    {
        echo '<tr>';
        //loops through each week
        for($i=0; $i < 7; $i++)
        {
            echo '<td><span class="date">';

            echo $tempDate->day;

            echo '</span></td>';

            $tempDate->addDay();
        }
        echo '</tr>';

    }while($tempDate->month == $today->month);

    echo '</table>';

    function renderCalendar($dt) {
        // Make sure to start at the beginnen of the month
        $dt->startOfMonth();

        // Set the headings (weeknumber + weekdays)
        $headings = ['Weeknumber', 'Mondag', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saterday', 'Sunday'];

        // Create the table
        $calendar = '<table class="calendar">';
        $calendar .= '<caption>'.$dt->format('F Y').'</caption>';
        $calendar .= '<tr>';

        // Create the calendar headings
        foreach ($headings as $heading) {
            $calendar .= '<th class="header">'.$heading.'</th>';
        }

        // Create the rest of the calendar and insert the weeknumber
        $calendar .= '</tr><tr>';
        $calendar .= '<td>'.$dt->weekOfYear.'</td>';

        // Day of week isn't monday, add empty preceding column(s)
        if ($dt->format('N') != 1) {
            $calendar .= '<td colspan="'.($dt->format('N') - 1).'">&nbsp;</td>';
        }

        // Get the total days in month
        $daysInMonth = $dt->daysInMonth;

        // Go over each day in the month
        for ($i = 1; $i <= $daysInMonth; $i++) {
            // Monday has been reached, start a new row
            if ($dt->format('N') == 1) {
                $calendar .= '</tr><tr>';
                $calendar .= '<td>'.$dt->weekOfYear.'</td>';
            }
            // Append the column
            $calendar .= '<td class="day" rel="'.$dt->format('Y-m-d').'">'.$dt->day.'</td>';

            // Increment the date with one day
            $dt->addDay();
        }

        // Last date isn't sunday, append empty column(s)
        if ($dt->format('N') != 7) {
            $calendar .= '<td colspan="'.(8 - $dt->format('N')).'">&nbsp;</td>';
        }

        // Close table
        $calendar .= '</tr>';
        $calendar .= '</table>';

        // Return calendar html
        return $calendar;
    }

    $dt = Carbon::createFromDate('2020-12-30');

    echo $dt->dayName;

});

// Admin route
Route::prefix('admin')->group(function () {

    Auth::routes();

    Route::middleware(['admin'])->group(function () {
        Route::get('', [ App\Http\Controllers\Admin\DashboardController::class, 'index' ]);
    });

});

// User route
Route::prefix('user')->middleware('user')->group(function () {
    Route::get('', [ App\Http\Controllers\Admin\DashboardController::class, 'index' ]);
});
