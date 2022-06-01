@extends('adminlte::page')

@section('title', 'Meu Perfil')

@section('content_header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h3 class="m-0">Meu Perfil</h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/admin">Painel Principal</a></li>
                    <li class="breadcrumb-item active">Meu Perfil</li>
                </ol>
            </div>
        </div>
    </div>
@stop

@section('content')
<div class="row">
    <div class="col-md-12">
        @include('admin.includes.alerts')
    </div>
</div>
<form action="{{ route('profile.update')}}" method="POST" enctype="multipart/form-data">
{{ csrf_field() }}
<div class="row">
    <div class="col-md-9">
        <div class="card card-primary card-outline">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-12">
                        <h3 class="card-title">Meus Dados</h3>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="name">Nome</label>
                            <input type="text" class="form-control" value="{{ auth()->user()->name }}" name="name" id="name" placeholder="">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="email">E-mail</label>
                            <input type="email" class="form-control"  value="{{ auth()->user()->email }}"  name="email"  id="email" placeholder="">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="telefone">Telefone</label>
                            <input type="text" class="form-control"  value="{{ auth()->user()->telefone }}"  name="telefone"  id="telefone" placeholder="">
                        </div> 
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="cep">CEP</label>
                            <input type="text" class="form-control"  value="{{ auth()->user()->cep }}"  name="cep"  id="cep" placeholder="">
                        </div>
                    </div>
                    <div class="col-md-7">
                        <div class="form-group">
                            <label for="rua">Rua</label>
                            <input type="text" class="form-control"  value="{{ auth()->user()->rua }}"  name="rua"  id="rua" placeholder="">
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="numero">Número</label>
                            <input type="text" class="form-control"  value="{{ auth()->user()->numero }}"  name="numero"  id="numero" placeholder="">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="complemento">Complemento</label>
                            <input type="text" class="form-control"  value="{{ auth()->user()->complemento }}"  name="complemento"  id="complemento" placeholder="">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="bairro">Bairro</label>
                            <input type="text" class="form-control"  value="{{ auth()->user()->bairro }}"  name="bairro"  id="bairro" placeholder="">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="estado">Estado</label>
                            <input type="text" class="form-control"  value="{{ auth()->user()->estado }}"  name="estado"  id="estado" placeholder="">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="cidade">Cidade</label>
                            <input type="text" class="form-control"  value="{{ auth()->user()->cidade }}" name="cidade" id="cidade" placeholder="">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="password">Senha</label>
                            <input type="password" class="form-control" name="password" placeholder="">
                        </div>
                    </div>
                </div>
                            
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary float-right">
                    <i class="fa fa-save p-2"></i>Salvar
                </button>
            </div>  
        </div>
    </div>
    
</div>
</form> 
@stop