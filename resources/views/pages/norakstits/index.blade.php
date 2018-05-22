@extends('layouts.master')

@section('content')

<h1>Norakstits</h1>
<a href="{{ route('users.index') }}" class="btn-default btn">Lietotaji</a>
<a href="{{ route('products.index') }}" class="btn-default btn">Preces</a><hr>

<div class="col-md-12">
<!-- Preces -->
@if (count($norakstits) > 0)
    <div class="panel panel-default">
        <div class="panel-body table-responsive">
            <table class="table table-striped table-condensed nowrap task-table table-bordered">
                <thead>
                    <th>ID</th>
                    <th>Preces nosaukums</th>
                    <th>Inventara Nr.</th>
                    <th>Statuss</th>
                    <th>Lietotajs</th>
                    <th>Skaits</th>
                    <th>Mervieniba</th>
                    <th>Datums</th>
                </thead>
                <tbody>
                    @foreach ($norakstits as $norakstita)
                        <tr class="">
                            <td><div>{{ $norakstita->id }}</div></td>
                            <td><div>{{ $norakstita->product_name }}</div></td>
                            <td><div>{{ $norakstita->inventar_nr }}</div></td>
                            <td><div>{{ $norakstita->statuss }}</div></td>
                            <td><div>{{ $norakstita->user_id }}</div></td>
                            <td><div>{{ $norakstita->amount }}</div></td>
                            <td><div>{{ $norakstita->choices }}</div></td>
                            <td><div>{{ $norakstita->created_at }}</div></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div> <!-- end of .panel .panel-default -->
@else 
    <div class="panel panel-default">
        <div class="panel-body">
            <h1>tukss...</h1>
        </div>
    </div>
@endif
</div>

@stop