<div class="form-group">
    <div class="form-group">
        <label for="city_id">Cidades</label>
        {{Form::select('city_id', $cities, Request::segment('3'), ['class' => 'form-control'])}}
    </div>
    @if(isset($airports))
        <div class="form-group">
            <label for="name">Nome</label>
            {{Form::text('name', $airports, null, ['class' => 'form-control', 'placeholder' => 'Nome'])}}
        </div>
        <div class="form-group">
            <label for="latitude">Latitude</label>
            {{Form::text('latitude', $airports, null, ['class' => 'form-control', 'placeholder' => 'Latitude'])}}
        </div>
    @else
        <div class="form-group">
            <label for="name">Nome</label>
            {{Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Nome'])}}
        </div>
        <div class="form-group">
            <label for="latitude">Latitude</label>
            {{Form::text('latitude', null, ['class' => 'form-control', 'placeholder' => 'Latitude'])}}
        </div>
    @endif
    <div class="form-group">
        <label for="longitude">Longitude</label>
        {{Form::text('longitude', null, ['class' => 'form-control', 'placeholder' => 'Longitude'])}}
    </div>
    <div class="form-group">
        <label for="adress">Endereço</label>
        {{Form::text('adress', null, ['class' => 'form-control', 'placeholder' => 'Endereço'])}}
    </div>
    <div class="form-group">
        <label for="number">Número</label>
        {{Form::text('number', null, ['class' => 'form-control', 'placeholder' => 'Número'])}}
    </div>
    <div class="form-group">
        <label for="zip_code">CEP</label>
        {{Form::number('zip_code', null, ['class' => 'form-control', 'placeholder' => 'CEP'])}}
    </div>
    <div class="form-group">
        <label for="complement">Complemento</label>
        {{Form::text('complement', null, ['class' => 'form-control', 'placeholder' => 'Complemento'])}}
    </div>
    <div class="form-group">
        <button class="btn btn-search">Enviar</button>
    </div>