@extends('layout.app')
@push('css')
@endpush

@section('content')
    <div class="container">
        <div class="card-header">
            <h4>Register</h4>
        </div>
        @if (Session::has('success'))
            <div class="alert alert-success col-md-12">
                {{ Session::get('success') }}
            </div>
        @endif
        <div class="card-body">
            <form action="{{ route('user.register.submit') }}" method="POST">
                @csrf
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="name">Name</label>
                    </div>
                    <div class="form-group col-md-4">
                        <input type="text" class="form-control" name="name" placeholder="Enter your name">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="name">Email</label>
                    </div>
                    <div class="form-group col-md-4">
                        <input type="email" class="form-control" name="email" placeholder="Enter your email">
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
                        <button type="submit" class="btn btn-primary">Register</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
