@extends('admin.layouts.master')
@section('content')

<div class="content-wrapper">
    <div class="content">

        <form action="{{ route('category.update', $category->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="exampleFormControlInput1">Name Category</label>
                <input value="{{ $category->name  }}" type="text" name="name" class="form-control" id="exampleFormControlInput1" placeholder="Enter name category">
                
                @if ($errors->any())
    <div class="alert alert-danger mt-3">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif 
             
              </div>

              <button type="submit" class="btn btn-primary btn-pill">Submit</button>
        </form>
    </div>
   
     
   
</div>


    
@endsection