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
										<a  onclick="removeCartItem({{ $item->rowId }})">
											<i class="far fa-window-close"></i>
										</a>
									</td>
									<td class="product-image"><img src="{{ \Storage::url($item->model->image) }}" alt=""></td>
									<td class="product-name">{{$item->name}}</td>
									<td class="product-price">{{$item->price}}</td>
									<td class="product-quantity"><input type="number" name="quantity" data-rowId="{{$item->rowId}}" onchange="updateQuantityCart(this)" value="{{ $item->qty }}" ></td>
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
									<td><strong>Subtotal: </strong></td>
									<td>{{ Cart::instance('cart')->subtotal() }}</td>
								</tr>
								<tr class="total-data">
									<td><strong>Shipping: </strong></td>
									<td>{{ Cart::instance('cart')->tax() }}</td>
								</tr>
								<tr class="total-data">
									<td><strong>Total: </strong></td>
									<td>{{ Cart::instance('cart')->total() }}</td>
								</tr>
							</tbody>
						</table>
						<div class="cart-buttons">
							
								<a onclick="clearAllCart()"  class="boxed-btn">Clear Cart
							 	
								</a>
					
						
							<a href="checkout.html" class="boxed-btn black">Check Out</a>
						</div>
					</div>

					{{-- Update QuantityCart --}}

					<form id="updateQuantityCart" action="{{ route('updateQuantityCart') }}" method="POST">
						@csrf
						@method('PUT')
						<input type="hidden" id="rowId" name="rowId">
						<input type="hidden" id="quantity" name="quantity">
					</form>

					<form id="removeCartItem" action="{{ route('removeCartItem') }}" method="POST">
						@csrf
						@method('DELETE')
						<input type="hidden" id="rowId_R" name="rowId">
						
					</form>

					<form id="clearAllCart" action="{{ route('clearAllCart') }}" method="POST">
						@csrf
						@method('DELETE')
						<input type="hidden" id="rowId_C" name="rowId">
						
					</form>

				

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
@push('scripts')

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


	
@endpush