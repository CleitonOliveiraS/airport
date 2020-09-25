<div class="form-group">
<div class="form-group">
    <label for="plane_id">Escolha o Avião</label>
    {{Form::select('plane_id', $planes, null, ['class' => 'form-control'])}}
</div>
    <label for="origin">Aeroporto Origem</label>
    {{Form::select('airport_origin_id', $airports, null, ['class' => 'form-control', 'placeholder' => 'Escolha o Aeroporto de Origem'])}}
</div>
<div class="form-group">
    <label for="destination">Aeroporto Destino</label>
    {{Form::select('airport_destination_id', $airports, null, ['class' => 'form-control', 'placeholder' => 'Escolha o Aeroporto de Destino'])}}
</div>
<div class="form-group">
    <label for="date">Data</label>
    {{Form::date('date', null, ['class' => 'form-control'])}}
</div>
<div class="form-group">
    <label for="time_duration">Duração</label>
    {{Form::time('time_duration', null, ['class' => 'form-control', 'placeholder' => 'Duração'])}}
</div>
<div class="form-group">
    <label for="hour_output">Hora Saída</label>
    {{Form::time('hour_output', null, ['class' => 'form-control', 'placeholder' => 'Horas Saída'])}}
</div>
<div class="form-group">
    <label for="arrival_time">Hora Chegada</label>
    {{Form::time('arrival_time', null, ['class' => 'form-control', 'placeholder' => 'Horas Chegada'])}}
</div>
<div class="form-group">
    <label for="old_price">Preço Anterior</label>
    {{Form::text('old_price', null, ['class' => 'form-control'])}}
</div>
<div class="form-group">
    <label for="price">Preço</label>
    {{Form::text('price', null, ['class' => 'form-control'])}}
</div>
<div class="form-group">
    <label for="total_plots">Total Parcelas</label>
    {{Form::number('total_plots', null, ['class' => 'form-control'])}}
</div>
<div class="form-group">
    {{Form::checkbox('is_promotion', null, null, ['id' => 'is_promotion'])}}
    <label for="is_promotion">É Promoção?</label>
</div>
<div class="form-group">
    <label for="image">Foto</label>
    {{Form::file('image', ['class' => 'form-control'])}}
</div>
<div class="form-group">
    <label for="qty_stops">Quantidade Paradas</label>
    {{Form::number('qty_stops', null, ['class' => 'form-control', 'placeholder' => 'Quantidade de Paradas'])}}
</div>
<div class="form-group">
    <label for="description">Descrição</label>
    {{Form::textarea('description', null, ['class' => 'form-control', 'placeholder' => 'Descrição'])}}
</div>
<div class="form-group">
    <button class="btn btn-search">Enviar</button>
</div>