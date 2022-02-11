<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\OrderResource;
use App\Http\Resources\PositionResource;
use App\Models\Order;
use App\Models\Position;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class OrderController extends Controller
{
    public function index()
    {
        return OrderResource::collection(Auth::user()->orders);
    }

    public function store(Request $request)
    {
        if (is_null(Auth::user()->company_id)) {
            abort(Response::HTTP_FORBIDDEN);
        }

        $order = Order::create([
            'user_id' => Auth::id(),
            'company_id' => Auth::user()->company_id,
            'delivery_address' => $request->delivery_address,
            'payment_method' => $request->payment_method,
            'status' => 'waiting'
        ]);

        foreach (array_keys($request->order) as $productId) {
            $product = Product::find($productId);

            if (!$product) {
                continue;
            }

            for ($i = 0; $i < $request->order[$productId]; $i++) {
                Position::create([
                    'order_id' => $order->id,
                    'product_id' => $product->id,
                    'price' => $product->price
                ]);
            }
        }

        return new OrderResource($order);
    }

    public function show($id)
    {
        return PositionResource::collection(Order::find($id)->positions);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
