@extends('templates.app-template')

@section('styles')
    <style>
    </style>
@endsection

@section('content')
    @include('components.navbar')
    <div class="d-flex justify-content-center">
        <div class="col-12 col-md-10 pt-4">
            <div class="d-flex align-items-center">
                <h3>Compartilhando arquivo</h3>
            </div>
            <form action="{{ route('file.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="">Titulo</label>
                            <input name="title" type="text" class="form-control @if ($errors->has('title')) is-invalid @endif">
                            @if ($errors->has('title'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('title') }}
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="row mt-3 mb-3">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="">Descrição</label>
                            <input name="description" type="text" class="form-control @if ($errors->has('description')) is-invalid @endif">
                            @if ($errors->has('description'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('description') }}
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="row mt-3 mb-3">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="">Arquivo</label>
                            <input name="file" type="file" class="form-control @if ($errors->has('file')) is-invalid @endif">
                            @if ($errors->has('file'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('file') }}
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
                <a href="{{ route('home') }}" class="btn btn-secondary">Cancelar</a>
                <button type="submit" class="btn btn-primary">Salvar</button>
            </form>
        </div>
    </div>
@endsection
