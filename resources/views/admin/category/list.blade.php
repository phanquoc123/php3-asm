@extends('admin.layouts.master')
@section('content')

<div class="content-wrapper">
    <div class="content">
      <a href="{{ route('category.create') }}"><button type="button" class="mb-1 btn btn-outline-primary btn-pill">Add new </button></a>
        <table class="table table-bordered">
            <thead>
              <tr>
                <th scope="col">STT</th>
                <th scope="col">Name</th>
                <th class="text-center">Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($categories as $cate)
                  
            
              <tr>
                <td scope="row">{{ $cate->id }}</td>
                <td>{{ $cate->name }}</td>
                
                <th class="text-center">
                  <a href="{{ route('category.edit',$cate->id) }}">
                    <i class="mdi mdi-open-in-new"></i>
                  </a>
                  <a href="#">
                    <i class="mdi mdi-close text-danger"></i>
                  </a>
          
                </th>
              </tr>
              @endforeach
             
            </tbody>
          </table>
    </div>
</div>


    
@endsection