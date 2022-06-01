@extends('adminlte::page')

@section('title', 'Meus Clientes')

@section('content_header')
<div class="row">
    <div class="col-sm-6">
        <h3 class="m-0">Meus Clientes</h3>
        </div>
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/admin">Painel Principal</a></li>
            <li class="breadcrumb-item active">Meus Clientes</li>
        </ol>
    </div>
</div>
<hr>
@stop

@section('content')
<div class="row">
    <div class="col-12 col-sm-6 col-md-2">
        <a href="{{ route('clientes.cadastro')}}" class="btn btn-app btn-block bg-success" style="margin: 0px;">
            <i class="fa fa-user-plus"></i>Novo Cliente
        </a>
    </div>
</div>
<hr>

<div class="row">
    <div class="col-12 col-sm-12 col-md-12">
        @include('admin.includes.alerts')
    </div>    
    <div class="col-12 col-sm-12 col-md-4">
        <div class="info-box">
            <span class="info-box-icon bg-success elevation-1">
                <i class="fa fa-users"></i>
            </span>
            <div class="info-box-content text-right">
                <h5 class="info-box-number">152</h5>
                <small class="info-box-text">Clientes Cadastrados</small>
            </div>
        </div>
    </div>

    <div class="col-12 col-sm-12 col-md-4">
        <div class="info-box mb-3">
            <span class="info-box-icon bg-info elevation-1">
                <i class="fa fa-check-circle"></i>
            </span>
            <div class="info-box-content text-right">
                <h5 class="info-box-number">147</h5>
                <small class="info-box-text">Clientes Ativos</small>
            </div>
        </div>
    </div>
    
        <div class="col-12 col-sm-12 col-md-4">
            <div class="info-box mb-3">
                <span class="info-box-icon bg-danger elevation-1">
                    <i class="fas fa-times-circle"></i>
                </span>
                <div class="info-box-content text-right">
                <h5 class="info-box-number">5</h5>
                <small class="info-box-text">Clientes Inativos</small>            
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Meus Clientes</h3>
            </div>
            <div class="card-body">
                @csrf
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th style="width: 10px">#</th>
                            <th>Nome</th>
                            <th>Telefone</th>
                            <th>Email</th>
                            <th style="width:40px">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($user as $users)
                        <tr>
                            <td>{{$users->id}}</td>
                            <td width="350px">{{$users->name}}</td>
                            <td width="150px">{{$users->telefone}}</td>
                            <td width="350px">{{$users->email}}</td>
                            <td width="400px">
                                <div class="row">
                                    <div class="col-md-4">
                                        <a href="clientes-view/{{$users->id}}">
                                            <button class="btn btn-dark bt-block">Visualizar</button>
                                        </a>
                                    </div>
                                    <div class="col-md-4">
                                        <a href="clientes/{{$users->id}}/edit">
                                            <button class="btn btn-success btn-block">Editar</button>
                                        </a>
                                    </div>
                                    <div class="col-md-4">
                                        <form name="formDel" action="{{url('admin/clientes/'.$users->id)}}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <input name="_method" type="hidden" value="DELETE">
                                            <button type="submit" onclick="return confirm('Deseja realmente excluir esse cliente?')" class="btn btn-danger btn-block show_confirm">Excluir</button>
                                        </form>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="card-footer clearfix">
                <div class="row">
                    <div class="col-md-12">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop