@extends('layouts.master')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-lg-12">
			<div class="centering text-center error-container">
				<div class="text-center">
					<h2 class="without-margin"><span class="text-danger"><big>Access Denied</big></span></h2>
					<h4 class="text-danger">Jums nav atļauju šajā lapā.</h4>
					<h4 class="text-danger">403</h4>
				</div>
				<div class="text-center">
					<h3><small>Izvēlieties opciju zemāk</small></h3>
				</div>
				<hr>
				<ul class="pager">
					<li><a href="/"><- Atpakal</a></li>
				</ul>
			</div>
		</div>
	</div>
</div>
@endsection