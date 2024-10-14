@extends('authentication.layouts.master')
@section('content')
    <h4 class="text-dark text-center mb-5">Sign Up</h4>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('register') }}" method="POST">
        @csrf
        <div class="row">
            <div class="form-group col-md-12 mb-4">
                <input name="name" type="text" class="form-control input-lg" id="name" aria-describedby="nameHelp"
                    placeholder="Name">
            </div>
            <div class="form-group col-md-12 mb-4">
                <input name="email" type="email" class="form-control input-lg" id="email"
                    aria-describedby="emailHelp" placeholder="Email">
            </div>
            <div class="form-group col-md-12 ">
                <input name="password" type="password" class="form-control input-lg" id="password" placeholder="Password">
            </div>
            <div class="form-group col-md-12 ">
                <input name="password_confirmation" type="password" class="form-control input-lg" id="cpassword"
                    placeholder="Confirm Password">
            </div>
            <div class="col-md-12">
                <div class="d-flex justify-content-between mb-3">



                </div>

                <button type="submit" class="btn btn-primary btn-pill mb-4">Sign Up</button>

                <p>Already have an account?
                    <a class="text-blue" href="sign-in.html">Sign in</a>
                </p>
            </div>
        </div>
    </form>

@endsection
