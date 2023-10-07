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
            align-items: center;
            justify-content: center;
        }

        form {
            /* position: absolute !important;
                    top: 50%;
                    left: 50%;
                    transform: translate(-50%, -50%); */
        }
    </style>
@endsection

@section('content')
    <form action="{{ route('register') }}" method="POST" class="form card col-11 col-md-4 mt-4 p-4">
        @csrf
        <h1 class="text-center mb-4">
            Registre-se
        </h1>
        <div class="row">
            <div class="col-12">
                <div class="form-group">
                    <label for="">Nome: </label>
                    <input name="name" type="text" class="form-control @if ($errors->has('name')) is-invalid @endif">
                    @if ($errors->has('name'))
                        <div class="invalid-feedback">
                            {{ $errors->first('name') }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-12">
                <div class="form-group">
                    <label for="">Email: </label>
                    <input name="email" type="text" class="form-control @if ($errors->has('email')) is-invalid @endif">
                    @if ($errors->has('email'))
                        <div class="invalid-feedback">
                            {{ $errors->first('email') }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-12 col-md-6">
                <div class="form-group">
                    <label for="">Senha: </label>
                    <input name="password" type="password" class="form-control @if ($errors->has('password')) is-invalid @endif">
                    @if ($errors->has('password'))
                        <div class="invalid-feedback">
                            {{ $errors->first('password') }}
                        </div>
                    @endif
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="form-group">
                    <label for="">Confirmar senha: </label>
                    <input name="password_confirmation" type="password" class="form-control @if ($errors->has('confirm-password')) is-invalid @endif">
                    @if ($errors->has('confirm-password'))
                        <div class="invalid-feedback">
                            {{ $errors->first('confirm-password') }}
                        </div>
                    @endif
                </div>
            </div>
        </div>

        @if ($errors->has('error'))
            <div class="text-danger my-t">{{ $errors->first('error') }}</div>
        @endif

        <a class="my-2" href="{{ route('login-form') }}">Já possui uma conta?</a>
        <div class="d-flex justify-content-center">
            <button class="btn btn-primary px-5 mt-2">Registrar</button>
        </div>
    </form>
@endsection
