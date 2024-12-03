@extends('admin.layouts.master')
@section('content')

    <div class="content-wrapper">
        <div class="content">

            <form action="{{ route('user.update', $user->id) }}" method="POST">
                @csrf
                @method('PUT')
                <input type="hidden" value="{{ $user->id }}">
                <div class="form-group">
                    
                    <label for="exampleFormControlInput1">Name </label>
                    <input value="{{ $user->name  }}" type="text" name="name" class="form-control" id="exampleFormControlInput1"
                       >
                    <label for="exampleFormControlInput1">Email </label>
                    <input  value=" {{ $user->email  }}" type="email" name="email" class="form-control" id="exampleFormControlInput1"
                        >
                    <label for="exampleFormControlInput1">Pass </label>
                    <input value="{{ $user->password  }}" type="password" name="password" class="form-control" id="exampleFormControlInput1"
                        >
                        <div class="form-group">
                            <label for="exampleFormControlSelect13">Role</label>
                            <select name="type" class="form-control rounded-pill" id="exampleFormControlSelect13"> 
                              <option value="member" {{ $user->type == 'member' ? 'selected': '' }} >Member</option>
                              
                            <option value="admin" {{ $user->type == 'admin' ? 'selected': '' }}>Admin</option>
                            
                            </select>
                          </div>
                          <div class="form-group">
                            <label for="exampleFormControlSelect13">Active</label>
                            <select name="active" class="form-control rounded-pill" id="exampleFormControlSelect13"> 
                              <option value="1" {{ $user->type == 1 ? 'selected': '' }}>Active</option>
                             
                                  
                            <option value="0" {{ $user->type == 0 ? 'selected': '' }}>No Active</option>
                            
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
