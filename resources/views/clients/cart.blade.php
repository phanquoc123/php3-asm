@extends('clients.layouts.master')
@section('content')
    <div class="content">
        <div class="breadcrumb-section breadcrumb-bg">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 offset-lg-2 text-center">
                        <div class="breadcrumb-text">
                            <p>Fresh and Organic</p>
                            <h1>Cart</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-5">
            @if (session('erorr'))
            <div class="alert alert-danger">
                {{ session('erorr') }}
            </div>
            
        @endif
        </div>


        <div class="cart-section mt-150 mb-150">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-md-12">
                        <div class="cart-table-wrap">
                            <table class="cart-table">
                                <thead class="cart-table-head">
                                    <tr class="table-head-row">
                                        <th class="product-remove"></th>
                                        <th class="product-image">Product Image</th>
                                        <th class="product-name">Name</th>
                                        <th class="product-price">Price</th>
                                        <th class="product-quantity">Quantity</th>

                                    </tr>
                                </thead>
                                <tbody>


                                   

                                    @foreach ($cartItems as $item)
                                        <tr class="table-body-row">
                                            <td class="product-remove">
                                                <form action="{{ route('removeCartItem', $item->id) }}" method="post">

                                                    @csrf
                                                    @method('DELETE')
                                                    <button onclick="return confirm('Bạn muốn xóa sản phẩm này ?')"
                                                        type="submit">
                                                        <i class="far fa-window-close"></i>
                                                    </button>
                                                </form>

                                            </td>
                                            <td class="product-image"><img src="{{ \Storage::url($item->product->image) }}"
                                                    alt=""></td>
                                            <td class="product-name">{{ $item->product->name ?? 'khong ton tai' }}</td>
                                            <td class="product-price">{{ number_format($item->product->price) }}</td>
                                            <td class="product-quantity"><input type="number" name="quantity"
                                                    value="{{ $item->quantity }}"></td>

                                            {{-- <td class="product-quantity">
									<a href="{{route('updateQuantityCart', $item-)}}"><input type="number" name="quantity"></a>		
									</td> --}}

                                        </tr>
                                    @endforeach


                                </tbody>
                            </table>
                        </div>
                    </div>



                    <div class="col-lg-4">
                        <div class="total-section">
                            <table class="total-table">
                                <thead class="total-table-head">
                                    <tr class="table-total-row">
                                        <th>Total</th>
                                        <th>Price</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="total-data">
                                        <td><strong>Subtotal:</strong></td>
                                        <td>{{ number_format($subtotal) }}</td>
                                    </tr>
                                    <tr class="total-data">
                                        <td><strong>Shipping: </strong></td>
                                        <td>{{ number_format($shipping) }}</td>
                                    </tr>
                                    <tr class="total-data">
                                        <td><strong>Total: </strong></td>
                                        <td>{{ number_format($total) }}</td>
                                    </tr>
                                </tbody>
                            </table>
                            <div class="cart-buttons">

									<a href="{{route('clearCart')}}" class="boxed-btn" onclick="return confirm('Bạn muốn xóa hết sản phẩm ?')" type="submit">
										Clear Cart
									</a>
						


                                <a href="{{ route('checkout') }}" class="boxed-btn black">Check Out</a>
                            </div>
                        </div>


                        <div class="coupon-section">
                            <h3>Apply Coupon</h3>
                            <div class="coupon-form-wrap">
                                <form action="index.html">
                                    <p><input type="text" placeholder="Coupon"></p>
                                    <p><input type="submit" value="Apply"></p>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
{{-- @push('scripts')

 <script>
	function updateQuantityCart(qty){

		$('#rowId').val($(qty)).data('rowid')
		$('#quantity').val($(qty).val())
		$('#updateQuantityCart').submit()

	}
	function removeCartItem(rowId){

		$('#rowId_R').val(rowId)

		$('#removeCartItem').submit()

}
function clearAllCart(){



$('#clearAllCart').submit()

}
 </script>


	
@endpush --}}
