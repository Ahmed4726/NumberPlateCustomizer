<?php

namespace App\Http\Controllers;

use App\Models\Flag;
use Illuminate\Http\Request;
use App\Models\NumberPlate;
use App\Models\Product;

class NumberPlateController extends Controller
{
    public function index()
    {
        // dd('ok');
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

    public function getFlags(Request $request)
    {
        $flag = Flag::where('name', $request->flag_name)->first();

        if ($flag) {
            return response()->json([
                'front_flag' => $flag->front_flag, // URL stored in DB
                'back_flag' => $flag->back_flag    // URL stored in DB
            ]);
        }

        return response()->json(['error' => 'Flag not found'], 404);
    }

    public function getPlatePrices(Request $request)
    {
        // Default price values
        $plateType = $request->plate_type;
        $border = $request->border;
        $flag = $request->flag;
        $style = $request->style;

        // Fetch prices from the products table
        $basePrice = Product::where('name', 'printed')->value('price');
        $frontPrice = Product::where('name', 'front')->value('price');
        $rearPrice = Product::where('name', 'rear')->value('price');
        $borderPrice = Product::where('name', 'border')->value('price');
        $flagPrice = Product::where('name', 'flag')->value('price'); // Flag-specific price
        $stylePrice = Product::where('name', $style)->value('price');

        // Calculate total price
        $totalPrice = 0;

        if ($plateType === 'both') {
            $totalPrice += ($frontPrice + $rearPrice);
        } elseif ($plateType === 'front') {
            $totalPrice += $frontPrice;
        } elseif ($plateType === 'rear') {
            $totalPrice += $rearPrice;
        }

        if ($border === 'border') {
            $totalPrice += $borderPrice;
        }

        if ($flag !== 'none') {
            $totalPrice += $flagPrice;
        }

        if ($style !== 'normal') {
            $totalPrice += $stylePrice;
        }

        return response()->json([
            'total_price' => $totalPrice
        ]);
    }
}
