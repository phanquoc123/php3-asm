@extends('clients.layouts.master')
    
@include('clients.layouts.partials.slider')
@include('clients.layouts.partials.underSlider')


@section('content')
 <div class="content">
    <div class="product-section mt-150 mb-150">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2 text-center">
                    <div class="section-title">	
                        <h3><span class="orange-text">Our</span> Products</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid, fuga quas itaque eveniet beatae optio.</p>
                    </div>
                </div>
            </div>
    
            <div class="row">
                @foreach ($products as $item)
                    
               
                <div class="col-lg-4 col-md-6 text-center">
                    <div class="single-product-item">
                        <div class="product-image">
                            <a href="{{ route('detail', $item->id) }}"><img src="{{ \Storage::url ($item->image)	 }}" alt=""></a>
                        </div>
                        <h3>{{$item->name}} </h3>
                        <p class="product-price"><span>Per Kg</span>  {{ number_format($item->price)  }} </p>
                       
                        </a>
                       
                    </div>
                </div>
                @endforeach
               
            </div>
        </div>
        {{-- pagination --}}
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
                       
                        <li class="{{ $products->hasMorePages() ? '' : 'disabled' }}"><a href="{{ $products->nextPageUrl() }}">Next</a></li>
                    </ul>
                </div>
            </div>
        </div>

        @endif

    </div>
 </div>

 
<div>
 @include('clients.layouts.partials.cartBanner')
</div>
 

@endsection

@section('component')
<div class="component mt-150">
   
    @include('clients.layouts.partials.testimonail')
    
    @include('clients.layouts.partials.advertisement')
    @include('clients.layouts.partials.shopbanner')
    @include('clients.layouts.partials.news')
        
    
 </div>
@endsection


