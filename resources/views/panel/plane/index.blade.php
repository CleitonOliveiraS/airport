@extends('panel.layouts.template')
@section('content')
    <div class="bred">
        <a href="{{ route('panel') }}" class="bred">Home ></a>
        <a href="{{ route('planes.index') }}" class="bred">Aviões</a>
    </div>
    <div class="title-pg">
        <h1 class="title-pg">{{ $title or 'Listagem dos Aviões' }}</h1>
    </div>
    <div class="content-din bg-white">

        <div class="form-search">
            {{ Form::open(['route' => 'planes.search', 'class' => 'form form-inline']) }}
            {{ Form::text('key_search', null, ['class' => 'form-control', 'placeholder' => 'O que deseja encontrar?']) }}
            <button class="btn btn-search">Pesquisar</button>
            {{ Form::close() }}
        </div>

        <div class="messages">
            @include('panel.includes.alerts')
        </div>

        <div class="class-btn-insert">
            <a href="{{ route('planes.create') }}" class="btn-insert">
                <span class="glyphicon glyphicon-plus"></span>
                Cadastrar
            </a>
        </div>

        <table class="table table-striped">
            <tr>
                <th>#id</th>
                <th>Classes</th>
                <th>Marcas</th>
                <th>Total de Passageiros</th>
                <th width="200">Ações</th>
            </tr>

            @forelse ($planes as $plane)
                <tr>
                    <td>{{ $plane->id }}</td>
                    <td>{{ $plane->classes($plane->class) }}</td>
                    <td>{{ $plane->brand->name }}</td>
                    <td>{{ $plane->wty_passengers }}</td>
                    <td>
                        <a href="{{ route('planes.edit', $plane) }}" class="edit btn">Editar</a>
                        <a href="{{ route('planes.show', $plane) }}" class="delete btn">Visualizar</a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="200">Nenhum item cadastrado!</td>
                </tr>
            @endforelse
        </table>
        @if (isset($dataForm))
            {{ $planes->appends($dataForm)->links() }}
        @else
            {{ $planes->links() }}
        @endif

    </div>
    <!--Content Dinâmico-->

@endsection
