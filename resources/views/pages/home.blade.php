@extends('layouts.master')

@section('content')

<h1>Galvena lapa</h1>
<p class="lead"></p>
<hr>
<a href="{{ route('products.index') }}" class="btn btn-success">Visas preces</a>
@role(('admin'))
	<a href="{{ route('products.create') }}" class="btn btn-success">Pievienot preci</a>
	<a href="{{ route('inventars.create') }}" class="btn btn-primary">Pievienot inventāra numuru!</a>
	<a href="{{ route('users.index') }}" class="btn-default btn">Lietotāji</a>

@endrole

@stop