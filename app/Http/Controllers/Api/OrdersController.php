<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    public function index(){
        $orders = Order::with('items.product')->get();
            $data = [
                'msg' => 'return all data orders table',
                'status' => 200,
                'data' =>$orders
            ];
            return response()->json($data);
    }

    public function destroy($id){
        $order = Order::find($id);
        if(!$order){
            return response()->json([
                'msg' => 'Order not found',
                'status' => 404,
                'data' => null
            ]);
        }
        
        $order->delete();

        return response()->json([
            'msg' => 'Deleted order succssfully',
            'status' => 200,
            'data' => null
        ]);
    }
}
