@extends('layouts.master')

@section('title', 'Redigesana')

@section('content')
<div class="row">
	<div class="col-md-8">
		<h1>Lietotajs "{{ $users->name }}"</h1>
		<a href="{{ route('users.index') }}" class="btn-default btn">Lietotaji</a>
		<hr>
		<form action="{{ route('users.update', $users->id) }}" class="form-horizontal" method="POST">
			{{ csrf_field() }}
			{{ method_field('PUT') }}

			<div class="form-group">
				<label for="task-name" class="col-sm-3 control-label">Vards</label>

				<div class="col-sm-6">
					<input type="text" name="name" id="task-name" class="form-control"  value="{{ old('name', $users->name) }}">
				</div>
			</div>
			<div class="form-group">
				<label for="task-name" class="col-sm-3 control-label">Email</label>

				<div class="col-sm-6">
					<input type="email" name="email" id="task-name" class="form-control"  value="{{ old('email', $users->email) }}">
				</div>
			</div>
			<div class="form-group">
				<label for="task-name" class="col-sm-3 control-label">Parole</label>

				<div class="col-sm-6">
					<input type="password" name="password" id="task-name" class="form-control"  value="{{ old('password', $users->password) }}">
				</div>
			</div>
			<div class="form-group">
				<label for="task-name" class="col-sm-3 control-label">Loma</label>

				<div class="col-sm-6">
					<select class="form-control" name="role" id="task-name">
						@foreach($roles as $role)
							<option value="{{ $role->id }}">{{ $role->name }}</option>
						@endforeach
					</select>
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
				<dd>{{ date('j/m/Y H:i' , strtotime($users->created_at)) }}</dd>
			</dl>
			<dl class="dl-horizontal">
				<dt>Redigets:</dt>
				<dd>{{ date('j/m/Y H:i' , strtotime($users->updated_at)) }}</dd>
			</dl>
			<hr>
			<div class="row">
				<div class="col-sm-12">
					<a href="{{ route('users.show', $users->id) }}" class="btn btn-danger btn-block"><i class="fa fa-ban"></i> Atcelt</a>
				</div>
			</div>
		</div>
	</div>
</div>
@stop