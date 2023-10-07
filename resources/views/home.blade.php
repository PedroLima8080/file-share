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
        <div class="col-12 col-md-10 pt-4">
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
                <h3>Compartilhar</h3>
                <a href="{{ route('file.create') }}" class="btn btn-primary ms-3"><i class="fa-solid fa-plus"></i></a>
            </div>
            <div class="shared-items">
                @if (count($files) === 0)
                    <div class="my-4">
                        Nenhum arquivo compartilhado...
                    </div>
                @endif

                @foreach ($files as $file)
                    <div class="shared-item py-2 d-flex align-items-center justify-content-between">
                        <div>
                            <h5>{{ $file['title'] }}</h5>
                            <div>{{ $file['description'] }}</div>
                            @if ($file['user_id'] !== Auth::user()['id'])
                                {{ $file['user']['name'] }}
                            @else
                                Você
                            @endif
                            compartilhou <a href="{{ route('file.download', ['id' => $file['id']]) }}">{{ $file['original_name'] }}</a> em
                            {{ date('d/m/Y h:i:s', strtotime($file['created_at'])) }}
                        </div>
                        <div>
                            @if ($file['user_id'] === Auth::user()['id'])
                                <a href="{{ route('file.edit', ['id' => $file['id']]) }}" class="btn btn-warning text-light"><i class="fa-solid fa-pencil"></i></a>
                                <form class="d-inline-block" action="{{ route('file.destroy', ['id' => $file['id']]) }}"
                                    method="POST">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger text-light"><i
                                            class="fa-solid fa-trash"></i></button>
                                </form>
                            @endif
                        </div>
                    </div>
                @endforeach
                {{-- <div class="shared-item py-2 d-flex align-items-center justify-content-between">
                    <div>
                        Pedro compartilhou <a href="">teste.pdf</a> em 12/05/2023 12:30
                    </div>
                </div>
                <div class="shared-item py-2 d-flex align-items-center justify-content-between">
                    <div>
                        Você compartilhou <a href="">teste.pdf</a> em 12/05/2023 12:30
                    </div>
                    <div>
                        <button class="btn btn-warning text-light"><i class="fa-solid fa-pencil"></i></button>
                        <button class="btn btn-danger text-light"><i class="fa-solid fa-trash"></i></button>
                    </div>
                </div>
                <div class="shared-item py-2 d-flex align-items-center justify-content-between">
                    <div>
                        Pedro compartilhou <a href="">teste.pdf</a> em 12/05/2023 12:30
                    </div>
                </div>
                <div class="shared-item py-2 d-flex align-items-center justify-content-between">
                    <div>
                        Pedro compartilhou <a href="">teste.pdf</a> em 12/05/2023 12:30
                    </div>
                </div> --}}
            </div>
        </div>
    </div>
@endsection
