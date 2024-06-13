@extends('layout.app')
@push('css')
@endpush

@section('content')
    <div class="container">
        <div class="card-header">
            <h4>Login</h4>
        </div>
        @if (Session::has('error'))
            <div class="alert alert-danger">
                {{ Session::get('error') }}
            </div>
        @endif
        <div class="card-body">
            <form action="{{ route('user.login.submit') }}" method="post">
                @csrf
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="name">Email</label>
                    </div>
                    <div class="form-group col-md-4">
                        <input type="text" class="form-control" name="email" placeholder="Enter your email">
                    </div>
                    @error('email')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="password">Password</label>
                    </div>
                    <div class="form-group col-md-4">
                        <input type="password" class="form-control" name="password" id="">
                    </div>
                    @error('password')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <button type="submit" class="btn btn-primary">Login</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
