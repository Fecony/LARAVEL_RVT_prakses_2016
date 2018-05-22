@extends('layouts.master')

@section('title', '| Jauns lietotajs')

@section('content')

<h1>Pievienot jaunu lietotaju</h1>
<a href="{{ route('users.index') }}" class="btn-default btn">Lietotāji</a>
<div class="container">
	<div class="row">
		<div class="col-md-8"><hr>
			<form action="{{ route('users.store')}}" method="POST" class="form-horizontal">
			{{ csrf_field() }}

			<div class="form-group">
				<label for="task-name" class="col-sm-3 control-label">Vārds</label>

				<div class="col-sm-6">
					<input type="text" name="name" id="task-name" class="form-control">
				</div>
			</div>

			<div class="form-group">
				<label for="task-name" class="col-sm-3 control-label">Email</label>

				<div class="col-sm-6">
					<input type="email" name="email" id="task-name" class="form-control">
				</div>
			</div>

			<div class="form-group">
				<label for="task-name" class="col-sm-3 control-label">Parole</label>

				<div class="col-sm-6">
					<input type="password" name="password" id="task-name" class="form-control">
				</div>
			</div>

			<!-- Add Prece Button -->
			<div class="form-group">
				<div class="col-sm-offset-3 col-sm-6">
					<button type="submit" class="btn btn-success btn-block">Pievienot!</button>
				</div>
			</div>
			</form>
		</div>
	</div>
</div>
@stop