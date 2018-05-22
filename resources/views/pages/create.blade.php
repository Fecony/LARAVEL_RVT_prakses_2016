@extends('layouts.master')

@section('title', '| Jauna prece')

@section('content')

<h1>Pievienot jaunu preci</h1>
<hr>
<form action="{{ route('products.store')}}" method="POST" class="form-horizontal">
{{ csrf_field() }}

<!-- product Name -->
<div class="form-group">
    <label for="task-name" class="col-sm-3 control-label">Pavadzīmes Nr.</label>

    <div class="col-sm-6">
        <input type="text" name="invoice_nr" id="task-name" class="form-control">
    </div>
</div>

<div class="form-group">
    <label for="task-name" class="col-sm-3 control-label">Piegadatajs</label>

    <div class="col-sm-6">
        <input type="text" name="provider" id="task-name" class="form-control">
    </div>
</div>

<div class="form-group">
    <label for="task-name" class="col-sm-3 control-label">Piegādes datums</label>

    <div class="col-sm-6">
        <input type="text" name="delivered_at" id="datepicker" class="form-control">
    </div>
</div>

<div class="form-group">
    <label for="task-name" class="col-sm-3 control-label">Preces nosaukums</label>

    <div class="col-sm-6">
        <input type="text" name="product_name" id="task-name" class="form-control">
    </div>
</div>

<div class="form-group">
    <label for="task-name" class="col-sm-3 control-label">Skaits</label>

    <div class="col-sm-6">
        <input type="number" name="amount" id="task-name" class="form-control">
    </div>
</div>

<div class="form-group">
    <label for="task-name" class="col-sm-3 control-label">Mērvienība</label>

    <div class="col-sm-6">
        <select class="form-control" name="choices" id="task-name">
            <option value="m">m</option>
            <option value="gb.">gb.</option>
            <option value="iepk.">iepk.</option>
            <option value="komp.">komp.</option>
        </select>
    </div>
</div>

<div class="form-group">
    <label for="task-name" class="col-sm-3 control-label">Piezīmes</label>

    <div class="col-sm-6">
        <input type="text" name="note" id="task-name" class="form-control">
    </div>
</div>

<!-- Add Prece Button -->
<div class="form-group">
    <div class="col-sm-offset-3 col-sm-6">
        <button type="submit" class="btn btn-success btn-block">Pievienot!</button>
    </div>
</div>
</form>
@stop