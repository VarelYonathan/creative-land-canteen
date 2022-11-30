@extends('layouts.main')

@section('container')
    <main class="form-signin">
        @if (session()->has('loginError'))
            <div class="alert-danger alert-dismissible fade show" role="alert">
                {{ session('loginError') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        @isset($url)
            <form action='{{ url("/Login/$url") }}' method="POST">
                <h1>{{ $url }}</h1>
            @else
                <form action="/" method="GET">
                @endisset
                @csrf
                <img class="mb-4" src="../assets/brand/bootstrap-logo.svg" alt="" width="72" height="57">
                <h1 class="h3 mb-3 fw-normal">Please sign in</h1>

                <div class="form-floating">
                    <input type="text" id="username" name="username" class="form-control" id="floatingInput"
                        @error('username') @enderror placeholder="Username" value={{ old('username') }}>
                    <label for="floatingInput">Username</label>
                    @error('username')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-floating">
                    <input type="password" id="password" name="password" class="form-control" id="floatingPassword"
                        placeholder="Password">
                    <label for="floatingPassword">Password</label>
                </div>

                <div class="checkbox mb-3">
                    <label>
                        <input type="checkbox" value="remember-me"> Remember me
                    </label>
                </div>
                <button class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>
            </form>
    </main>
@endsection
