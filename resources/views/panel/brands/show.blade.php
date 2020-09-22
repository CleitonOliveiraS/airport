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
    <ul>
        <li>
            Nome: <strong>{{$brand->name}}</strong>
        </li>
    </ul>

    {{ Form::open(['route' => ['brands.destroy', $brand], 'class' => 'form form-search form-ds', 'method' => 'DELETE']) }}
    <div class="form-group">
        <button class="btn btn-danger">Deletar</button>
    </div>
    {{ Form::close() }}
</div><!--Content Dinâmico-->
@endsection
