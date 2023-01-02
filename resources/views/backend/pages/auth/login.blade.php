@extends('admin.layouts.app')
@section('title', 'Login')
@section('custom-css')
@endsection
@section('content')
    <form action="{{ route('login') }}" method="post">
        {{ csrf_field() }}
        <div class="form-group mb-3">
        <input type="email" class="form-control rounded-pill border-0 shadow-lg px-4" placeholder="Email" name="email" value="{{ old('email') }}" required>
            @if ($errors->has('email'))
            <span class="help-block">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
        @endif
        </div>
        <div class="form-group mb-3">
            <input type="password" class="form-control rounded-pill border-0 shadow-lg px-4 text-primary" placeholder="Password" name="password" required>
            @if ($errors->has('password'))
            <span class="help-block">
                <strong>{{ $errors->first('password') }}</strong>
            </span>
            @endif
        </div>
        <div class="custom-control custom-checkbox mb-3">
            <input id="customCheck1" type="checkbox" name="remember" checked class="custom-control-input">
            <label for="customCheck1" class="custom-control-label">Remember password</label>
        </div>
        <button type="submit" class="btn btn-primary btn-block text-uppercase mb-2 rounded-pill shadow-sm">Sign in</button>
    </form>
@endsection
