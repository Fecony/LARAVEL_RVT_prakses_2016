@extends('layouts.master')

@section('title', 'lietotajs')

@section('content')
	<script>
		$(function () {
			$('a').tooltip();
		});
	</script>
@foreach($users->roles as $role)
<div class="row">
	<div class="col-md-6">
		<div><h1>Lietotajs "{{ $users->name }}"</h1></div><hr>
		<div class="col-md-8">
			<table class="table table-bordered">
				<tbody>
					<tr>
						<td>Vards:</td>
						<td>{{ $users->name }} </td>
					</tr>
					<tr>
						<td>Email:</td>
						<td>{{ $users->email }} </td>
					</tr>
					<tr>
						<td>Loma:</td>
						<td>{{ $role->name }} </td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
	<div class="col-md-2">
		<ul class="pagination">
			<li><a class="btn btn-default" data-toggle="tooltip" data-placement="right" title="Iepriekšējais lietotājs" href="{{ URL::to( 'admin/users/' . $previous ) }}"><span aria-hidden="true">&laquo;</span></a></li>
			<li><a class="btn btn-default" data-toggle="tooltip" data-placement="right" title="Lietotāji" href="{{ route('users.index') }}"><i class="fa fa-user"></i></a></li>
			<li><a class="btn btn-default" data-toggle="tooltip" data-placement="right" title="Preces" href="{{ route('products.index') }}"><i class="fa fa-list"></i></a></li>
			<li><a class="btn btn-default" data-toggle="tooltip" data-placement="right" title="Nākamais Lietotājs" href="{{ URL::to( 'admin/users/' . $next ) }}"><span aria-hidden="true">&raquo;</span></a></li>
		</ul>
	</div>
@endforeach
@role(('admin'))
	<div class="col-md-4">
		<div class="well">
			<dl class="dl-horizontal">
				<dt>Izveidots:</dt>
				<dd>{{ date('j/m/Y H:i' , strtotime($users->created_at)) }}</dd>
			</dl>
			<dl class="dl-horizontal">
				<dt>Redigets:</dt>
				<dd>{{ date('j/m/Y H:i' , strtotime($users->updated_at)) }}</dd>
			</dl>
			<hr>
			<div class="row">
				<div class="col-sm-12">
					<a href="{{ route('users.edit', $users->id) }}" class="btn btn-primary btn-block"><i class="fa fa-pencil"></i> Rediget</a>
				</div>
				<div class="col-sm-12" style="padding-top:10px">
					<form action="{{ route('users.destroy', $users->id) }}" method="POST">
						{{ csrf_field() }}
						{{ method_field('DELETE') }}

						<button type="submit" class="btn btn-danger btn-block">
							<i class="fa fa-trash"></i> Dzest
						</button>
					</form>
				</div>
			</div>
		</div>
	</div>
@endrole
</div> <!-- end of row -->
<div class="col-md-12"><hr>
	<div class="panel-body table-responsive">
		<table id="table" class=" table table-striped table-condensed nowrap task-table table-bordered" width="100%">
			<thead class="btn-default">
				<th>Produkts</th>
				<th>Inventara numurs</th>
				@role(('admin'))
					<th>Atgriezt</th>
				@endrole
			</thead>
			<tbody>
				@foreach($inventars as $inventar)
					<tr>
						@foreach($products as $key => $value)
							@if($value['id'] == $inventar->product_id)
								<td>{{ $value->product_name }}</td>
							@endif
						@endforeach
						<td>{{ $inventar->inventar_nr }}</td>
						<td>
							<form action="{{ route('inventars.update', $inventar->id) }}" method="POST">
								{{ csrf_field() }}
								{{ method_field('PUT') }}

								<input type="hidden" name="product_id" id="task-name" class="form-control" value="{{ $inventar->product_id }}">
								<input type="hidden" name="inventar_nr" id="task-name" class="form-control" value="{{ $inventar->inventar_nr }}">
								<input type="hidden" name="status" id="task-name" class="form-control" value="brivs">
								<input type="hidden" name="user_id" id="task-name" class="form-control">
								<button type="submit" style="margin-top:5px" class="btn btn-success btn-sm btn-block">
									<i class="fa fa-undo"></i>
								</button>
							</form>
						</td>
					</tr>
				@endforeach
			</tbody>
		</table>
	</div><hr>
</div><hr>
@stop