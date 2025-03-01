<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NumberPlate;

class NumberPlateController extends Controller
{
    public function index()
    {
        return view('customizer');
    }

    public function store(Request $request)
    {
        $plate = new NumberPlate();
        $plate->plate_type = $request->plate_type;
        $plate->flag = $request->flag;
        $plate->border = $request->border ? true : false;
        $plate->layout = $request->layout;
        $plate->save();

        return response()->json(['message' => 'Customization saved!', 'plate' => $plate]);
    }
}
