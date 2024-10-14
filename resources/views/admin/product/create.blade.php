@extends('admin.layouts.master')
@section('content')

  <div class="content">
    <form  action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data" >
        @csrf
        @if ($errors->any())
        <div class="alert alert-danger mt-3">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif 
        <div class="form-group">
          <label for="exampleFormControlInput3">Name</label>
          <input name="name" type="text" class="form-control rounded-pill" id="exampleFormControlInput3" placeholder="Enter Name">
         
        </div>
        <div class="form-group">
          <label for="exampleFormControlPassword31">Image</label>
          <input name="image" type="file" class="form-control rounded-pill" id="exampleFormControlPassword31" >
        </div>
        <div class="form-group">
            <label for="exampleFormControlPassword31">Price</label>
            <input name="price"  type="number" class="form-control rounded-pill" id="exampleFormControlPassword31" >
          </div>
          <div class="form-group">
            <label for="exampleFormControlPassword31">Quantity_remaning</label>
            <input name="remaining_quantity"  type="number" class="form-control rounded-pill" id="exampleFormControlPassword31" >
          </div>
          <div class="form-group">
            <label for="exampleFormControlTextarea1">Description</label>
            <textarea name="description" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
          </div>
        <div class="form-group">
          <label for="exampleFormControlSelect13">Category</label>
          <select name="category_id" class="form-control rounded-pill" id="exampleFormControlSelect13"> 
            <option value="">All</option>
            @foreach ($categories as $cate)
                
           
            <option value="{{ $cate->id }}">{{ $cate->name }}</option>
            @endforeach
          </select>
        </div>
        <div class="form-footer mt-4">
          <button type="submit" class="btn btn-primary btn-pill">Submit</button>
          <button type="submit" class="btn btn-light btn-pill">Cancel</button>
        </div>
      </form>
  </div>



    
@endsection