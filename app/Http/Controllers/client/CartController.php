<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{

   protected $cart;
   // protected $rowId;


   public function __construct(Cart $cart)
   {
      $this->cart = $cart;
   }
   public function index(){
    $categories = DB::table('categories')->get();

   //  $cartItems = Cart::instance('cart')->content();
    $cartItems = Cart::instance('cart')->content();

   //  dd($cartItems);



    return view('clients.cart' , compact('categories','cartItems')  );

   }

   public function addToCart(Request $request){

    $product = Product::findOrFail($request->id);
    $cartItems = Cart::instance('cart')->add($product->id, $product->name,$request->quantity,$product->price)->associate('App\Models\Product');
    return redirect()->back()->with('message','Add to cart success');

   }

   public function updateQuantity(Request $request){

   $cartItems = Cart::instance('cart')->content();

   foreach ($cartItems as $item) {
    $rowId = $item->rowId ; // In ra rowId của sản phẩm
   }

      Cart::instance('cart')->update($rowId, $request->quantity);
      return redirect()->route('cart');

   }


   public function removeCartItem(){

      $cartItems = Cart::instance('cart')->content();

      foreach ($cartItems as $item) {
       $rowId = $item->rowId ; // In ra rowId của sản phẩm
      }
      Cart::instance('cart')->remove($rowId);
      return redirect()->route('cart');
      



   }

   public function clearAllCart(){
      Cart::instance('cart')->destroy();
      return redirect()->route('cart');
   }


}
