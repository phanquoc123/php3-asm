@extends('admin.layouts.master')
@section('content')

    <div class="content-wrapper">
        <div class="content">

            <form action="{{ route('user.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="exampleFormControlInput1">Name </label>
                    <input type="text" name="name" class="form-control" id="exampleFormControlInput1"
                       >
                    <label for="exampleFormControlInput1">Email </label>
                    <input type="email" name="email" class="form-control" id="exampleFormControlInput1"
                        >
                    <label for="exampleFormControlInput1">Pass </label>
                    <input type="password" name="password" class="form-control" id="exampleFormControlInput1"
                        >
                        <div class="form-group">
                            <label for="exampleFormControlSelect13">Role</label>
                            <select name="type" class="form-control rounded-pill" id="exampleFormControlSelect13"> 
                              <option value="member">Member</option>
                             
                                  
                            <option value="admin">Admin</option>
                            
                            </select>
                          </div>
                          <div class="form-group">
                            <label for="exampleFormControlSelect13">Active</label>
                            <select name="active" class="form-control rounded-pill" id="exampleFormControlSelect13"> 
                              <option value="1">Active</option>
                             
                                  
                            <option value="0">No Active</option>
                            
                            </select>
                          </div>
           

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
