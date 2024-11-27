@extends('clients.layouts.master')
@section('content')
<div class="breadcrumb-section breadcrumb-bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2 text-center">
                <div class="breadcrumb-text">
                    <p>See more Details</p>
                    <h1>Single Product</h1>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="mt-5">
    @if (session('message'))
    <div class="alert alert-success">
        {{ session('message') }}
    </div>
    
@endif
</div>

 {{-- single-product --}}
<div class="single-product mt-150 mb-150">
    <div class="container">
     
           
        <div class="row">
            <div class="col-md-5">
                <div class="single-product-img">
                    <img src="{{ \Storage::url ($product->image)	 }}" alt="">
                </div>
            </div>
            <div class="col-md-7">
                <div class="single-product-content">
                    <h3>{{$product->name }}</h3>
                    <p class="single-product-pricing"><span>Per Kg</span>{{$product->price }}</p>
                    <p>{{$product->description }}</p>
                    <div class="single-product-form">
                        <form  action="{{ route('addToCart') }}" method="post">
                            @csrf
                        
                            <input name="quantity" type="number" placeholder="0" value="1" min="1"> <br>
                     
                            <input name="productID" type="hidden"  value="{{$product->id}}">

                        <button style="border: none; border-radius:50px;height:49px" type="submit"><a  class="cart-btn"><i class="fas fa-shopping-cart"></i> Add to Cart
                       
                        
                      
                    </a>
                </button>
                    </form>
                        <p><strong>Categories: </strong>{{ $product->category->name }}</p>
                    </div>
                    <h4>Share:</h4>
                    <ul class="product-share">
                        <li><a href=""><i class="fab fa-facebook-f"></i></a></li>
                        <li><a href=""><i class="fab fa-twitter"></i></a></li>
                        <li><a href=""><i class="fab fa-google-plus-g"></i></a></li>
                        <li><a href=""><i class="fab fa-linkedin"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>

       
</div>

<div class="more-products mb-150 mt-150">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2 text-center">
                <div class="section-title">	
                    <h3><span class="orange-text">Related</span> Products</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid, fuga quas itaque eveniet beatae optio.</p>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach ($relatedProducts as $relatedPr)
                
            @endforeach
            <div class="col-lg-4 col-md-6 text-center">
                <div class="single-product-item">
                    <div class="product-image">
                        <a href="{{ route('detail', $relatedPr->id) }}"><img src="{{ \Storage::url($relatedPr->image)}}" alt=""></a>
                    </div>
                    <h3>{{ $relatedPr->name }}</h3>
                    <p class="product-price"><span>Per Kg</span> {{ number_format($relatedPr->price) }}</p> 
                    <a href="cart.html" class="cart-btn"><i class="fas fa-shopping-cart"></i> Add to Cart</a>
                </div>
            </div>
           
        </div>
       
    </div>
</div>


    
@endsection