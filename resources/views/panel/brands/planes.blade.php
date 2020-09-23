@extends('panel.layouts.template')
@section('content')
    <div class="bred">
        <a href="{{ route('panel') }}" class="bred">Home ></a>
        <a href="{{ route('brands.index') }}" class="bred">Marcas  ></a>
        <a href="{{ route('brands.planes', $brand) }}" class="bred">Aviões</a>
    </div>
    <div class="title-pg">
        <h1 class="title-pg">Listagem dos Aviões: <strong>{{$brand->name}}</strong></h1>
    </div>
    <div class="content-din bg-white">

        <table class="table table-striped">
            <tr>
                <th>#id</th>
                <th>Classe</th>
                <th>Total de Passageiros</th>
                <th width="200">Ações</th>
            </tr>

            @forelse ($planes as $plane)
                <tr>
                    <td>{{ $plane->id }}</td>
                    <td>{{ $plane->classes($plane->class) }}</td>
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

    </div>
    <!--Content Dinâmico-->

@endsection
