@extends('panel.layouts.template')
@section('content')
    <div class="bred">
        <a href="{{ route('panel') }}" class="bred">Home ></a>
        <a href="{{ route('brands.index') }}" class="bred">Marcas  ></a>
        <a href="{{ route('brands.create') }}" class="bred">Editar</a>
    </div>

    <div class="title-pg">
        <h1 class="title-pg">Editar Marca: {{$brand->name}}</h1>
    </div>
    <div class="content-din">
        <div class="messages">
            @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
                {{-- <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalCenterTitle">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                ...
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary">Ok</button>
                            </div>
                        </div>
                    </div>
                </div> --}}
            @endif
        </div>
    </div>
    <div class="content-din">
        <form class="form form-search form-ds" action="{{ route('brands.update', $brand->id) }}" method="POST">
            {{ csrf_field() }}
            {{ method_field('PUT') }}
            <div class="form-group">
                <input type="text" name="name" value="{{$brand->name}}" placeholder="Nome" class="form-control">
            </div>
            <div class="form-group">
                <button class="btn btn-search">Editar</button>
            </div>
        </form>

    </div>
    <!--Content Dinâmico-->
@endsection
