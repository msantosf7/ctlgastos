@extends('adminlte::page')

@section('title', 'Depósito')

@section('content_header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h3 class="m-0">Depósito</h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/admin">Painel Principal</a></li>
                    <li class="breadcrumb-item"><a href="/admin/balance"></a>Movimentações</li>
                    <li class="breadcrumb-item active">Depósito</li>
                </ol>
            </div>
        </div>
    </div>
@stop

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-4">
            <div class="card card-success">
                <div class="card-header">
                    <div class="card-title">
                        <h7>Novo Depósito</h7>
                    </div>
                </div>
                <form method="POST" action="{{ route('deposit.store')}}">
                    <div class="card-body">
                        @include('admin.includes.alerts')
                        {!! csrf_field() !!}
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">R$</span>
                            </div>
                            <input type="text" name="valor" placeholder="Valor do depósito" class="form-control">
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-success float-right">
                        <i class="fa fa-save p-2"></i>Salvar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@stop
