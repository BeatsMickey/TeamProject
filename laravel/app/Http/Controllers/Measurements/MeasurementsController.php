<?php

namespace App\Http\Controllers\Measurements;

use App\Http\Controllers\Controller;
use App\Model\Measurements;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MeasurementsController extends Controller
{
    public function index() {
        $measurements = Measurements::all();
        return view('measurements.measurements', ['measurements' => $measurements]);
    }

    public function addMeasurements(Request $request) {
        $measurements = New Measurements($request->all());
        $measurements->fill(['user_id' => Auth::id()]);
        $measurements->save();
        return redirect()->route('measurements.index');
    }

    public function delMeasurements(int $id) {
        $measurements = Measurements::find($id);
        $measurements->delete();
        return redirect()->route('measurements.index');
    }
}
