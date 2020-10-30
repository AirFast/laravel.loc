<?php

namespace App\Http\Controllers;

use App\Models\Stand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StandsController extends Controller {

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
            'time'      => 'required|numeric',
            'date'      => 'required',
            'user_id_1' => 'required_if:user_id_2,null|required_if:user_id_1,' . Auth::user()->id,
            'user_id_2' => 'required_if:user_id_1,null|required_if:user_id_2,' . Auth::user()->id
        ] );

        dd($stand);
    }

}
