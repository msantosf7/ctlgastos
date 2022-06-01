@extends('adminlte::page')

@section('title', 'Movimentações')

@section('content_header')
<div class="row">
    <div class="col-sm-6">
        <h3 class="m-0">Movimentações</h3>
        </div>
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/admin">Painel Principal</a></li>
            <li class="breadcrumb-item active">Movimentações</li>
        </ol>
    </div>
</div>
<hr>
@stop

@section('content')
<div class="row">
    <div class="col-12 col-sm-6 col-md-2">
        <a href="{{ route('balance.deposit')}}" class="btn btn-app btn-block bg-success" style="margin: 0px;">
            <i class="fa fa-arrow-up"></i>Novo Depósito
        </a>
    </div>
    <div class="clearfix hidden-md-up"></div>
    @if ($carteira > 0)
    <div class="col-12 col-sm-6 col-md-2">
        <a href="{{ route('balance.saque') }}" class="btn btn-app btn-block bg-danger" style="margin: 0px;">
            <i class="fa fa-arrow-down"></i>Novo Saque
        </a>
    </div>
    @endif
</div>
<hr>

<div class="row">
    <div class="col-12 col-sm-12 col-md-12">
        @include('admin.includes.alerts')
    </div>    
    <div class="col-12 col-sm-12 col-md-4">
        <div class="info-box">
            <span class="info-box-icon bg-success elevation-1">
                <i class="fa fa-arrow-up"></i>
            </span>
            <div class="info-box-content text-right">
                <h5 class="info-box-number">R$ 00,00</h5>
                <small class="info-box-text">Total de Depósitos</small>
            </div>
        </div>
    </div>

    <div class="col-12 col-sm-12 col-md-4">
        <div class="info-box mb-3">
            <span class="info-box-icon bg-danger elevation-1">
                <i class="fa fa-arrow-down"></i>
            </span>
            <div class="info-box-content text-right">
                <h5 class="info-box-number">R$ 00,00</h5>
                <small class="info-box-text">Total de Saques</small>
            </div>
        </div>
    </div>
    
        <div class="col-12 col-sm-12 col-md-4">
            <div class="info-box mb-3">
                <span class="info-box-icon bg-info elevation-1">
                    <i class="fa fa-usd" style="font-family: revert;">R$</i>
                </span>
                <div class="info-box-content text-right">
                <h5 class="info-box-number">R$ {{ number_format($carteira, 2, ',', '.' ) }}</h5>
                <small class="info-box-text">Saldo Atual</small>            
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Histórico de Transações</h3>
                <div class="card-tools" style="margin-right:2px;">
                <form action="{{ route('historic.search')}}" method="POST" class="form form-inline">
                    {!! csrf_field() !!}
                    <div class="input-group input-group-sm">
                        <input type="text" name="id" class="form-control float-right" placeholder="Pesquisar...">
                        <input type="date" name="data" class="form-control float-right">
                        <select name="type" class="form-control">
                            <option value="">-- Selecione o Tipo --</option>
                                @foreach ($types as $key=> $type)
                                <option value="{{ $key }}">{{ $type }}</option>
                                @endforeach
                        </select>
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-default">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </div>
                </form>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th style="width: 10px">#</th>
                            <th>Valor</th>
                            <th>Tipo</th>
                            <th>Data</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($historics as $historic)
                        <tr>
                            <td>{{ $historic->id}}</td>
                            <td>R${{ number_format($historic->valor, 2,',','.')}}</td>
                            <td>@if($historic->type == 'D')
                                <span class="badge bg-success">{{ $historic->type($historic->type)}}</span>
                                @else
                                <span class="badge bg-danger">{{ $historic->type($historic->type)}}</span>
                                @endif
                            </td>
                            <td>{{ $historic->data}}</td>
                        </tr>
                        @empty
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="card-footer clearfix">
                <div class="row">
                    <div class="col-md-12">
                        @if(isset($dataForm))
                            {{ $historics->appends($dataForm)->links() }}
                        @else
                            {{ $historics->links() }}
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
