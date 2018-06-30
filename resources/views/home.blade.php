@extends('layouts.layout')

@section('content')
<div class="row">
<div class="container">
        <div class="col-md-8 col-md-offset-2">
        <center><h1>Admin Action</h1></center>
        <form class="form-horizontal" role="form" method="POST" action="{{ url('/adminLogin') }}">
                        {{ csrf_field() }}
                        <div class="form-group">
                        @if ($message = Session::get('error'))
                        <div class="alert alert-danger">
                            <p><strong>Error!</strong> {{ $message }}</p>
                        </div>
                        @endif
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" > 
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password">
                                <input id="type" type="hidden" class="form-control" name="type" value="dashboad">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember"> Remember Me
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-sign-in"></i> Login
                                </button>

                                <a class="btn btn-link" href="{{ url('/password/reset') }}">Forgot Your Password?</a>
                            </div>
                        </div>
                    </form>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p><strong>Success!</strong> {{ $message }}</p>
                        </div>
                    @endif
        </div>
    </div>
</div>
@endsection





