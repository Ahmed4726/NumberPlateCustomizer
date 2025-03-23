<?php

namespace App\Http\Controllers;

use App\Models\CartItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CartController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'plate_text' => 'required|string|max:10',
            'plate_type' => 'required|string',
            'plate_border' => 'nullable|string',
            'plate_flag' => 'nullable|string',
            'plate_style' => 'nullable|string',
            'front_plate' => 'nullable|string',
            'back_plate' => 'nullable|string',
        ]);

        $frontImagePath = $this->saveImage($request->front_plate, 'front_plate');
        $rearImagePath = $this->saveImage($request->back_plate, 'rear_plate');

        CartItem::create([
            'user_id' => auth()->id(),
            'plate_text' => $request->plate_text,
            'plate_type' => $request->plate_type,
            'plate_border' => $request->plate_border,
            'plate_flag' => $request->plate_flag,
            'plate_style' => $request->plate_style,
            'front_image' => $frontImagePath,
            'rear_image' => $rearImagePath,
        ]);

        return response()->json(['message' => 'Added to cart']);
    }

    public function index()
    {
        $cartItems = CartItem::where('user_id', auth()->id())->get();
        return view('cart.index', compact('cartItems'));
    }

    public function destroy($id)
    {
        $cartItem = CartItem::findOrFail($id);
        if ($cartItem->user_id == auth()->id()) {
            // Delete stored images
            if ($cartItem->front_image) {
                Storage::disk('public')->delete($cartItem->front_image);
            }
            if ($cartItem->rear_image) {
                Storage::disk('public')->delete($cartItem->rear_image);
            }

            $cartItem->delete();
        }
        return redirect()->route('cart.index');
    }

    private function saveImage($imageData, $prefix)
    {
        if (!$imageData) {
            return null;
        }

        $image = str_replace('data:image/png;base64,', '', $imageData);
        $image = str_replace(' ', '+', $image);
        $imageName = $prefix . '_' . time() . '.png';
        Storage::disk('public')->put($imageName, base64_decode($image));

        return 'storage/' . $imageName;
    }
}
