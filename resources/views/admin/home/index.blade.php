@extends('adminlte::page')

@section('title', 'Painel Principal')

@section('content_header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Painel Principal</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item active">Painel Principal</li>
                </ol>
            </div>
        </div>
    </div>
@stop

@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="row">
            <div class="col-sm-3 col-6">
                <div class="description-block border-right">
                    <span class="description-percentage text-success">
                        <i class="fas fa-caret-up"></i> 17%</span>
                    <h5 class="description-header">$35,210.43</h5>
                    <span class="description-text">TOTAL REVENUE</span>
                </div>
            </div>
            <div class="col-sm-3 col-6">
                <div class="description-block border-right">
                    <span class="description-percentage text-warning">
                        <i class="fas fa-caret-left"></i> 0%</span>
                    <h5 class="description-header">$10,390.90</h5>
                    <span class="description-text">TOTAL COST</span>
                </div>
            </div>
            <div class="col-sm-3 col-6">
                <div class="description-block border-right">
                    <span class="description-percentage text-success">
                        <i class="fas fa-caret-up"></i> 20%</span>
                    <h5 class="description-header">$24,813.53</h5>
                    <span class="description-text">TOTAL PROFIT</span>
                </div>
            </div>
            <div class="col-sm-3 col-6">
                <div class="description-block">
                    <span class="description-percentage text-danger">
                        <i class="fas fa-caret-down"></i> 18%</span>
                    <h5 class="description-header">1200</h5>
                    <span class="description-text">GOAL COMPLETIONS</span>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
