@extends('authentication.layouts.master')
@section('content')
    <h4 class="text-dark mb-6 text-center">Sign in for free</h4>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('login') }}" method="POST">
        @csrf
        <div class="row">
            <div class="form-group col-md-12 mb-4">
                <input name="email" type="email" class="form-control input-lg" id="email" aria-describedby="emailHelp"
                    placeholder="email">
            </div>
            <div class="form-group col-md-12 ">
                <input name="password" type="password" class="form-control input-lg" id="password" placeholder="Password">
            </div>
            <div class="col-md-12">

                <div class="d-flex justify-content-between mb-3">



                    <a class="text-color" href="#"> Forgot password? </a>

                </div>

                <button type="submit" class="btn btn-primary btn-pill mb-4">Sign In</button>

                <p>Don't have an account yet ?
                    <a class="text-blue" href="{{ route('register') }}">Sign Up</a>
                </p>
            </div>
        </div>
    </form>
@endsection
