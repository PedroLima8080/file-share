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
    <form action="" class="form card col-11 col-md-4 mt-4 p-4">
        <h1 class="text-center mb-4">
            Login
        </h1>
        <div class="row">
            <div class="col-12">
                <div class="form-group">
                    <label for="">Email: </label>
                    <input type="text" class="form-control">
                </div>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-12">
                <div class="form-group">
                    <label for="">Senha: </label>
                    <input type="password" class="form-control">
                </div>
            </div>
        </div>
        <a class="my-2" href="{{ route('register') }}">Ainda não possui uma conta?</a>
        <div class="d-flex justify-content-center">
            <button class="btn btn-primary px-5 mt-4">Login</button>
        </div>
    </form>
@endsection
