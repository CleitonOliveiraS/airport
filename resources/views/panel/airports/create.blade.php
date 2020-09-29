@extends('panel.layouts.template')
@section('content')
    <div class="bred">
        <a href="{{ route('panel') }}" class="bred">Home ></a>
        <a href="{{ route('airports.index', $city) }}" class="bred">Cidade {{$city->name}}   ></a>
        <a href="" class="bred">Cadastrar</a>
    </div>
    <div class="title-pg">
        <h1 class="title-pg">Cadastro de Aeroporto</h1>
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

        {{ Form::open(['route' => ['airports.store', $city], 'class' => 'form form-search form-ds', 'files' => true]) }}
        @include('panel.airports.form')
        {{ Form::close() }}
    </div>
    <!--Content Dinâmico-->
@endsection
