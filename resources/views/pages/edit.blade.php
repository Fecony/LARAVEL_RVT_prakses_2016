@extends('layouts.master')

@section('title', 'Redigesana')

@section('content')

	<div class="row">
		<div class="col-md-8">
			<h1>Prece "{{ $products->product_name }}"</h1>
			<a href="{{ route('products.index') }}">Atpakal pie visam precem.</a>
			<hr>
			<form action="{{ route('products.update', $products->id) }}" class="form-horizontal" method="POST">
				{{ csrf_field() }}
				{{ method_field('PUT') }}

				<div class="form-group">
					<label for="task-name" class="col-sm-3 control-label">Pavadzimes</label>

					<div class="col-sm-6">
						<input type="text" name="invoice_nr" id="task-name" class="form-control" value="{{ old('invoice_nr', $products->invoice_nr) }}">
					</div>
				</div>

				<div class="form-group">
					<label for="task-name" class="col-sm-3 control-label">Piegadatajs</label>

					<div class="col-sm-6">
						<input type="text" name="provider" id="task-name" class="form-control" value="{{ old('provider', $products->provider) }}">
					</div>
				</div>

				<div class="form-group">
					<label for="task-name" class="col-sm-3 control-label">Datums</label>

					<div class="col-sm-6">
						<input type="text" name="delivered_at" id="datepicker" class="form-control" value="{{ old('delivered_at', $products->delivered_at) }}">
					</div>
				</div>

				<div class="form-group">
					<label for="task-name" class="col-sm-3 control-label">Nosaumuks</label>

					<div class="col-sm-6">
						<input type="text" name="product_name" id="task-name" class="form-control"  value="{{ old('product_name', $products->product_name) }}">
					</div>
				</div>

				<div class="form-group">
					<label for="task-name" class="col-sm-3 control-label">Skaits</label>

					<div class="col-sm-6">
						<input type="text" name="amount" id="task-name" class="form-control"  value="{{ old('amount', $products->amount) }}">
					</div>
				</div>

				<div class="form-group">
					<label for="task-name" class="col-sm-3 control-label">Mervieniba</label>

					<div class="col-sm-6">
						<select class="form-control" name="choices" id="task-name">
							<option value="m" @if (old('choices', $products->choices) == 'm') selected="selected" @endif>m</option>
							<option value="gb." @if (old('choices', $products->choices) == 'gb.') selected="selected" @endif>gb.</option>
							<option value="iepk." @if (old('choices', $products->choices) == 'iepk.') selected="selected" @endif>iepk.</option>
							<option value="komp." @if (old('choices', $products->choices) == 'komp.') selected="selected" @endif>komp.</option>
						</select>
					</div>
				</div>

				<div class="form-group">
					<label for="task-name" class="col-sm-3 control-label">Piezimes</label>

					<div class="col-sm-6">
						<input type="text" name="note" id="task-name" class="form-control" value="{{ old('note', $products->note) }}">
					</div>
				</div>

				<!-- Add Prece Button -->
				<div class="form-group">
					<div class="col-sm-offset-3 col-sm-6">
						<button type="submit" class="btn btn-success btn-block"><i class="fa fa-check"></i> Pievienot</button>
					</div>
				</div>
			</form>
		</div>
		<div class="col-md-4">
			<div class="well">
				<dl class="dl-horizontal">
					<dt>Izveidots:</dt>
					<dd>{{ date('j/m/Y H:i' , strtotime($products->created_at)) }}</dd>
				</dl>
				<dl class="dl-horizontal">
					<dt>Redigets:</dt>
					<dd>{{ date('j/m/Y H:i' , strtotime($products->updated_at)) }}</dd>
				</dl>
				<hr>
				<div class="row">
					<div class="col-sm-12">
						<a href="{{ route('products.show', $products->id) }}" class="btn btn-danger btn-block"><i class="fa fa-ban"></i> Atcelt</a>
					</div>
				</div>
			</div>
		</div>
	</div>

@stop