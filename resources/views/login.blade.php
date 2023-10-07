@extends('templates.app-template')

@section('styles')
    <style>
        html {
            min-height: 100%;
            min-width: 100%;
        }

        body {
            width: 100%;
            min-height: 95vh;
            position: relative;
            background: rgb(243, 243, 243);
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }
    </style>
@endsection

@section('content')
    <div class="mb-2">
        @if (Session::has('message'))
            <div class="alert alert-success">
                {{ Session::get('message') }}
            </div>
        @endif
        @if ($errors->has('message'))
            <div class="alert alert-danger">
                {{ $errors->first('message') }}
            </div>
        @endif
    </div>
    <form action="{{ route('authenticate') }}" method="POST" class="form card col-11 col-md-4 mt-4 p-4">
        @csrf
        <h1 class="text-center mb-4">
            Login
        </h1>
        <div class="row">
            <div class="col-12">
                <div class="form-group">
                    <label for="">Email: </label>
                    <input name="email" type="text"
                        class="form-control @if ($errors->has('email')) is-invalid @endif">
                    @if ($errors->has('email'))
                        <div class="invalid-feedback">
                            {{ $errors->first('email') }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-12">
                <div class="form-group">
                    <label for="">Senha: </label>
                    <input name="password" type="password"
                        class="form-control @if ($errors->has('password')) is-invalid @endif">
                    @if ($errors->has('password'))
                        <div class="invalid-feedback">
                            {{ $errors->first('password') }}
                        </div>
                    @endif
                </div>
            </div>
        </div>

        @if ($errors->has('error'))
            <div class="text-danger mt-2">{{ $errors->first('error') }}</div>
        @endif

        <a class="my-2" href="{{ route('register-form') }}">Ainda não possui uma conta?</a>
        <div class="d-flex justify-content-center">
            <button class="btn btn-primary px-5 mt-2">Login</button>
        </div>
    </form>
@endsection
