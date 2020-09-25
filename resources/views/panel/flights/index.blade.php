@extends('panel.layouts.template')
@section('content')
    <div class="bred">
        <a href="{{ route('panel') }}" class="bred">Home ></a>
        <a href="" class="bred">Voos</a>
    </div>
    <div class="title-pg">
        <h1 class="title-pg">Voos</h1>
    </div>
    <div class="content-din bg-white">

        <div class="form-search">
            {{Form::open(['route' => 'flights.search', 'class' => 'form form-inline'])}}
            {{Form::number('code', null, ['class' => 'form-control', 'placeholder' => 'Código'])}}
            {{Form::date('date', null, ['class' => 'form-control'])}}
            {{Form::time('hour_output', null, ['class' => 'form-control'])}}
            {{Form::number('qty_stops', null, ['class' => 'form-control', 'placeholder' => 'Total de Paradas'])}}
            <button class="btn btn-search">Pesquisar</button>
            {{Form::close()}}
        </div>

        <div class="messages">
            @include('panel.includes.alerts')
        </div>


        <p>
            @if (isset($dataForm['code']))
                <p>Código: <strong>{{$dataForm['code']}}</strong>
            @endif
            @if (isset($dataForm['date']))
                <p>Data: <strong>{{formatDateAndTime($dataForm['date'])}}</strong>
            @endif
            @if (isset($dataForm['hour_output']))
                <p>Hora de Saída: <strong>{{$dataForm['hour_output']}}</strong>
            @endif
            @if (isset($dataForm['qty_stops']))
                <p>Quantidade de Paradas: <strong>{{$dataForm['qty_stops']}}</strong>
            @endif
        </p>


            <div class="class-btn-insert">
                <a href="{{ route('flights.create') }}" class="btn-insert">
                    <span class="glyphicon glyphicon-plus"></span>
                    Cadastrar
                </a>
            </div>


            <table class="table table-striped">
                <tr>
                    <th>#</th>
                    <th>Imagem</th>
                    <th>Origem</th>
                    <th>Destino</th>
                    <th>Paradas</th>
                    <th>Data</th>
                    <th>Saída</th>
                    <th width="200">Ações</th>
                </tr>

                @forelse ($flights as $flight)
                    <tr>
                        <td>{{$flight->id}}</td>
                        <td>
                            @if($flight->image)
                                <img src="{{url("storage/flights/{$flight->image}")}}" alt="{{$flight->id}}"
                                     style="max-width: 50px;">
                            @else
                                <img src="{{url("assets/panel/imgs/default.jpg")}}" alt="{{$flight->id}}"
                                     style="max-width: 50px;">
                            @endif
                        </td>
                        <td>
                            <a href="">{{$flight->origin->name}}</a>
                        </td>
                        <td>
                            <a href="">{{$flight->destination->name}}</a>
                        </td>
                        <td>{{$flight->qty_stops}}</td>
                        <td>{{formatDateAndTime($flight->date)}}</td>
                        <td>{{formatDateAndTime($flight->hour_output, 'H:i')}}</td>
                        <td>
                            <a href="{{route('flights.edit', $flight)}}" class="edit btn">Editar</a>
                            <a href="{{route('flights.show', $flight->id)}}" class="delete btn">Visualizar</a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="200">Nenhum item cadastrado!</td>
                    </tr>
                @endforelse
            </table>
            @if (isset($dataForm))
                {{ $flights->appends($dataForm)->links() }}
            @else
                {{ $flights->links() }}
            @endif

    </div>
    <!--Content Dinâmico-->

@endsection
