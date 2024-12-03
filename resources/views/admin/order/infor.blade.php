@extends('admin.layouts.master')
@section('content')

    <div class="content-wrapper">
        <div class="content">

            <table class="table table-bordered">
                <thead>
                  <tr>
                   
                    <th scope="col">Order Id</th>
                    <th scope="col">Product</th>
                    <th scope="col">Product Image</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Price</th>
                    
                  </tr>
                </thead>
                <tbody>
                  @foreach ($productsInOrder as $item)
                      
                
                  <tr>
                    <td scope="row">{{ $orderDetail->id }}</td>
                    <td>{{ $item->name }}</td>
                    <td> <img src="{{ Storage::url($item->image) }}" alt="" width="70px"> </td>
                    <td>{{ $quantityOfProductInOrder}}</td>
                    <td>{{ number_format($item->price) }}</td>
                   
                  </tr>
                  @endforeach
                 
                </tbody>
              </table>
        </div>



    </div>



@endsection
