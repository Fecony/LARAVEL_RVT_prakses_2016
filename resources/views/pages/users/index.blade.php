@extends('layouts.master')

@section('title', ' Lietotaji')

@section('content')
<script>
	$(function () {
		$('a').tooltip();
	});
</script>
<div class="container">
	<div class="row">
		<div class="col-md-8">
			<div class="panel panel-default">
				<div class="panel-heading">Lietotaji</div>
				<div class="panel-body table-responsive">
					<table class="sortable table table-striped table-condensed nowrap task-table" width="100%">
						<thead>
							<th>#</th>
							<th>Vārds</th>
							<th>Email</th>
							<th>Loma</th>
							<th colspan="2">Darbības</th>
						</thead>
						<tbody>
							@foreach($users as $user)
								<tr class="">
									<td><div>{{ $user->id }}</div></td>
									<td><div>{{ $user->name }}</div></td>
									<td><div>{{ $user->email }}</div></td>
									@foreach($user->roles as $role)
										<td class="table-text"><div>{{ $role->name }}</div></td>
									@endforeach
									<td>
										<a href="{{ route('users.show', $user->id) }}" class="btn btn-block btn-default"><i class="fa fa-eye"></i></a>
									</td>
									<td>
										<form action="{{ route('users.destroy', $user->id) }}" method="POST">
											{{ csrf_field() }}
											{{ method_field('DELETE') }}
											<button type="submit" class="btn btn-block btn-danger">
												<i class="fa fa-trash"></i>
											</button>
										</form>
									</td>
									<style>
										td a{display: inline-block;}
									</style>
								</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
		<div class="col-md-4">
			<div class="well">
				<div class="row">
					<div class="col-sm-12">
						<a data-toggle="tooltip" data-placement="right" title="Pievienot lietotāju" href="{{ route('users.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i></a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<hr>
@endsection