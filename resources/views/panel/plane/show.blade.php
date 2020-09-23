@extends('panel.layouts.template')
@section('content')
<div class="bred">
    <a href="{{ route('panel') }}" class="bred">Home ></a>
    <a href="{{ route('brands.index') }}" class="bred">Marcas ></a>
    <a href="" class="bred">Visualizar</a>
</div>
<div class="title-pg">
    <h1 class="title-pg">Visualizar Avião</h1>
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
            Id: <strong>{{$plane->id}}</strong>
        </li>
        <li>
            Classe: <strong>{{$plane->class}}</strong>
        </li>
        <li>
            Marca: <strong>{{$plane->brand->name}}</strong>
        </li>
        <li>
            Total de Passageiros: <strong>{{$plane->wty_passengers}}</strong>
        </li>
    </ul>

    {{ Form::open(['route' => ['planes.destroy', $plane], 'class' => 'form form-search form-ds', 'method' => 'DELETE']) }}
    <div class="form-group">
        <button class="btn btn-danger">Deletar</button>
    </div>
    {{ Form::close() }}
</div><!--Content Dinâmico-->
@endsection
