@extends('admin.layouts.master')
@section('content')

@if (session('error'))
<div class="alert alert-warning">
    {{ session('error') }}
</div>

@endif

@if (session('error_active'))
<div class="alert alert-danger">
    {{ session('error_active') }}
</div>

@endif

@if (session('status'))
<div class="alert alert-success">
    {{ session('status') }}
</div>

@endif

<div class="content-wrapper">
    <div class="content">

      
      <a href="{{ route('user.create') }}"><button type="button" class="mb-1 btn btn-outline-primary btn-pill">Add new </button></a>
        <table class="table table-bordered">
            <thead>
              <tr>
                <th scope="col">STT</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Type</th>
                <th scope="col">Active</th>
                <th class="text-center">Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($users as $item)
                  
            
              <tr>
                <td scope="row">{{ $item->id }}</td>
                <td>{{ $item->name }}</td>
                <td>{{ $item->email }}</td>
                <td>
                  
                  {{ $item->type }}
                
                </td>
                <td> 
                  @if ($item->active == 1)
                      <div style="color: green">Active</div>
                  @else
                  <div style="color: red">No Active</div>
                  @endif
                  
            
                
                </td>
                
                <th class="text-center">
                  <a href="{{ route('user.edit',$item->id) }}">
                    <i class="mdi mdi-open-in-new"></i>
                  </a>
                  <form action="{{ route('user.delete', $item->id) }}" method="post">

                    @csrf
                    @method('DELETE')
                    <button onclick="return confirm('Có chắc xóa tài khoản  này không')" type="submit"><i class="mdi mdi-close text-danger"></i></button>
                  </form>
                </th>
              </tr>
              @endforeach
             
            </tbody>
          </table>
    </div>
</div>


    
@endsection