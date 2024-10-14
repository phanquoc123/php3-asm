@extends('clients.layouts.master')
@section('content')

<div class="breadcrumb-section breadcrumb-bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2 text-center">
                <div class="breadcrumb-text">
                    <p>Fresh and Organic</p>
                    <h1>Shop Search</h1>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="product-section mt-150 mb-150">
    <div class="container">

        <div class="row">
            <div class="col-md-12">
                <div class="product-filters">
                    <ul>
                        <li  data-filter="*">All</li>
                        @foreach ($categories as $cate)
                        <a href="{{ route('shopByCategory', $cate->id) }}"><li>{{$cate->name}}</li></a>
                        @endforeach

                    </ul>
                </div>
            </div>
        </div>

        <div class="row product-lists">

            @if ($products->count() > 0)
            {{-- <ul>
                @foreach ($products as $product)
                    <li>{{ $product->name }}</li>
                @endforeach
            </ul>
            {{ $products->links() }} --}}
       
            @foreach ($products as $item)
                
        
            <div class="col-lg-4 col-md-6 text-center strawberry">
                <div class="single-product-item">
                    <div class="product-image">
                        <a href="{{ route('detail', $item->id) }}"><img src="{{ \Storage::url ($item->image)	 }}" alt=""></a>
                    </div>
                    <h3>{{ $item->name }}</h3>
                    <p class="product-price"><span>Per Kg</span> {{number_format($item->price)  }} </p>
                    <a href="cart.html" class="cart-btn"><i class="fas fa-shopping-cart"></i> Add to Cart</a>
                </div>
            </div>
            @endforeach
            @else
         <h4 style="margin-left:40%">Không thấy sản phẩm</h4>
        @endif

          
        </div>

        {{-- <div class="row">
            <div class="col-lg-12 text-center">
                <div class="pagination-wrap">
                    <ul>
                        <li><a href="#">Prev</a></li>
                        <li><a href="#">1</a></li>
                        <li><a class="active" href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#">Next</a></li>
                    </ul>
                </div>
            </div>
        </div> --}}
    </div>
</div>
    
@endsection