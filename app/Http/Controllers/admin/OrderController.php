<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\User;
use Illuminate\Http\Request;

class OrderController extends Controller
{

    const PATH_VIEW = 'admin.order.';

    public function index(){
        try {
            $orders = Order::query()->paginate(3);
            // $user = User::all();
            return view(self::PATH_VIEW .'list',compact('orders'));
        } catch (\Throwable $th) {
           return 'khong co don hang';
        }
    }

    public function infor($id){

        $orderDetail = Order::query()->where('id',$id)->first();
        $quantity = OrderItem::query()->where('order_id',$orderDetail->id)->first();
        $quantityOfProductInOrder= $quantity->quantity;
        // dd($quantityOfProductInOrder);
        $productsInOrder = $orderDetail->products;
       
         

        return view(self::PATH_VIEW .'infor',compact('orderDetail','productsInOrder','quantityOfProductInOrder'));
 
    }
   
}
