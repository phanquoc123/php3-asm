<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

use function Laravel\Prompts\alert;

class OrderController extends Controller
{
    public function checkout(){

        $categories = DB::table('categories')->get();
  
        if (auth()->check()) {
           // Người dùng đã đăng nhập
           $user = auth()->user(); // Lấy thông tin người dùng hiện tại
           // ... thực hiện các hành động khác ...
        }
         
      
      
        $cart = Cart::with('cartItems')->where('user_id', $user->id)->first();
        $cartItems = $cart->cartItems;
        if($cartItems->isEmpty()){
         return back()->with('erorr','Giỏ hàng đang trống.Vui lòng chọn sản phẩm ');
      }
  
  
        $subtotal = 0;
        $shipping = 0;
        $total = 0;
        foreach ($cartItems as $cartItem) {
           $product = $cartItem->product;
           $subtotal +=  $product->price * $cartItem->quantity;
           $shipping = ($subtotal / 100) * 5;
           $total = $subtotal + $shipping;
        }
  
        $user_infor = User::select('name', 'email')->find($user->id);
      
        return view(
           'clients.checkout',
           compact('cartItems', 'categories','user_infor'),
           [
              
              'subtotal' => $subtotal,
              'shipping' => $shipping,
              'total' => $total,
           ]
        );
  
     }


     public function checkoutStore(Request $request){

        if (auth()->check()) {
            // Người dùng đã đăng nhập
            $user = auth()->user(); // Lấy thông tin người dùng hiện tại
            // ... thực hiện các hành động khác ...
         }

         $validator = Validator::make($request->all(), [
            'user_name' => 'required|string|max:255',
            'user_email' => 'required|email|max:255',
            'user_phone' => 'required',
            'user_adress' => 'required|string|max:255',
            'shipping_name' => 'required|string|max:255',
            'shipping_email' => 'required|email|max:255',
            'shipping_adress' => 'required|string|max:255',
            'shipping_phone' => 'required',
        ]);
        
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }else{
           /// tạo đơn hàng  
         $order = new Order();
          
         $order->user_id = $user->id;
         $order->user_name = $request->user_name;
         $order->user_email = $request->user_email;
         $order->user_phone = $request->user_phone;
         $order->user_adress = $request->user_adress;
         $order->shipping_name = $request->shipping_name;
         $order->shipping_email = $request->shipping_email;
         $order->shipping_adress = $request->shipping_adress;
         $order->shipping_phone = $request->shipping_phone;
         $order->status_delivery = '0'; // Mặc định là trạng thái đang xử lý
         $order->status_payment = '1'; // PTTT là thanh toán khi nhận hàng
       
         $order->save();

        }
     
           /// Xem chi tiết đơn hàng , thêm dữ liệu  vào bảng order_items

            $cart = Cart::with('cartItems')->where('user_id', $user->id)->first();
            $cartItems = $cart->cartItems;
           

            DB::transaction(function () use ($cartItems , $order){

               foreach($cartItems as $cartItem){

                  $orderItem = new OrderItem();
                  $orderItem->order_id = $order->id;
                  $orderItem->product_id = $cartItem->product_id;
                  $orderItem->quantity = $cartItem->quantity;
                  $orderItem->price = $cartItem->product->price;
                  $orderItem->save();
                  
                  /// Trừ đi sản phâmr trong kho
                  $product = Product::where('id',$cartItem->product_id)->first();
                  $product->remaining_quantity -= $cartItem->quantity;
                  $product->save();
                  // Xóa các sản phẩm trong giỏ hàng 
                  $cartItem->delete();
        
               }
                 
            });
            alert('Đặt hàng thành công');
            return redirect()->route('home');
       
     }
}
