@extends('layouts.adminmaster')
@section('title', "Admin Login")
@section('content')

<div class="container">
    <div class="row justify-content-center" style="margin-top: 15%">
        <div class="col-md-6" style="color: white">


            <h2>Admin Change</h2>

            <form action="{{ route('adminpasswordchange') }}" role="form" method="POST">
                {{csrf_field()}}
                <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="text" class="form-control" name="username" id="exampleInputEmail1" aria-describedby="emailHelp">
                    <small id="emailHelp" class="form-text text-muted">Email address or username.</small>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" name="password" class="form-control" id="exampleInputPassword1">
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>


        </div>
    </div>
</div>

@endsection
