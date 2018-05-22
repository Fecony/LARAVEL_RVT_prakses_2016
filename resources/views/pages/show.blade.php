@extends('layouts.master')

@section('title', 'prece')

@section('content')
<div class="row">
	<div class="col-md-8">
		<h1>Prece "{{ $products->product_name }}"</h1>
		<a href="{{ route('products.index') }}">Atpakal pie visam precem.</a>
		<hr>
		<dl class="dl-horizontal">
			<dt>Pavadzīmes Nr. : </dt>
			<dd>{{ $products->invoice_nr }}</dd>
			<dt>Piegadatajs : </dt>
			<dd>{{ $products->provider }}</dd>
			<dt>Piegādes datums : </dt>
			<dd>{{ $products->delivered_at }}</dd>
			<dt>Preces nosaukums : </dt>
			<dd>{{ $products->product_name }}</dd>
			<dt>Skaits : </dt>
			<dd>{{ $products->amount }}</dd>
			<dt>Mērvienība : </dt>
			<dd>{{ $products->choices }}</dd>
			<dt>Piezīmes : </dt>
			<dd>{{ $products->note }}</dd>
		</dl>
	</div>
@role(('admin'))
	<div class="col-md-4">
		<div class="well">
			<dl class="dl-horizontal">
				<dt>Izveidots:</dt>
				<dd>{{ date('j/m/Y H:i' , strtotime($products->created_at)) }}</dd>
			</dl>
			<dl class="dl-horizontal">
				<dt>Rediģēts:</dt>
				<dd>{{ date('j/m/Y H:i' , strtotime($products->updated_at)) }}</dd>
			</dl>
			<hr>
			<div class="row">
				<div class="col-sm-12">
					<a href="{{ route('products.edit', $products->id) }}" class="btn btn-primary btn-block"><i class="fa fa-pencil"></i> Rediģēt</a>
				</div>
				<div class="col-sm-12" style="padding-top:10px">
					<form action="{{ route('norakstits.update', $products->id) }}" class="form-horizontal" method="POST">
						{{ csrf_field() }}
						{{ method_field('PUT') }}
						<div class="form-group" hidden>
							<div class="col-sm-6">
								<input type="text" name="product_name" id="task-name" class="form-control"  value="{{ old('product_name', $products->product_name) }}">
							</div>
						</div>
						<div class="form-group" hidden>
							<div class="col-sm-6">
								<input type="text" name="amount" id="task-name" class="form-control" value="{{ old('amount', $products->amount) }}">
							</div>
						</div>
						<div class="form-group" hidden>
							<div class="col-sm-6">
								<select class="form-control" name="choices" id="task-name">
									<option value="m" @if (old('choices', $products->choices) == 'm') selected="selected" @endif>m</option>
									<option value="gb." @if (old('choices', $products->choices) == 'gb.') selected="selected" @endif>gb.</option>
									<option value="iepk." @if (old('choices', $products->choices) == 'iepk.') selected="selected" @endif>iepk.</option>
									<option value="komp." @if (old('choices', $products->choices) == 'komp.') selected="selected" @endif>komp.</option>
								</select>
							</div>
						</div>
						<button type="submit" class="btn btn-success btn-block"><i class="fa fa-share"></i> Norakstīt</button>
					</form>
				</div>
				<div class="col-sm-12" style="padding-top:10px">
					<form action="{{ route('products.destroy', $products->id) }}" method="POST">
						{{ csrf_field() }}
						{{ method_field('DELETE') }}

						<button type="submit" class="btn btn-danger btn-block">
							<i class="fa fa-trash"></i>Dzēst
						</button>
					</form>
				</div>
			</div>
		</div>
	</div>
@endrole
</div> <!-- end of row -->
<div class="col-md-12"><hr>
	@if (count($inventars) > 0)
		<div class="panel-body table-responsive">
			<table id="table" class="table table-bordered table-striped nowrap" width="100%">
				<thead class="btn-default">
					<th>Produkts</th>
					<th>Inventāra numurs</th>
					<th>Status</th>
					@role(('admin'))
						<th></th>
					@endrole
				</thead>
				<tbody>
					@foreach($inventars as $key => $value)
						<tr>
							<td>{!! $products->product_name !!}</td>
							<td>{!! $value->inventar_nr !!}</td>
							<td>{!! $value->status !!}</td>
							@role(('admin'))
								<td class="col-md-2">
									<a class="btn btn-default btn-block" data-toggle="collapse" href="#{{ $value->id }}" aria-expanded="false" aria-controls="{{ $value->id }}">
										<i class="fa fa-gears"></i>
									</a>
									<div class="collapse" id="{{ $value->id }}">
										<div class="well well-sm" style="margin-top:15px">
											<form action="{{ route('inventars.update', $value->id) }}" method="POST">
												{{ csrf_field() }}
												{{ method_field('PUT') }}

												<input type="hidden" name="product_id" id="task-name" class="form-control" value="{{ $products->id }}">
												<input type="hidden" name="inventar_nr" id="task-name" class="form-control" value="{{ $value->inventar_nr }}">
												<input type="hidden" name="status" id="task-name" class="form-control" value="aiznemts">
												<select class="form-control" name="user_id" id="task-name">
													@foreach($users as $user)
														<option value="{{ $user->id }}">{{ $user->name }}</option>
													@endforeach
												</select>
												<button type="submit" style="margin-top:5px" class="btn btn-success btn-sm btn-block">
													<i class="fa fa-share"></i>
												</button>
											</form>
										</div>

										<form action="{{ route('inventars.destroy', $value->id) }}" method="POST">
											{{ csrf_field() }}
											{{ method_field('DELETE') }}

											<button type="submit" style="margin-top:5px" class="btn btn-danger btn-block">
												<i class="fa fa-trash"></i>
											</button>
										</form>
									</div>
								</td>
							@endrole
						</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	@role(('admin'))<a href="{{ route('inventars.create') }}" class="btn btn-block btn-info">Pievienot inventara numuru!</a>@endrole
	@else
		@role(('admin'))<a href="{{ route('inventars.create') }}" class="btn btn-block btn-info">Pievienot inventara numuru!</a>@endrole
	@endif
</div>
@stop