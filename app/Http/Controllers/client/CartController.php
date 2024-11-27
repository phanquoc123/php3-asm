<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Product;
use App\Models\User;
// use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PHPUnit\Framework\Attributes\BackupGlobals;

class CartController extends Controller
{

   public function index(CartItem $cartItem)
   {

      try {
         $categories = DB::table('categories')->get();
         if (auth()->check()) {
            // Người dùng đã đăng nhập
            $user = auth()->user(); // Lấy thông tin người dùng hiện tại
            // ... thực hiện các hành động khác ...
         }
         // Lấy ra giỏ hàng của tài khoản đang đăng nhập
         // $cart = Cart::where('user_id', $user->id)->first();
       
         // // Lấy ID của giỏ hàng đó
         // $cartId = $cart->id;
        
         // // Lấy ra các sản phẩm trong giỏ hàng đó
         // $cartItems = CartItem::find($cartId)->get();
         // dd($cartItems);
       
         $cart = Cart::with('cartItems')->where('user_id', $user->id)->first();
         $cartItems = $cart->cartItems;


         $subtotal = 0;
         $shipping = 0;
         $total = 0;
         foreach ($cartItems as $cartItem) {
            $product = $cartItem->product;
            $subtotal +=  $product->price * $cartItem->quantity;
            $shipping = ($subtotal / 100) * 5;
            $total = $subtotal + $shipping;
         }
       
    
         return view(
            'clients.cart',
            compact('cartItems', 'categories',),
            [
          
               'subtotal' => $subtotal,
               'shipping' => $shipping,
               'total' => $total,
            ]
         );
      } catch (\Throwable $th) {
         return 'khong cos san pham';
      }
   }

   public function addToCart(Request $request)
   {

      if (auth()->check()) {
         // Người dùng đã đăng nhập
         $user = auth()->user(); // Lấy thông tin người dùng hiện tại
         // ... thực hiện các hành động khác ...
      }
      
     
         // Cart::query()->create([
         //    'user_id' =>  $user->id,

         // ]);
         // $cart = Cart::where('user_id', $user->id)->first();

         $cart = Cart::firstOrCreate(['user_id' => $user->id]);
         //// Check xem nếu có gior hàng chưa , chưa thì tạo 
  
      /// Kiểm tra xem sản phẩm đã có trong giỏ hàng chưa
      $cartItemsExist = CartItem::where('cart_id', $cart->id)->where('product_id', $request->productID)->first();

      // nếu đã có thì update số lượng lên
      if ($cartItemsExist) {

         $cartItemsExist->quantity += $request->quantity;

         $cartItemsExist->save();
      }
      // chưa thì sẽ tạo mới sản phẩm trong giỏ
      else {

         CartItem::query()->create([
            'cart_id' => $cart->id,
            'product_id' => $request->input('productID'),
            'quantity' => $request->quantity,
         ]);

      };


      return back()->with('message', 'Đã thêm sản phẩm vào giỏ hàng');
   }

   public function removeCartItem($id)
   {

      $cartItem = CartItem::findOrFail($id);

      $cartItem->delete();

      return redirect()->back();
   }

   function clearCart(){
      if (auth()->check()) {
         // Người dùng đã đăng nhập
         $user = auth()->user(); // Lấy thông tin người dùng hiện tại
         // ... thực hiện các hành động khác ...
     }
     $cart = Cart::with('cartItems')->where('user_id', $user->id)->first();
     $cartItems = $cart->cartItems;
     foreach($cartItems as $cartItem){
      $cartItem->delete();
     }


      return redirect()->back();

   }






}
