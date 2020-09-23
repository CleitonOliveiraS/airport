@extends('panel.layouts.template')
@section('content')
    <div class="bred">
        <a href="{{ route('panel') }}" class="bred">Home ></a>
        <a href="{{ route('brands.index') }}" class="bred">Aviões ></a>
        <a href="" class="bred">Editar</a>
    </div>
    <div class="title-pg">
        <h1 class="title-pg">Editar Avião: <strong>{{ $plane->name }}</strong></h1>
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

        {{ Form::model($plane, ['route' => ['planes.update', $plane->id], 'class' => 'form form-search form-ds', 'method' => 'PUT']) }}
        @include('panel.plane.form')
        {{ Form::close() }}
    </div>
    <!--Content Dinâmico-->
@endsection
