@extends('panel.layouts.template')
@section('content')
<div class="bred">
    <a href="{{ route('panel') }}" class="bred">Home ></a>
    <a href="" class="bred">Estados</a>
</div>
<div class="title-pg">
<h1 class="title-pg">Estados</h1>
</div>
<div class="content-din bg-white">

    <div class="form-search">
        {{Form::open(['route' => 'states.search', 'class' => 'form form-inline'])}}
            {{Form::text('key_search', null, ['class' => 'form-control', 'placeholder' => 'O que deseja encontrar?'])}}
            <button class="btn btn-search">Pesquisar</button>
        {{Form::close()}}
    </div>

    <div class="messages">
       @include('panel.includes.alerts')
    </div>

    <table class="table table-striped">
        <tr>
            <th>Nome</th>
            <th>Sigla</th>
            <th width="200">Ações</th>
        </tr>

        @forelse ($states as $state)
            <tr>
            <td>{{$state->name}}</td>
            <td>{{$state->initials}}</td>
            <td>
                #Ações
            </td>
            </tr>
            @empty
                <tr>
                    <td colspan="200">Nenhum item cadastrado!</td>
                </tr>
        @endforelse
    </table>

</div>
<!--Content Dinâmico-->

@endsection
