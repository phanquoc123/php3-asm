@extends('admin.layouts.master')
@section('content')

    <div class="content">
        <form action="{{ route('product.update', $product->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            @if ($errors->any())
                <div class="alert alert-danger mt-3">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <input type="hidden" value="{{ $product->id }}">
            <div class="form-group">
                <label for="exampleFormControlInput3">Name</label>
                <input value="{{ $product->name }}" name="name" type="text" class="form-control rounded-pill"
                    id="exampleFormControlInput3" placeholder="Enter Name">

            </div>
            <div class="form-group">
                <label for="exampleFormControlPassword31">Image</label>
                <input value="{{ $product->name }}" name="image" type="file" class="form-control rounded-pill"
                    id="exampleFormControlPassword31">
                <img src="{{ \Storage::url($product->image) }}" alt="" width="200px">
            </div>
            <div class="form-group">
                <label for="exampleFormControlPassword31">Price</label>
                <input value="{{ $product->price }}" name="price" type="number" class="form-control rounded-pill"
                    id="exampleFormControlPassword31">
            </div>
            <div class="form-group">
                <label for="exampleFormControlPassword31">Quantity_remaning</label>
                <input value="{{ $product->remaining_quantity }}" name="remaining_quantity" type="number"
                    class="form-control rounded-pill" id="exampleFormControlPassword31">
            </div>
            <div class="form-group">
                <label for="exampleFormControlTextarea1">Description</label>
                <textarea value="" name="description" class="form-control" id="exampleFormControlTextarea1"
                    rows="3">{{ $product->description }}</textarea>
            </div>
            <div class="form-group">
                <label for="exampleFormControlSelect13">Category</label>
                <select name="category_id" class="form-control rounded-pill" id="exampleFormControlSelect13">
                    <option value="">All</option>
                    @foreach ($category as $cate)
                        <option
                         @if ($product->id === $cate->id)
                             selected
                         @endif
                        value="{{ $cate->id }}">{{ $cate->name }}</option>
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
