@extends('panel.layouts.template')
@section('content')
    <div class="bred">
        <a href="{{ route('panel') }}" class="bred">Home ></a>
        <a href="{{route('states.index')}}" class="bred">Estados ></a>
        <a href="{{route('state.cities', $state->initials)}}" class="bred">{{$state->name}} ></a>
        <a href="" class="bred">Cidades</a>
    </div>
    <div class="title-pg">
        <h1 class="title-pg">Cidades do Estado ({{$cities->count()}} - {{$cities->total()}}):
            <strong>{{$state->name}}</strong></h1>
    </div>
    <div class="content-din bg-white">

        <div class="form-search">
            {{ Form::open(['route' => ['state.cities.search', $state->initials], 'class' => 'form form-inline']) }}
            {{ Form::text('key_search', null, ['class' => 'form-control', 'placeholder' => 'O que deseja encontrar?']) }}
            <button class="btn btn-search">Pesquisar</button>
            {{ Form::close() }}

        </div>

        <div class="messages">
            @include('panel.includes.alerts')
        </div>

        <table class="table table-striped">
            <tr>
                <th>Nome</th>
                <th width="200">Ações</th>
            </tr>

            @forelse ($cities as $city)
                <tr>
                    <td>{{ $city->name }}</td>
                    <td>
                        <a href="{{route('airports.index', $city)}}" class="edit btn">
                            <i class="fa fa-thumb-tack" aria-hidden="true">
                                Aeroportos
                            </i>
                        </a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="200">Nenhum item cadastrado!</td>
                </tr>
            @endforelse
        </table>
        @if (isset($dataForm))
            {{ $cities->appends($dataForm)->links() }}
        @else
            {{ $cities->links() }}
        @endif
    </div>
    <!--Content Dinâmico-->

@endsection
