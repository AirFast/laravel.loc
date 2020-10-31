<?php

namespace App\Http\Controllers;

use App\Models\Stand;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StandsController extends Controller {

    public function __construct() {
        $this->middleware('user');
    }

    public function index(Request $request) {

        $now = Carbon::now()->timezone('Europe/Kiev');
        $dt = Carbon::createFromDate($request->query('date', $now->toDateString()))->timezone('Europe/Kiev');

        $startOfWeek = $dt->clone()->startOfWeek();
        $endOfWeek = $dt->clone()->endOfWeek();

        $stands = Stand::where('date', $dt->toDateString())->get();

        return view('stand.index', compact('now', 'dt', 'startOfWeek', 'endOfWeek', 'stands'));

    }

    public function store() {

        $data = request()->validate( [
            'time'      => 'required|numeric',
            'date'      => 'required',
            'user_id_1' => 'required_if:user_id_2,null|required_if:user_id_1,' . Auth::user()->id,
            'user_id_2' => 'required_if:user_id_1,null|required_if:user_id_2,' . Auth::user()->id
        ] );

        $standRecord = Stand::where([['date', $data['date']], ['time', $data['time']]])->exists();

        if($standRecord) {
            return $this->update();
        }

        Stand::create( $data );

        return back()->with(['message' => Auth::user()->name . ', you are recorded in the ministry with the stand. Thanks!']);
    }

    public function update(Stand $stand) {

        $data = request()->validate( [
            'user_id_1' => 'required_if:user_id_2,null|required_if:user_id_1,' . Auth::user()->id,
            'user_id_2' => 'required_if:user_id_1,null|required_if:user_id_2,' . Auth::user()->id
        ] );

        if (!empty($stand->user_id_1) && ($stand->user_id_1 == $data['user_id_1'])) {
            $stand->user_id_1 = null;
            $stand->update();

            return back()->with(['message' => '1']);
        }

        if (!empty($data['user_id_1'])) {
            $stand->user_id_1 = $data['user_id_1'];
            $stand->update();

            return back()->with(['message' => '2']);
        }

        if (!empty($stand->user_id_2) && ($stand->user_id_2 == $data['user_id_2'])) {
            $stand->user_id_2 = null;
            $stand->update();

            return back()->with(['message' => '3']);
        }

        if (!empty($data['user_id_2'])) {
            $stand->user_id_2 = $data['user_id_2'];
            $stand->update();

            return back()->with(['message' => '4']);
        }
    }

}
