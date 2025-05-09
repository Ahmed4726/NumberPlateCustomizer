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
        $plateType = $request->plate_type;
        $border = $request->border;
        $flag = $request->flag;
        $style = $request->style;

        // Base price depending on the plate type
        $product = Product::where('name', $style)->first();
        $totalPrice = 0;

        if (!$product) {
            return response()->json(['total_price' => 0]);
        }

        if ($plateType === 'both') {
            $totalPrice += (float) $product->pair_price;
        } elseif ($plateType === 'front') {
            $totalPrice += (float) $product->front_plate_price;
        } elseif ($plateType === 'rear') {
            $totalPrice += (float) $product->back_plate_price;
        }

        // Border price
        if ($border !== 'none') {
            $borderProduct = Product::where('name', 'border')->first();
            if ($borderProduct) {
                $totalPrice += (float) $borderProduct->pair_price;
            }
        }

        // Flag price
        if ($flag !== 'none') {
            $flagProduct = Product::where('name', 'flag')->first();
            if ($flagProduct) {
                $totalPrice += (float) $flagProduct->pair_price;
            }
        }

        return response()->json([
            'total_price' => $totalPrice,
            'is_pair_only' => $product->is_pair_only,
        ]);

    }

}
