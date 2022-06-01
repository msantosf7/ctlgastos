@extends('adminlte::page')

@section('title', 'Meus Clientes')

@section('content_header')
<div class="row">
    <div class="col-sm-6">
        <h3 class="m-0">Cliente - {{$user->name}}</h3>
        </div>
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/admin">Painel Principal</a></li>
            <li class="breadcrumb-item"><a href="/admin/clientes">Clientes</a></li>
            <li class="breadcrumb-item active">{{$user->name}}</li>
        </ol>
    </div>
</div>
<hr>
@stop

@section('content')
<div class="row">
    <div class="col-md-9">
        <div class="card card-primary card-outline">
            <div class="card-body">
            <div class="row">
                <div class="col-md-4">
                        <div class="form-group">
                            <label for="name">Nome</label>
                            <input type="text" class="form-control" value="{{ $user->name }}" disabled>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="email">E-mail</label>
                            <input type="email" class="form-control" value="{{ $user->email }}" disabled>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="telefone">Telefone</label>
                            <input type="text" class="form-control"  value="{{ $user->telefone }}" disabled>
                        </div> 
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="cep">CEP</label>
                            <input type="text" class="form-control"  value="{{ $user->cep }}" disabled>
                        </div>
                    </div>
                    <div class="col-md-7">
                        <div class="form-group">
                            <label for="rua">Rua</label>
                            <input type="text" class="form-control"  value="{{ $user->rua }}" disabled>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="numero">Número</label>
                            <input type="text" class="form-control"  value="{{ $user->numero }}" disabled>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="complemento">Complemento</label>
                            <input type="text" class="form-control"  value="{{ $user->complemento }}" disabled>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="bairro">Bairro</label>
                            <input type="text" class="form-control"  value="{{ $user->bairro }}" disabled>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="estado">Estado</label>
                            <input type="text" class="form-control"  value="{{ $user->estado }}" disabled>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="cidade">Cidade</label>
                            <input type="text" class="form-control"  value="{{ $user->cidade }}" disabled>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop