@extends('clients.layouts.master')
@section('content')

<div class="breadcrumb-section breadcrumb-bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2 text-center">
                <div class="breadcrumb-text">
                    <p>Fresh and Organic</p>
                    <h1>Shop</h1>
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
{{--                            
                        <li data-filter=".berry">Berry</li>
                        <li data-filter=".lemon">Lemon</li> --}}
                    </ul>
                </div>
            </div>
        </div>

        <div class="row product-lists">

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
          
        </div>

        @if ($products->hasPages())
            
       
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="pagination-wrap">
                    <ul>
                        <li class=" {{ $products->onFirstPage() ? 'disabled' : '' }}"  ><a href="{{ $products->previousPageUrl() }}">Prev</a></li>
                        
                        @foreach ($products->links() as $link)
                        {{-- <li class="page-item {{ $link->active ? 'active' : '' }}">
                            <a class="page-link" href="{{ $link }}">{{ $link }}</a>
                        </li> --}}
                        <li class="{{ $link->active ? 'active' : '' }}"><a href="{{ $link }}">{{ $link }}</a></li>
                        @endforeach
                       
                        {{-- <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li> --}}
                        <li class="{{ $products->hasMorePages() ? '' : 'disabled' }}"><a href="{{ $products->nextPageUrl() }}">Next</a></li>
                    </ul>
                </div>
            </div>
        </div>

        @endif
    </div>
</div>
    
@endsection