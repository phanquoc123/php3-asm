@extends('clients.layouts.master')
@section('content')
    <div class="content">
        <div class="breadcrumb-section breadcrumb-bg">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 offset-lg-2 text-center">
                        <div class="breadcrumb-text">
                            <p>Fresh and Organic</p>
                            <h1>Check Out Product</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @if ($errors->any())
            <div class="alert alert-danger mt-3">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="checkout-section mt-150 mb-150">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="checkout-accordion-wrap">
                            <div class="accordion" id="accordionExample">
                                <div class="card single-accordion">
                                    <div class="card-header" id="headingOne">
                                        <h5 class="mb-0">
                                            <button class="btn btn-link" type="button" data-toggle="collapse"
                                                data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                Billing Address
                                            </button>
                                        </h5>
                                    </div>

                                    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne"
                                        data-parent="#accordionExample">
                                        <div class="card-body">
                                            <div class="billing-address-form">
                                                <form action="{{ route('checkoutStore') }}" method="POST">
                                                    @csrf
                                                    <p><input name="user_name" type="text" placeholder="Name"
                                                            value="{{ $user_infor->name ?? '' }}"></p>
                                                    <p><input name="user_email" type="email" placeholder="Email"
                                                            value="{{ $user_infor->email ?? '' }}"></p>
                                                    <p><input name="user_adress" type="text" placeholder="Address"></p>
                                                    <p><input name="user_phone" type="tel" placeholder="Phone"></p>


                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card single-accordion">
                                    <div class="card-header" id="headingTwo">
                                        <h5 class="mb-0">
                                            <button class="btn btn-link collapsed" type="button" data-toggle="collapse"
                                                data-target="#collapseTwo" aria-expanded="false"
                                                aria-controls="collapseTwo">
                                                Shipping Address
                                            </button>
                                        </h5>
                                    </div>
                                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo"
                                        data-parent="#accordionExample">
                                        <div class="card-body">
                                            <div class="billing-address-form">

                                                <p><input name="shipping_name" type="text" placeholder="Name"
                                                        value="{{ $user_infor->name ?? '' }}"></p>
                                                <p><input name="shipping_email" type="email" placeholder="Email"
                                                        value="{{ $user_infor->email ?? '' }}"></p>
                                                <p><input name="shipping_adress" type="text" placeholder="Address"></p>
                                                <p><input name="shipping_phone" type="tel" placeholder="Phone"></p>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card single-accordion">
                                    <div class="card-header" id="headingThree">
                                        <h5 class="mb-0">
                                            <button class="btn btn-link collapsed" type="button" data-toggle="collapse"
                                                data-target="#collapseThree" aria-expanded="false"
                                                aria-controls="collapseThree">
                                                Card Details
                                            </button>
                                        </h5>
                                    </div>
                                    <div id="collapseThree" class="collapse" aria-labelledby="headingThree"
                                        data-parent="#accordionExample">
                                        <div class="card-body">
                                            <div class="card-details">


                                                <div class="">
                                                    <div class="cart-table-wrap">
                                                        <table class="cart-table">
                                                            <thead class="cart-table-head">
                                                                <tr class="table-head-row">

                                                                    <th class="product-image">Product Image</th>
                                                                    <th class="product-name">Name</th>
                                                                    <th class="product-price">Price</th>
                                                                    <th class="product-quantity">Quantity</th>

                                                                </tr>
                                                            </thead>
                                                            <tbody>

                                                                @foreach ($cartItems as $item)
                                                                    <tr class="table-body-row">

                                                                        <td class="product-image"><img
                                                                                src="{{ \Storage::url($item->product->image) }}"
                                                                                alt=""></td>
                                                                        <td class="product-name">
                                                                            {{ $item->product->name ?? 'khong ton tai' }}
                                                                        </td>
                                                                        <td class="product-price">
                                                                            {{ number_format($item->product->price) }}</td>
																		<td class="product-quantity">
																				{{ number_format($item->quantity) }}</td>

                                                                    </tr>
                                                                @endforeach

                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>






                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

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
                                        <td>{{ $subtotal  }}</td>
                                    </tr>
                                    <tr class="total-data">
                                        <td><strong>Shipping: </strong></td>
                                        <td>{{ $shipping }}</td>
                                    </tr>
                                    <tr class="total-data">
                                        <td><strong>Total: </strong></td>
                                        <td>{{ $total }}</td>
                                    </tr>
                                </tbody>
                            </table>
                            <div class="cart-buttons">

                                <button  style="  background-color: #F28123;
 								border: none;
  								color: white;
  								padding: 12px 30px;
  								text-align: center;
  								text-decoration: none;
  								display: inline-block;
  								font-size: 16px;
  								margin: 4px 2px;

  								border-radius: 12px;
  								cursor: pointer;" 
  								type="submit" class="boxed-btn black">Place Order</button>

                                </form>
                            </div>
                           
                        </div>
                        <form action="{{ route('payment_vnpay') }}" method="POST">

                            @csrf
                           
                            <input type="hidden" name="total" value="{{ $total }}">
                            <button type="submit" name="redirect" style=" background-color: #F28123;
                            border: none;
                             color: white;
                             padding: 12px 30px;
                             text-align: center;
                             text-decoration: none;
                             display: inline-block;
                             font-size: 16px;
                             margin: 4px 2px;

                             border-radius: 12px;
                             cursor: pointer;" 
                              class="boxed-btn black">VNPAY Payment</button>
                        </form>
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
