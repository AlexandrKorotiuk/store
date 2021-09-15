<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\OrderProduct;


class OrderController extends Controller
{
    public function order(Request $request)
    {
        // Log::debug($request->all());
        // $validator = Validator::make($request->all(), [
        //     'user_id' => 'required|between:0,1000',
        //     'is_paid' => 'required|max:100',
           
        // ]);

        // if ($validator->fails()) {
        //     return response()->json(array(
        //         "status" => false,
        //         "errors" => $validator->errors()
        //     ), 400);
        // }
        //     Order::create(array_merge(
        //     $validator->validated(),
        // ));

        Log::debug($request->all());
        $validator = Validator::make($request->all(), [
            'product_id' => 'required|max:100',
            'count' => 'required|between:1,10',
        ]);

        if ($validator->fails()) {
            return response()->json(array(
                "status" => false,
                "errors" => $validator->errors()
            ), 400);
        }
        OrderProduct::create(array_merge(
            $validator->validated(),
        ));
    }

}
