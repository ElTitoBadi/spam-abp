@extends('privada.templates.master')

@section('name')
    Donacions
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('css/table.css') }}">
    <script src="{{ asset('js/eventsIndexPrivat.js') }}"></script>
    <script src="{{ asset('js/eventsDonacion.js') }}"></script>
@endsection

@section('body')

<script>
    $(document).ready(function(){
        $('.buttons-copy').attr('title',"{{ __('master.copy_crud') }}");
        $('.buttons-excel').attr('title',"{{ __('master.xls_crud') }}");
        $('.buttons-pdf').attr('title',"{{ __('master.pdf_crud') }}");
        $('.buttons-print').attr('title',"{{ __('master.print_crud') }}");
    });
</script>
<div class="p-5">

    <h1>Donacions</h1>

    <div class="toolbar mt-3">
        <a href="{{ action('DonativoController@create') }}" title="@lang('master.add_crud')" class="btn btn-secondary buttons-html5">
            <img height="0px" src="{{ asset('media/img/add.png') }}" alt="">
        </a>
        <button onclick="editDonacion()" title="@lang('master.edit_crud')" class="btn btn-secondary buttons-html5">
            <img height="0px" src="{{ asset('media/img/edit.png') }}" alt="">
            <form id="form_edit" action="" method="get">
                @csrf
            </form>
        </button>
        <button title="@lang('master.delete_crud')" class="btn btn-secondary buttons-html5" onclick="deleteDonacion()">
            <img height="0px" src="{{ asset('media/img/delete.png') }}" alt="">
        </button>
        <button title="@lang('master.filter_crud')" class="btn btn-secondary buttons-html5" data-toggle="modal" data-target="#filter-modal">
            <img height="0px" src="{{ asset('media/img/filter.png') }}" alt="">
        </button>
        <button title="@lang('master.tipus_crud')" class="btn btn-secondary buttons-html5">
            <img height="0px" src="{{ asset('media/img/tipus.png') }}" alt="">
        </button>
        <a href='{{url('/subtipos')}}' title="@lang('master.subtipus_crud')" class="btn btn-secondary buttons-html5">
            <img height="0px" src="{{ asset('media/img/subtipus.png') }}" alt="">
        </a>

    </div>

    <div class="modal" tabindex="-1" role="dialog" id="filter-modal">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <form class="container pt-2" method="POST">
                        @csrf
                        <div class="form-group row">
                            <div class="col-6">
                                <label for="tipos" class="col-form-label">Tipo</label>
                                <div class="">
                                    <select name="tipos" id="tipos" class="form-control">
                                        <option value=""></option>
                                        @foreach ($tipos as $tipo)
                                            <option value="{{ $tipo->id }}">{{ $tipo->nombre }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <label for="subtipos" class="col-form-label">Subtipo</label>
                                <div class="">
                                    <select name="subtipos" id="subtipos" class="form-control">
                                        <option value=""></option>
                                        @foreach ($subtipos as $subtipo)
                                            <option value="{{ $subtipo->id }}">{{ $subtipo->nombre }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <label for="dni" class="col-form-label">DNI/CIF del donante</label>
                                <div class="">
                                    <input type="text" name="dni" id="dni" class="form-control" placeholder="DNI/CIF">
                                </div>
                            </div>
                            <div class="col-6">
                                <label for="centrosReceptores" class="col-form-label">Centro receptor</label>
                                <div class="">
                                    <select name="centrosReceptores" id="centrosReceptores" class="form-control">
                                        <option value=""></option>
                                        @foreach ($centros as $centro)
                                            <option value="{{ $centro->id }}">{{ $centro->nombre }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <label for="centrosDestino" class="col-form-label">Centro destino</label>
                                <div class="">
                                    <select name="centrosDestino" id="centrosDestino" class="form-control">
                                        <option value=""></option>
                                        @foreach ($centros as $centro)
                                            <option value="{{ $centro->id }}">{{ $centro->nombre }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <label for="fechaInicio" class="col-form-label">Fecha inicio</label>
                                <div class="">
                                    <input type="date" name="fechaInicio" id="fechaInicio" class="form-control" placeholder="Fecha inicio">
                                </div>
                            </div>
                            <div class="col-6">
                                <label for="fechaFinal" class="col-form-label">Fecha final</label>
                                <div class="">
                                    <input type="date" name="fechaFinal" id="fechaFinal" class="form-control" placeholder="Fecha final">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary" onclick="filtrar()" data-dismiss="modal">Filtrar</button>
                </div>
            </div>
        </div>
    </div>

    <div class="toolbar-append">

    </div>

    <table id="table" class="table table-hover table-striped display responsive nowrap" style="width:100%">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>IdTipo</th>
                    <th>Tipo</th>
                    <th>IdSubtipo</th>
                    <th>Subtipo</th>
                    <th>IdCentro1</th>
                    <th>Centro Receptor</th>
                    <th>IdCentro2</th>
                    <th>Centro Destino</th>
                    <th>Donante</th>
                    <th>Coste</th>
                    <th>Fecha</th>
                </tr>
            </thead>
            <tbody>

            </tbody>
        </table>
    </div>
@endsection
