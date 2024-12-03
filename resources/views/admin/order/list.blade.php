@extends('admin.layouts.master')
@section('content')

{{-- @if (session('error'))
<div class="alert alert-warning">
    {{ session('error') }}
</div>

@endif

@if (session('error active'))
<div class="alert alert-danger">
    {{ session('error active') }}
</div>

@endif

@if (session('status'))
<div class="alert alert-success">
    {{ session('status') }}
</div>

@endif --}}

<div class="content-wrapper">
    <div class="content">

      
    
        <table class="table table-bordered">
            <thead>
              <tr>
                <th scope="col">Order Id</th>
               
                <th scope="col">User name</th>
                <th scope="col">User email</th>
                <th scope="col">User phone</th>
                <th scope="col">User adress</th>
                <th scope="col">Status delivery</th>
                <th scope="col">Satatus payment</th>
           
                <th class="text-center">Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($orders as $item)
                  
            
              <tr>
                <td scope="row">{{ $item->id }}</td>
                <td>{{ $item->user->name }}</td>
                <td>{{ $item->user_email }}</td>
                <td>{{ $item->user_phone }}</td>
                <td>{{ $item->user_adress }}</td>
                <td>
                  
                  @if ($item->status_delivery == 0)
                  Đang xử lý
              @elseif ($item->status_delivery == 1)
                  Đang chuẩn bị hàng
              @elseif ($item->status_delivery == 2)
                  Đã rời kho
              @elseif ($item->status_delivery == 3)
                  Đang giao hàng
              @elseif ($item->status_delivery == 4)
                  Đã thanh toán
              @elseif ($item->status_delivery == 5)
                  Đã hủy
              @endif
                </td>
                <td> 
                  @if ($item->status_payment == 1)
                  Thanh toán khi nhận hàng
                  @elseif ($item->status_payment == 0)
                  Thanh toán online
                  @endif
                </td>
                
                <th class="text-center">
                  <a href="{{ route('order.infor',$item->id) }}">
                    <i class="mdi mdi-information"></i>
                  </a>
                  <a href="{{ route('order.edit',$item->id) }}">
                    <i class="mdi mdi-open-in-new"></i>
                  </a>
                  <form action="{{ route('order.delete', $item->id) }}" method="post">

                    @csrf
                    @method('DELETE')
                    <button onclick="return confirm('Có chắc xóa đơn hàng này không')" type="submit"><i class="mdi mdi-close text-danger"></i></button>
                  </form>
                </th>
              </tr>
              @endforeach
             
            </tbody>
          </table>
    </div>
</div>


    
@endsection