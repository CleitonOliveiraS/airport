@extends('panel.layouts.template')
@section('content')
    <div class="bred">
        <a href="{{ route('panel') }}" class="bred">Home ></a>
        <a href="{{ route('brands.index') }}" class="bred">Marcas ></a>
        <a href="{{ route('brands.create') }}" class="bred">Cadastrar</a>
    </div>
    <div class="title-pg">
        <h1 class="title-pg">Cadastro de Aviões</h1>
    </div>

    <div class="content-din">
        @if (isset($errors) && $errors->any())
            <div class="alert alert-warning">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if (isset($brand))
            {{ Form::model($brand, ['router' => ['brands.update', $brand->id]'class' => 'form form-search form-ds', 'method' => 'PUT']) }}
            {{ method_field('PUT') }}
        @else
            {{ Form::open(['router' => 'brands.store', 'class' => 'form form-search form-ds']) }}
        @endif
        <div class="form-group">
            {{Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Nome'])}}
        </div>

        <div class="form-group">
            <button class="btn btn-search">Cadastrar</button>
        </div>
        {{Form:close()}}
    </div>
    <!--Content Dinâmico-->
@endsection
