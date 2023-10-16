@extends('templates.app-template')

@section('styles')
    <style>
        .shared-item+.shared-item {
            border-top: solid 1px lightgray;
        }
    </style>
@endsection

@section('content')
    @include('components.navbar')

    <div class="d-flex justify-content-center">
        <div class="col-11 col-md-10 pt-4">
            <div class="my-4">
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
            <div class="d-flex align-items-center">
                <h3>Usuários</h3>
            </div>
            <div class="table-wrapper table-responsive">

                <table class="table">
                    <thead>
                        <th>Nome</th>
                        <th>Email</th>
                        <th>Liberado</th>
                        <th>Admin</th>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $user['name'] }}</td>
                                <td>{{ $user['email'] }}</td>
                                <td>
                                    @if($user['approved'])
                                        <div class="d-flex align-items-center">
                                            <div>
                                                Sim
                                            </div>
                                            @if($user['id'] !== Auth::user()['id'])
                                                <form action="{{ route('user.block', ['id' => $user['id']]) }}" method="POST" class="ms-2 d-inline-block">
                                                    @csrf
                                                    <button class="btn btn-danger">Bloquear</button>
                                                </form>
                                            @endif
                                        </div>
                                    @else
                                        <div class="d-flex align-items-center">
                                            <div>
                                                Não
                                            </div>
                                            @if($user['id'] !== Auth::user()['id'])
                                                <form action="{{ route('user.release', ['id' => $user['id']]) }}" method="POST" class="ms-2 d-inline-block">
                                                    @csrf
                                                    <button class="btn btn-primary">Liberar</button>
                                                </form>
                                            @endif
                                        </div>

                                    @endif
                                </td>
                                <td>{{ $user['admin'] ? 'Sim' : 'Não' }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
