@extends('panel.layouts.template')
@section('content')
<div class="bred">
    <a href="{{ route('panel') }}" class="bred">Home ></a>
    <a href="{{ route('flights.index') }}" class="bred">Voos ></a>
    <a href="" class="bred">{{$flight->id}}</a>
</div>
<div class="title-pg">
    <h1 class="title-pg">Detalhes do Voo: {{$flight->id}}</h1>
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
            Código: <strong>{{$flight->id}}</strong>
        </li>
        <li>
            Origem: <strong>{{$flight->origin->name}}</strong>
        </li>
        <li>
            Destino: <strong>{{$flight->destination->name}}</strong>
        </li>
        <li>
            Data: <strong>{{formatDateAndTime($flight->date)}}</strong>
        </li>
        <li>
            Duração: <strong>{{formatDateAndTime($flight->time_duration, 'H:i')}}</strong>
        </li>
        <li>
            Hora Saída: <strong>{{formatDateAndTime($flight->hour_output, 'H:i')}}</strong>
        </li>
        <li>
            Hora Chegada: <strong>{{formatDateAndTime($flight->arrival_time, 'H:i')}}</strong>
        </li>
        <li>
            Preço Anterior: <strong>{{number_format($flight->old_price, 2, ',', '.')}}</strong>
        </li>
        <li>
            Preço: <strong>{{number_format($flight->price, 2, ',', '.')}}</strong>
        </li>
        <li>
            Total Parcelas: <strong>{{$flight->total_plots}}</strong>
        </li>
        <li>
            É Promoção? <strong>{{$flight->is_promotion ? 'SIM' : 'NÃO'}}</strong>
        </li>
        <li>
            Foto: <strong>{{$flight->image}}</strong>
        </li><li>
            Quantidade Paradas: <strong>{{$flight->qty_stops}}</strong>
        </li><li>
            Descrição: <strong>{{$flight->description}}</strong>
        </li>
    </ul>

    {{ Form::open(['route' => ['flights.destroy', $flight], 'class' => 'form form-search form-ds', 'method' => 'DELETE']) }}
    <div class="form-group">
        <button class="btn btn-danger">Deletar</button>
    </div>
    {{ Form::close() }}
</div><!--Content Dinâmico-->
@endsection
