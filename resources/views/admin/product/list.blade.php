@extends('admin.layouts.master')
@section('content')

<div class="content-wrapper">
    <div class="content">                
  
          <!-- Table Product -->
          <div class="row">
            <div class="col-12">
              <div class="card card-default">
                <div class="card-header">
                  <h2>Fruits Inventory</h2>
                  <div class="dropdown">
                    <a  href="{{ route('product.create') }}" role="button" id="dropdownMenuLink"  aria-haspopup="true"
                      aria-expanded="false"> Add new
                    </a>

                    
                  </div>
                </div>
                <div class="card-body">
                  <table id="productsTable" class="table table-hover table-product" style="width:100%">
                    <thead>
                      <tr>
                        <th></th>
                        <th>Fruits Name</th>
                        <th>ID</th>
                        <th>Qty</th>
                        <th>Price</th>
                        <th>Desciption</th>
                        <th>Category</th>
                     
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>

                      @foreach ($products as $item)
                          
                    

                      <tr>
                        <td class="py-0">
                          <img src="{{ \Storage::url ($item->image)	 }}" alt="Product Image">
                        </td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->remaining_quantity }}</td>
                        <td>{{ $item->price }}</td>
                        <td>{{ $item->description }}</td>
                        <td>{{ $item->category->name }}</td>
                      
                        <th >
                          <a href="">
                            <i class="mdi mdi-information"></i>
                          </a>
                          <a href="{{ route('product.edit', $item->id) }}">
                            <i class="mdi mdi-open-in-new"></i>
                          </a>

                          <form action="{{ route('product.delete', $item->id) }}" method="post">

                            @csrf
                            @method('DELETE')
                            <button onclick="return confirm('Có muốn xóa sản phẩm này không')" type="submit"><i class="mdi mdi-close text-danger"></i></button>
                          </form>
                        
                  
                        </th>
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
    
@endsection