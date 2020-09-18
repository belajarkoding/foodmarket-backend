<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Food;
use App\Helpers\ResponseFormatter;

class FoodController extends Controller
{
    public function all(Request $request)
    {
        $id = $request->input('id');
        $limit = $request->input('limit', 6);
        $name = $request->input('name');
        $types = $request->input('types');

        $price_from = $request->input('price_from');
        $price_to = $request->input('price_to');

        $rate_from = $request->input('rate_from');
        $rate_to = $request->input('rate_to');

        if($id)
        {
            $food = Food::find($id);

            if($food)
                return ResponseFormatter::success(
                    $food,
                    'Data produk berhasil diambil'
                );
            else
                return ResponseFormatter::error(
                    null,
                    'Data produk tidak ada',
                    404
                );
        }

        $food = Food::query();

        if($name)
            $food->where('name', 'like', '%' . $name . '%');

        if($types)
            $food->where('types', 'like', '%' . $types . '%');

        if($price_from)
            $food->where('price', '>=', $price_from);

        if($price_to)
            $food->where('price', '<=', $price_to);

        if($rate_from)
            $food->where('rate', '>=', $rate_from);

        if($rate_to)
            $food->where('rate', '<=', $rate_to);

        return ResponseFormatter::success(
            $food->paginate($limit),
            'Data list produk berhasil diambil'
        );
    }
}
