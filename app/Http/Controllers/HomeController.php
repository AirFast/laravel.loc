<?php

namespace App\Http\Controllers;

use App\Models\Stand;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $today = Carbon::today();
        $currentDate = Carbon::createFromDate($request->query('date', $today->toDateString()));

        $dt = $currentDate->timezone('Europe/Kiev');
        $startOfWeek = $dt->clone()->startOfWeek();
        $endOfWeek = $dt->clone()->endOfWeek();

        $standRow = Stand::where('date', $currentDate->toDateString())->get();

        return view('home.index', compact('today', 'dt', 'startOfWeek', 'endOfWeek', 'standRow'));
    }
}
